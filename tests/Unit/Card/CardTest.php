<?php

namespace App\Tests\Unit\Card;

use PHPUnit\Framework\TestCase;
use App\Game\Card;

/**
 * Test cases for class Card.
 */
class CardTest extends TestCase
{
    /**
     * Test creating a Card object and verifying its properties.
     */
    public function testCreateCard(): void
    {
        $card = new Card('Hearts', 'Ace', 11);

        $this->assertInstanceOf(Card::class, $card);
        $this->assertEquals('Hearts', $card->getSuit());
        $this->assertEquals('Ace', $card->getRank());
        $this->assertEquals(11, $card->getValue());
    }

    /**
     * Test the toString method of Card.
     */
    public function testCardToString(): void
    {
        $card = new Card('Spades', 'King', 10);

        $this->assertEquals('King of Spades', $card->__toString());
    }

    /**
     * Test the getAsString method of Card.
     */
    public function testCardGetAsString(): void
    {
        $card = new Card('Hearts', 'Ace', 11);

        $this->assertEquals('Ace♥', $card->getAsString());
    }

    /**
     * Test getting the numeric value of a card.
     */
    public function testCardNumericValue(): void
    {
        $card = new Card('Diamonds', '10', 10);

        $this->assertEquals(10, $card->getValue());
    }

    /**
     * Test edge cases for card values.
     */
    public function testCardEdgeCases(): void
    {
        // Test Ace with value 1
        $card = new Card('Hearts', 'A', 1);
        $this->assertEquals(1, $card->getValue());

        // Test face card with value 10
        $card = new Card('Clubs', 'J', 10);
        $this->assertEquals(10, $card->getValue());
    }

    /**
     * Test all suit symbols in getAsString method.
     */
    public function testAllSuitSymbols(): void
    {
        $testCases = [
            ['Hearts', '10', '♥'],
            ['Diamonds', 'J', '♦'],
            ['Clubs', 'Q', '♣'],
            ['Spades', 'K', '♠']
        ];

        foreach ($testCases as $case) {
            $card = new Card($case[0], $case[1], 10);
            $this->assertStringContainsString($case[2], $card->getAsString());
        }
    }

    /**
     * Test that different ranks work correctly.
     */
    public function testDifferentRanks(): void
    {
        $ranks = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

        foreach ($ranks as $rank) {
            $value = is_numeric($rank) ? (int)$rank : ($rank === 'A' ? 1 : 10);
            $card = new Card('Hearts', $rank, $value);

            $this->assertEquals($rank, $card->getRank());
            $this->assertEquals($value, $card->getValue());
        }
    }

    /**
     * Test all card combinations.
     */
    public function testAllCardCombinations(): void
    {
        $suits = ['Hearts', 'Diamonds', 'Clubs', 'Spades'];
        $ranks = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

        foreach ($suits as $suit) {
            foreach ($ranks as $rank) {
                $value = is_numeric($rank) ? (int)$rank : ($rank === 'A' ? 1 : 10);
                $card = new Card($suit, $rank, $value);

                $this->assertEquals($suit, $card->getSuit());
                $this->assertEquals($rank, $card->getRank());
                $this->assertEquals($value, $card->getValue());
            }
        }
    }
}
