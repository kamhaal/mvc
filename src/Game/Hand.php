<?php

namespace App\Game;

class Hand
{
    /** @var Card[] */
    private array $cards = [];

    public function add(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function getValue(): int
    {
        $total = 0;
        $aces = 0;

        foreach ($this->cards as $card) {
            $total += $card->getValue();
            if ($card->getRank() === 'A') {
                $aces++;
            }
        }

        // Ess = 1 eller 14 (enligt uppgift)
        while ($aces > 0 && $total + 13 <= 21) {
            $total += 13; // 14 istället för 1
            $aces--;
        }

        return $total;
    }

    // Hand.php
    public function getAsString(): string
    {
        $cards = [];
        foreach ($this->cards as $card) {
            $cards[] = $card->getAsString();
        }
        return implode(' ', $cards);
    }
}
