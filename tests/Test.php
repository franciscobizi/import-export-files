<?php
use App\Builder;
use PHPUnit\Framework\TestCase;

final class Test extends TestCase
{
    // ...

    public function testOneInstance()
    {
        // Arrange
        //$a = new Money(1);
        $instance = new Crud();
        $v = $instance->db_read('artinov');

        // Act
        //$b = $a->negate();

        // Assert
        //$this->assertEquals(-1, $b->getAmount());
        $this->assertEquals(1,$v);
    }

    // ...
}

