<?php

namespace Tests\Game;

use App\Game\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testCardCreation(): void
    {
        $card = new Card('Hearts', 'Ace', 11);

        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals('Hearts', $card->getSuit());
        $this->assertEquals('Ace', $card->getRank());
        $this->assertEquals(11, $card->getValue());
    }

    public function testToString(): void
    {
        $card = new Card('Diamonds', 'King', 10);

        $this->assertEquals('King of Diamonds', (string)$card);
    }

    public function testGetAsString(): void
    {
        $card = new Card('Hearts', '10', 10);

        $this->assertEquals('10♥', $card->getAsString());
    }

    public function testGetAsStringWithAllSuits(): void
    {
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $expectedSymbols = ['♥', '♦', '♣', '♠'];

        foreach ($suits as $index => $suit) {
            $card = new Card($suit, 'A', 11);
            $this->assertStringContainsString($expectedSymbols[$index], $card->getAsString());
        }
    }

    public function testCardValueTypes(): void
    {
        $card = new Card('Spades', '5', 5);

        $this->assertIsInt($card->getValue());
        $this->assertIsString($card->getSuit());
        $this->assertIsString($card->getRank());
    }
}
