<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Cipher;

class CipherTest extends TestCase
{
    // Тест шифрования русского текста с положительным ключом
    public function testCipherWithRussianTextAndPositiveKey()
    {
        $result = Cipher::cipher('абвгд', 1);
        $this->assertEquals('бвгде', $result);
    }

    // Тест шифрования английского текста с положительным ключом
    public function testCipherWithEnglishTextAndPositiveKey()
    {
        $result = Cipher::cipher('abcde', 2);
        $this->assertEquals('cdefg', $result);
    }

    // Тест шифрования с ключом, превышающим длину алфавита
    public function testCipherWithKeyGreaterThanAlphabetLength()
    {
        $result = Cipher::cipher('абвгд', 33); //
        $this->assertEquals('бвгде', $result);
    }

    // Тест шифрования текста с неалфавитными символами
    public function testCipherWithNonAlphabetCharacters()
    {
        $result = Cipher::cipher('абвгд123', 1);
        $this->assertEquals('бвгде123', $result);
    }

    // Тест шифрования текста с отрицательным ключом
    public function testCipherWithNegativeKey()
    {
        $result = Cipher::cipher('бвгде', -1);
        $this->assertEquals('абвгд', $result);
    }
}

