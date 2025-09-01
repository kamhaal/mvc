<?php

namespace Tests;

use App\Game\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testCardHasSuitAndValue()
    {
        $card = new Card('Hearts', 'Ace', 11);
        $this->assertEquals('Hearts', $card->getSuit());
        $this->assertEquals('Ace', $card->getRank());
        $this->assertEquals(11, $card->getValue());
    }

    public function testCardToString(): void
    {
        $card = new Card('Diamonds', 'King', 10);
        $this->assertEquals('King of Diamonds', (string)$card);
    }

    public function testCardGetAsString(): void
    {
        $card = new Card('Hearts', '10', 10);
        $this->assertEquals('10♥', $card->getAsString());
    }

    public function testCardValueTypes(): void
    {
        $card = new Card('Spades', '5', 5);
        $this->assertIsInt($card->getValue());
        $this->assertIsString($card->getSuit());
        $this->assertIsString($card->getRank());
    }
}
