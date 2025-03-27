<?php

namespace App\Card;

class Deck
{
    private $cards;

    public function __construct()
    {
        $this->cards = $this->createDeck();
    }

    private function createDeck()
    {
        $Hearts = [
            ['card' => "🂱", 'color' => 'red'],
            ['card' => "🂲", 'color' => 'red'],
            ['card' => "🂳", 'color' => 'red'],
            ['card' => "🂴", 'color' => 'red'],
            ['card' => "🂵", 'color' => 'red'],
            ['card' => "🂶", 'color' => 'red'],
            ['card' => "🂷", 'color' => 'red'],
            ['card' => "🂸", 'color' => 'red'],
            ['card' => "🂹", 'color' => 'red'],
            ['card' => "🂺", 'color' => 'red'],
            ['card' => "🂻", 'color' => 'red'],
            ['card' => "🂽", 'color' => 'red'],
            ['card' => "🂾", 'color' => 'red'],
        ];

        $Diamonds = [
            ['card' => "🃁", 'color' => 'red'],
            ['card' => "🃂", 'color' => 'red'],
            ['card' => "🃃", 'color' => 'red'],
            ['card' => "🃄", 'color' => 'red'],
            ['card' => "🃅", 'color' => 'red'],
            ['card' => "🃆", 'color' => 'red'],
            ['card' => "🃇", 'color' => 'red'],
            ['card' => "🃈", 'color' => 'red'],
            ['card' => "🃉", 'color' => 'red'],
            ['card' => "🃊", 'color' => 'red'],
            ['card' => "🃋", 'color' => 'red'],
            ['card' => "🃍", 'color' => 'red'],
            ['card' => "🃎", 'color' => 'red'],
        ];

        $Clubs = [
            ['card' => "🃑", 'color' => 'black'],
            ['card' => "🃒", 'color' => 'black'],
            ['card' => "🃓", 'color' => 'black'],
            ['card' => "🃔", 'color' => 'black'],
            ['card' => "🃕", 'color' => 'black'],
            ['card' => "🃖", 'color' => 'black'],
            ['card' => "🃗", 'color' => 'black'],
            ['card' => "🃘", 'color' => 'black'],
            ['card' => "🃙", 'color' => 'black'],
            ['card' => "🃚", 'color' => 'black'],
            ['card' => "🃛", 'color' => 'black'],
            ['card' => "🃝", 'color' => 'black'],
            ['card' => "🃞", 'color' => 'black'],
        ];

        $Spades = [
            ['card' => "🂡", 'color' => 'black'],
            ['card' => "🂢", 'color' => 'black'],
            ['card' => "🂣", 'color' => 'black'],
            ['card' => "🂤", 'color' => 'black'],
            ['card' => "🂥", 'color' => 'black'],
            ['card' => "🂦", 'color' => 'black'],
            ['card' => "🂧", 'color' => 'black'],
            ['card' => "🂨", 'color' => 'black'],
            ['card' => "🂩", 'color' => 'black'],
            ['card' => "🂪", 'color' => 'black'],
            ['card' => "🂫", 'color' => 'black'],
            ['card' => "🂭", 'color' => 'black'],
            ['card' => "🂮", 'color' => 'black'],
        ];

        $cards = array_merge($Spades, $Diamonds, $Clubs, $Hearts);

        return $cards;
    }

    public function getCards()
    {
        return $this->cards;
    }

    public function shuffle()
    {
        shuffle($this->cards);
    }

    public function drawCard()
    {
        return array_shift($this->cards);
    }

    public function drawMultipleCards($number)
    {
        return array_splice($this->cards, 0, $number);
    }

}
