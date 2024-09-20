<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/Cipher.php';

// Тесты для функции cipher
class CipherTest extends TestCase
{
    // Тест шифрования русского текста с положительным ключом
    public function testCipherWithRussianTextAndPositiveKey()
    {
        $result = cipher('абвгд', 1);
        $this->assertEquals('бвгде', $result);
    }

    // Тест шифрования английского текста с положительным ключом
    public function testCipherWithEnglishTextAndPositiveKey()
    {
        $result = cipher('abcde', 2);
        $this->assertEquals('cdefg', $result);
    }

    // Тест шифрования с ключом, превышающим длину алфавита
    public function testCipherWithKeyGreaterThanAlphabetLength()
    {
        $result = cipher('абвгд', 33); //
        $this->assertEquals('бвгде', $result);
    }

    // Тест шифрования текста с неалфавитными символами
    public function testCipherWithNonAlphabetCharacters()
    {
        $result = cipher('абвгд123', 1);
        $this->assertEquals('бвгде123', $result);
    }

    // Тест шифрования текста с отрицательным ключом
    public function testCipherWithNegativeKey()
    {
        $result = cipher('бвгде', -1);
        $this->assertEquals('абвгд', $result);
    }
}

function cipher(string $text, int $key): string
{
    $russianAlphabet = 'абвгдежзийклмнопрстуфхцчшщъыьэюя';
    $russianAlphabetArray = preg_split('//u', $russianAlphabet, -1, PREG_SPLIT_NO_EMPTY);

    $englishAlphabet = range('a', 'z');

    $textChars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);

    $result = '';
    foreach ($textChars as $symbol) {
        $currentAlphabet = $englishAlphabet;
        if (in_array($symbol, $russianAlphabetArray)) {
            $currentAlphabet = $russianAlphabetArray;
        }
        if (in_array($symbol, $currentAlphabet)) {
            $currentIndex = array_search($symbol, $currentAlphabet);
            $newIndex = ($currentIndex + $key) % count($currentAlphabet);
            if ($newIndex < 0) {
                $newIndex += count($currentAlphabet);
            }
            $result .= $currentAlphabet[$newIndex];
        } else {
            $result .= $symbol;
        }
    }
    return $result;
}
