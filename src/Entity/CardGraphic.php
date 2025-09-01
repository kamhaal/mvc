<?php

namespace App\Entity;

class CardGraphic extends Card
{
    private const SUIT_SYMBOLS = [
        'hearts' => '♥',
        'diamonds' => '♦',
        'clubs' => '♣',
        'spades' => '♠',
    ];

    private const VALUE_SYMBOLS = [
        'A' => 'A',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        'J' => 'J',
        'Q' => 'Q',
        'K' => 'K',
    ];

    public function getAsString(): string
    {
        return self::VALUE_SYMBOLS[$this->value] . self::SUIT_SYMBOLS[$this->suit];
    }

    public function getAsHTML(): string
    {
        $symbol = $this->getAsString();
        $suitClass = $this->suit;

        return "<span class=\"card $suitClass\">$symbol</span>";
    }
}
