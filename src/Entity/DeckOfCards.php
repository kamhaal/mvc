<?php
namespace App\Entity;

class DeckOfCards
{
    private array $cards = [];

    public function __construct(bool $withJokers = false)
    {
        $suits = ['hearts', 'diamonds', 'clubs', 'spades'];
        $values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $this->cards[] = new CardGraphic($suit, $value);
            }
        }

        if ($withJokers) {
            $this->cards[] = new CardGraphic('joker', 'Joker');
            $this->cards[] = new CardGraphic('joker', 'Joker');
        }
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    public function drawCard(): ?Card
    {
        return array_pop($this->cards);
    }

    public function drawCards(int $number): array
    {
        $drawnCards = [];
        for ($i = 0; $i < $number && !empty($this->cards); $i++) {
            $drawnCards[] = $this->drawCard();
        }
        return $drawnCards;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function getCardsCount(): int
    {
        return count($this->cards);
    }

    public function sort(): void
    {
        $suitsOrder = ['hearts' => 0, 'diamonds' => 1, 'clubs' => 2, 'spades' => 3, 'joker' => 4];
        $valuesOrder = ['A' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, 
                       '8' => 8, '9' => 9, '10' => 10, 'J' => 11, 'Q' => 12, 'K' => 13, 'Joker' => 14];

        usort($this->cards, function ($a, $b) use ($suitsOrder, $valuesOrder) {
            $aSuit = $a->getSuit();
            $bSuit = $b->getSuit();
            $aValue = $a->getValue();
            $bValue = $b->getValue();

            if ($suitsOrder[$aSuit] !== $suitsOrder[$bSuit]) {
                return $suitsOrder[$aSuit] - $suitsOrder[$bSuit];
            }

            return $valuesOrder[$aValue] - $valuesOrder[$bValue];
        });
    }
}