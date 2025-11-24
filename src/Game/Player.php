<?php

namespace App\Game;

class Player
{
    private Hand $hand;
    private string $name;
    private int $balance = 0;

    public function __construct(string $name, int $balance = 100)
    {
        $this->hand = new Hand();
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getHand(): Hand
    {
        return $this->hand;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function deposit(int $amount): void
    {
        $this->balance += $amount;
    }

    public function withdraw(int $amount): bool
    {
        if ($amount > $this->balance) {
            return false;
        }
        $this->balance -= $amount;
        return true;
    }
}
