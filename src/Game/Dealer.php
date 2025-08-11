<?php

namespace App\Game;

class Dealer extends Player
{
    public function __construct()
    {
        parent::__construct("Dealer");
    }

    public function shouldDraw(): bool
    {
        return $this->hand->getValue() < 17;
    }
}
