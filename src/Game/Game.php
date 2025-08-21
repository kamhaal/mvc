<?php

namespace App\Game;

class Game
{
    private Deck $deck;
    private Player $player;
    private Dealer $dealer;
    private string $status = "player_turn";

    public function __construct()
    {
        $this->deck = new Deck();
        $this->deck->shuffle();

        $this->player = new Player("Player");
        $this->dealer = new Dealer();
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function getDealer(): Dealer
    {
        return $this->dealer;
    }

    public function getDeck(): Deck
    {
        return $this->deck;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function playerHit(): void
    {
        $this->player->addCard($this->deck->draw());
        if ($this->player->getHand()->getValue() > 21) {
            $this->status = "finished";
        }
    }

    public function playerStand(): void
    {
        $this->status = "dealer_turn";
        $this->dealerTurn();
    }

    private function dealerTurn(): void
    {
        while ($this->dealer->shouldDraw()) {
            $this->dealer->addCard($this->deck->draw());
        }
        $this->status = "finished";
    }

    public function getWinner(): ?string
    {
        if ($this->status !== "finished") {
            return null;
        }

        $p = $this->player->getHand()->getValue();
        $d = $this->dealer->getHand()->getValue();

        if ($p > 21) return "Dealer";
        if ($d > 21) return "Player";
        if ($d >= $p) return "Dealer";
        return "Player";
    }
}
