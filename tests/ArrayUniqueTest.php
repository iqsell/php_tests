<?php

use PHPUnit\Framework\TestCase;

// Тестовый класс для arrayUnique
class ArrayUniqueTest extends TestCase
{
    // Тест на обычный массив с дубликатами
    public function testArrayWithDuplicates()
    {
        $result = arrayUnique([123, 123, 123, 22, 23, 24]);
        $this->assertEquals([123, 22, 23, 24], $result);
    }

    // Тест на массив без дубликатов
    public function testArrayWithoutDuplicates()
    {
        $result = arrayUnique([1, 2, 3, 4, 5]);
        $this->assertEquals([1, 2, 3, 4, 5], $result);
    }

    // Тест на пустой массив
    public function testEmptyArray()
    {
        $result = arrayUnique([]);
        $this->assertEquals([], $result);
    }

    // Тест на массив с одинаковыми элементами
    public function testArrayWithAllSameElements()
    {
        $result = arrayUnique([5, 5, 5, 5, 5]);
        $this->assertEquals([5], $result);
    }

    // Тест на массив с разными типами данных
    public function testArrayWithMixedTypes()
    {
        $result = arrayUnique([1, '1', 1, '1', true, false, true]);
        $this->assertEquals([1, false], $result);
    }


}

function arrayUnique($lst): array
{
    return array_values(array_unique($lst));
}
