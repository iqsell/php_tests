<?php

use PHPUnit\Framework\TestCase;


class MostRecentTest extends TestCase
{
    // Тест на стандартный ввод
    public function testMostRecentWithRegularInput()
    {
        $result = mostRecent('123 123 123 qq qq qq qq');
        $this->assertEquals('qq', $result);
    }

    // Тест на ввод с одним словом
    public function testMostRecentWithSingleWord()
    {
        $result = mostRecent('hello');
        $this->assertEquals('hello', $result);
    }

    // Тест на ввод с пустой строкой
    public function testMostRecentWithEmptyString()
    {
        $result = mostRecent('');
        $this->assertEquals('', $result);
    }

    // Тест на ввод с одинаковым количеством разных слов
    public function testMostRecentWithEqualWordFrequency()
    {
        $result = mostRecent('apple orange apple orange');
        $this->assertEquals('apple orange', $result);
    }

    // Тест на ввод с пробелами
    public function testMostRecentWithSpaces()
    {
        $result = mostRecent('  apple  banana  apple ');
        $this->assertEquals('apple', $result);
    }
}

function mostRecent(string $text): string
{
    $words = array_filter(explode(' ', $text));

    if (empty($words)) {
        return '';
    }

    $wordCounts = array_count_values($words);
    arsort($wordCounts);

    $mostCommonWordCount = reset($wordCounts);
    $mostCommonWords = array_keys($wordCounts, $mostCommonWordCount);

    return implode(' ', $mostCommonWords);
}
