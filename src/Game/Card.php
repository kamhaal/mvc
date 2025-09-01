<?php

namespace App\Game;

/**
 * Represents a playing card in a card game
 *
 * This class models a standard playing card with a suit, rank, and numeric value
 * used for scoring in card games.
 */
class Card
{
    private string $suit;
    private string $rank;
    private int $value;

    /**
     * Constructs a new Card instance
     *
     * @param string $suit The suit of the card (Hearts, Diamonds, Clubs, Spades)
     * @param string $rank The rank of the card (Ace, 2, 3, ..., King)
     * @param int $value The numeric value of the card for scoring purposes
     */
    public function __construct(string $suit, string $rank, int $value)
    {
        $this->suit = $suit;
        $this->rank = $rank;
        $this->value = $value;
    }

    /**
     * Gets the suit of the card
     *
     * @return string The suit of the card
     */
    public function getSuit(): string
    {
        return $this->suit;
    }

    /**
     * Gets the rank of the card
     *
     * @return string The rank of the card
     */
    public function getRank(): string
    {
        return $this->rank;
    }

    /**
     * Gets the numeric value of the card
     *
     * @return int The numeric value used for scoring
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Returns a string representation of the card
     *
     * @return string The card in "Rank of Suit" format
     */
    public function __toString(): string
    {
        return "{$this->rank} of {$this->suit}";
    }

    /**
     * Returns a compact string representation of the card with suit symbols
     *
     * @return string The card in "RankSymbol" format (e.g., "A♥")
     */
    public function getAsString(): string
    {
        $symbols = [
            'Hearts' => '♥',
            'Diamonds' => '♦',
            'Clubs' => '♣',
            'Spades' => '♠'
        ];

        return $this->rank . $symbols[$this->suit];
    }
}
