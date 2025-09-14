<?php
namespace App\Tests\Form;

use App\Form\BookType;
use PHPUnit\Framework\TestCase;

class BookTypeTest extends TestCase
{
    public function testBookTypeExists()
    {
        $formType = new BookType();
        $this->assertInstanceOf(BookType::class, $formType);
    }
}
