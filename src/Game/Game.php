<?php

namespace App\Game;

class Game
{
    private Deck $deck;
    private Player $player;
    private Dealer $dealer;
    private string $status = 'player_turn';

    public function __construct(string $playerName, int $balance = 100)
    {
        $this->deck = new Deck();
        $this->player = new Player($playerName, $balance);
        $this->dealer = new Dealer();
        $this->startNewRound();
    }

    public function startNewRound(): void
    {
        $this->deck->shuffle();
        $this->player->getHand()->clear();
        $this->dealer->getHand()->clear();
        $this->status = 'player_turn';

        $this->player->getHand()->add($this->deck->draw());
        $this->player->getHand()->add($this->deck->draw());
        $this->dealer->getHand()->add($this->deck->draw());
        $this->dealer->getHand()->add($this->deck->draw());
    }

    public function hit(): void
    {
        $this->player->getHand()->add($this->deck->draw());
        if ($this->player->getHand()->getValue() > 21) {
            $this->status = 'game_over';
        }
    }

    public function stand(): void
    {
        while ($this->dealer->getHand()->getValue() < 17) {
            $this->dealer->getHand()->add($this->deck->draw());
        }
        $this->status = 'game_over';
    }


    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function getDealer(): Dealer
    {
        return $this->dealer;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
