<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\MostRecent;

class MostRecentTest extends TestCase
{
    // Тест на стандартный ввод
    public function testMostRecentWithRegularInput()
    {
        $result = MostRecent::mostRecent('123 123 123 qq qq qq qq');
        $this->assertEquals('qq', $result);
    }

    // Тест на ввод с одним словом
    public function testMostRecentWithSingleWord()
    {
        $result = MostRecent::mostRecent('hello');
        $this->assertEquals('hello', $result);
    }

    // Тест на ввод с пустой строкой
    public function testMostRecentWithEmptyString()
    {
        $result = MostRecent::mostRecent('');
        $this->assertEquals('', $result);
    }

    // Тест на ввод с одинаковым количеством разных слов
    public function testMostRecentWithEqualWordFrequency()
    {
        $result = MostRecent::mostRecent('apple orange apple orange');
        $this->assertEquals('apple orange', $result);
    }

    // Тест на ввод с пробелами
    public function testMostRecentWithSpaces()
    {
        $result = MostRecent::mostRecent('  apple  banana  apple ');
        $this->assertEquals('apple', $result);
    }
}
