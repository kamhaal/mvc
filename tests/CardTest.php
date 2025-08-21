<?php

use PHPUnit\Framework\TestCase;
use App\Model\Card;

class CardTest extends TestCase
{
    public function testCardHasSuitAndValue()
    {
        $card = new Card('Hearts', 'Ace');
        $this->assertEquals('Hearts', $card->getSuit());
        $this->assertEquals('Ace', $card->getValue());
    }
}
