<?php

namespace App\Tests\Unit\Deck;

use PHPUnit\Framework\TestCase;
use App\Game\Deck;
use App\Game\Card;

/**
 * Test cases for class Deck.
 */
class DeckTest extends TestCase
{
    /**
     * Test creating a Deck object and verifying it contains 52 cards.
     */
    public function testCreateDeck(): void
    {
        $deck = new Deck();

        $this->assertInstanceOf(Deck::class, $deck);
        $this->assertCount(52, $deck->getCards());
    }

    /**
     * Test shuffling the deck.
     */
    public function testShuffleDeck(): void
    {
        $deck1 = new Deck();
        $deck2 = new Deck();

        $initialOrder = $deck1->getCards();
        $deck2->shuffle();
        $shuffledOrder = $deck2->getCards();

        $this->assertNotEquals($initialOrder, $shuffledOrder);
        $this->assertCount(52, $shuffledOrder);
    }

    /**
     * Test drawing a card from the deck.
     */
    public function testDrawCard(): void
    {
        $deck = new Deck();
        $initialCount = count($deck->getCards());

        $card = $deck->draw();

        $this->assertInstanceOf(Card::class, $card);
        $this->assertCount($initialCount - 1, $deck->getCards());
    }
}
