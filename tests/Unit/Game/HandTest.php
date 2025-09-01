<?php

namespace App\Tests\Unit\Game;

use PHPUnit\Framework\TestCase;
use App\Game\Hand;
use App\Game\Card;

class HandTest extends TestCase
{
    public function testCreateHand(): void
    {
        $hand = new Hand();

        $this->assertInstanceOf(Hand::class, $hand);
        $this->assertCount(0, $hand->getCards());
        $this->assertEquals(0, $hand->getValue());
    }

    public function testAddCardToHand(): void
    {
        $hand = new Hand();
        $card = new Card('Diamonds', 'King', 10);

        $hand->add($card);

        $this->assertCount(1, $hand->getCards());
        $this->assertEquals(10, $hand->getValue());
    }

    public function testHandValueCalculation(): void
    {
        $hand = new Hand();

        $hand->add(new Card('Hearts', 'Ace', 11));
        $hand->add(new Card('Clubs', '5', 5));

        $this->assertEquals(16, $hand->getValue());
    }

    public function testHandValueWithAces(): void
    {
        $hand = new Hand();

        $hand->add(new Card('Hearts', 'Ace', 11));
        $hand->add(new Card('Spades', 'Ace', 11));
        $hand->add(new Card('Clubs', '9', 9));

        // 11 + 11 + 9 = 31 (vilket är mer än 21, så inget justeras)
        $this->assertEquals(31, $hand->getValue());
    }

    public function testGetAsString(): void
    {
        $hand = new Hand();
        $hand->add(new Card('Hearts', 'Ace', 11));
        $hand->add(new Card('Spades', '10', 10));

        $result = $hand->getAsString();
        $this->assertStringContainsString('Ace♥', $result);
        $this->assertStringContainsString('10♠', $result);
    }
}
