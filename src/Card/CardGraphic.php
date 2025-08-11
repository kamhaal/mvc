<?php

namespace App\Card;

class CardGraphic extends Card
{
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