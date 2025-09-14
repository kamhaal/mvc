<?php
namespace App\Tests\Dice;

use App\Dice\DiceGraphic;
use PHPUnit\Framework\TestCase;

class DiceGraphicTest extends TestCase
{
    public function testRollAndGraphicOutput()
    {
        $dice = new DiceGraphic();
        $value = $dice->roll();

        $this->assertGreaterThanOrEqual(1, $value);
        $this->assertLessThanOrEqual(6, $value);

        $graphic = $dice->getAsString();
        $this->assertIsString($graphic);
        $this->assertNotEmpty($graphic);
    }
}
