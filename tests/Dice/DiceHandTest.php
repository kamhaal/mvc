<?php
namespace App\Tests\Dice;

use App\Dice\Dice;
use App\Dice\DiceHand;
use PHPUnit\Framework\TestCase;

class DiceHandTest extends TestCase
{
    public function testAddAndCountDice()
    {
        $hand = new DiceHand();
        $hand->add(new Dice());
        $hand->add(new Dice());

        $this->assertEquals(2, $hand->getNumberDices());
    }

    public function testRollAndGetValues()
    {
        $hand = new DiceHand();
        $hand->add(new Dice());
        $hand->add(new Dice());
        $hand->roll();

        $values = $hand->getValues();
        $this->assertCount(2, $values);
        foreach ($values as $val) {
            $this->assertGreaterThanOrEqual(1, $val);
            $this->assertLessThanOrEqual(6, $val);
        }
    }

    public function testGetStringReturnsArrayOfStrings()
    {
        $hand = new DiceHand();
        $hand->add(new Dice());
        $hand->roll();

        $strings = $hand->getString();
        $this->assertIsArray($strings);
        $this->assertNotEmpty($strings);
        $this->assertIsString($strings[0]);
    }
}
