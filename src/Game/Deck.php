<?php

namespace App\Game;

class Deck
{
    /** @var Card[] */
    private array $cards = [];

    public function __construct()
    {
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $ranks = [
            '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7,
            '8' => 8, '9' => 9, '10' => 10,
            'J' => 10, 'Q' => 10, 'K' => 10, 'A' => 1 
        ];

        foreach ($suits as $suit) {
            foreach ($ranks as $rank => $value) {
                $this->cards[] = new Card($suit, $rank, $value);
            }
        }
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    public function draw(): ?Card
    {
        return array_shift($this->cards);
    }
}