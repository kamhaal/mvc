<?php

namespace App\Tests\Unit\Game;

use PHPUnit\Framework\TestCase;
use App\Game\Player;
use App\Game\Card;

class PlayerTest extends TestCase
{
    public function testCreatePlayer(): void
    {
        $player = new Player('John');

        $this->assertInstanceOf(Player::class, $player);
        $this->assertEquals('John', $player->getName());
        $this->assertInstanceOf(\App\Game\Hand::class, $player->getHand());
    }

    public function testAddCardToPlayer(): void
    {
        $player = new Player('Alice');
        $card = new Card('Hearts', 'Ace', 11);

        $player->addCard($card);

        $this->assertCount(1, $player->getHand()->getCards());
    }

    public function testPlayerHandValue(): void
    {
        $player = new Player('Bob');

        $player->addCard(new Card('Hearts', 'Ace', 11));
        $player->addCard(new Card('Spades', '7', 7));

        $this->assertEquals(18, $player->getHand()->getValue());
    }
}
