<?php

declare(strict_types=1);

use function Differ\Differ\genDiff;
use PHPUnit\Framework\TestCase;

final class DifferTest extends TestCase
{
    public function testDiffer(): void
    {

        $greeting = genDiff('Alice', 'Boob');

        $this->assertSame('Hello, Alice, Boob!', $greeting);
    }

    public function testDiffer2(): void
    {

        $greeting = genDiff('Ali', 'Foo');

        $this->assertSame('Hello, Ali, Foo!', $greeting);
    }
        
    public function test() 
    {
        $expected = "geeks"; 
        $actual = "geeks";
        $message = "actual value for function test() is not equals to expected";  
        
        $this->assertSame($expected, $actual, $message);
    }

    // file() — Читает содержимое файла и помещает его в массив
    // file_get_contents — Считывает весь файл в строку или предпочтительный способ чтения содержимого файла в строку.

    public function test2() 
    {
        $file1 = $this->getPathToFile("file11.json"); // не выводить на экран а использовать значения в файле
        $file2 = $this->getPathToFile('file22.json');  // не выводить на экран а использовать значения в файле
        $expected = file_get_contents($this->getPathToFile('file33.json')); // исправить ... сделать ожидаемое значение - файлом со значением. Или массивом 
        $actual = genDiff($file1, $file2); // использовать значения из файлов и что то с ними сделать... например соеденить в один массив
        $message = "actual value for function test2() is not equals to expected";  
        
        $this->assertSame($expected, $actual, $message);
    }
    
    private function getPathToFile($fileName)
    {
        return __DIR__ . "/fixtures/" . $fileName;
    }
}
