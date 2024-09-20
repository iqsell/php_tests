<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\ArrayUnique;

class ArrayUniqueTest extends TestCase
{
    public function testArrayWithDuplicates()
    {
        $result = ArrayUnique::ArrayUnique([123, 123, 123, 22, 23, 24]);
        $this->assertEquals([123, 22, 23, 24], $result);
    }

    public function testArrayWithoutDuplicates()
    {
        $result = ArrayUnique::ArrayUnique([1, 2, 3, 4, 5]);
        $this->assertEquals([1, 2, 3, 4, 5], $result);
    }

    public function testEmptyArray()
    {
        $result = ArrayUnique::ArrayUnique([]);
        $this->assertEquals([], $result);
    }

    public function testArrayWithAllSameElements()
    {
        $result = ArrayUnique::ArrayUnique([5, 5, 5, 5, 5]);
        $this->assertEquals([5], $result);
    }

    public function testArrayWithMixedTypes()
    {
        $result = ArrayUnique::ArrayUnique([1, '1', 1, '1', true, false, true]);
        $this->assertEquals([1, false], $result);
    }
}
