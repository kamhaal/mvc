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
        $cards = [];
    
        $symbols = [
            'Spades' => ['🂡','🂢','🂣','🂤','🂥','🂦','🂧','🂨','🂩','🂪','🂫','🂭','🂮'],
            'Hearts' => ['🂱','🂲','🂳','🂴',  '🂵','🂶','🂷','🂸','🂹','🂺','🂻','🂽','🂾'],
            'Diamonds' => ['🃁','🃂','🃃','🃄','🃅','🃆','🃇','🃈','🃉','🃊','🃋','🃍','🃎'],
            'Clubs' => ['🃑','🃒','🃓','🃔','🃕','🃖','🃗','🃘','🃙','🃚','🃛','🃝','🃞']
        ];
    
        foreach ($symbols as $suit => $cardsInSuit) {
            $color = in_array($suit, ['Hearts', 'Diamonds']) ? 'red' : 'black';
    
            foreach ($cardsInSuit as $card) {
                $cards[] = ['card' => $card, 'color' => $color];
            }
        }
    
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
