<?php
namespace App\Tests\Library;

use App\Library\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testSettersAndGetters()
    {
        $book = new Book();
        $book->setTitle("1984");
        $book->setAuthor("George Orwell");

        $this->assertEquals("1984", $book->getTitle());
        $this->assertEquals("George Orwell", $book->getAuthor());
    }
}
