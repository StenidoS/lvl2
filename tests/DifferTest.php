<?php

declare(strict_types=1);

use function Differ\Differ\stringify;
use function Differ\Differ\genDiff;
use PHPUnit\Framework\TestCase;

final class DifferTest extends TestCase
{   

    public function test2() 
    {
        
        $file1 = $this->getPathToFile('file1.json'); // не выводить на экран а использовать значения в файле
        $file2 = $this->getPathToFile('file2.json');  // не выводить на экран а использовать значения в файле
        $expected = file_get_contents($this->getPathToFile('expected')); // исправить ... сделать ожидаемое значение - файлом со значением. Или массивом 
        $actual = genDiff($file1, $file2); // использовать значения из файлов и что то с ними сделать... например соеденить в один массив
        $message = "actual value for function test2() is not equals to expected"; // в сообщении можно определить конкретно данный тест для удобства работы с ошибками 
        
        $this->assertSame($expected, $actual, $message);
    }
    
    // Проверка на примитивных типах
    public function testPrimitiveTypes()
    {
        $this->assertSame('123', stringify(123));
        $this->assertSame('"abc"', stringify('abc'));
        $this->assertSame('true', stringify(true));
    }

    // Проверка на "плоских" данных
    public function testFlatData()
    {
        $flatData = array('key1' => 'value1', 'key2' => 'value2');
        $expectedResult = "{\n key1: value1\n key2: value2\n}";
        $this->assertSame($expectedResult, stringify($flatData));
    }

    // Проверка на "вложенных" данных
    public function testNestedData()
    {
        $nestedData = array('key1' => array('nestedKey1' => 'nestedValue1'), 'key2' => 'value2');
        $expectedResult = "{\n key1: {\"nestedKey1\":\"nestedValue1\"}\n key2: value2\n}";
        $this->assertSame($expectedResult, stringify($nestedData));
    }
    
    //определена как приватная, чтобы ограничить ее доступность только внутри того класса или объекта, в котором она объявлена.
    private function getPathToFile($fileName)
    {
        return __DIR__ . "/fixtures/" . $fileName;
    }
}
