<?php

namespace App\Tests\Proj;

use PHPUnit\Framework\TestCase;
use App\Game\Card;

class CardTest extends TestCase
{
    public function testCardProperties(): void
    {
        $card = new Card('Hearts', 'Ace', 14);

        $this->assertEquals('Hearts', $card->getSuit());
        $this->assertEquals('Ace', $card->getRank());
        $this->assertEquals(14, $card->getValue());
    }

    public function testToString(): void
    {
        $card = new Card('Spades', 'King', 10);
        $this->assertStringContainsString('King', (string)$card);
    }
}
