<?php

namespace App\Game;

class Card
{
    private string $suit;  // Hearts, Diamonds, Clubs, Spades
    private string $rank;  // 2–10, J, Q, K, A
    private int $value;    // numeric value (A handled in Hand)

    public function __construct(string $suit, string $rank, int $value)
    {
        $this->suit = $suit;
        $this->rank = $rank;
        $this->value = $value;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getRank(): string
    {
        return $this->rank;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return "{$this->rank} of {$this->suit}";
    }

    // Card.php
    public function getAsString(): string
    {
        $symbols = [
            'Hearts' => '♥',
            'Diamonds' => '♦',
            'Clubs' => '♣',
            'Spades' => '♠'
        ];
        
        return $this->rank . $symbols[$this->suit];
    }
}
