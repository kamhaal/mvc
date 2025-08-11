<?php

namespace App\Game;

class Player
{
    protected string $name;
    protected Hand $hand;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->hand = new Hand();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHand(): Hand
    {
        return $this->hand;
    }

    public function addCard(Card $card): void
    {
        $this->hand->add($card);
    }
}
