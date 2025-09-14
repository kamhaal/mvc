<?php
namespace App\Tests\Dice;

use App\Dice\Dice;
use PHPUnit\Framework\TestCase;

class DiceTest extends TestCase
{
    public function testRollSetsValueBetweenOneAndSix()
    {
        $dice = new Dice();
        $value = $dice->roll();

        $this->assertGreaterThanOrEqual(1, $value);
        $this->assertLessThanOrEqual(6, $value);
    }

    public function testGetValueAndAsString()
    {
        $dice = new Dice();
        $dice->roll();

        $this->assertIsInt($dice->getValue());
        $this->assertMatchesRegularExpression('/\[([1-6])\]/', $dice->getAsString());
    }
}
