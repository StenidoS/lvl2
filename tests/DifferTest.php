<?php

declare(strict_types=1);


use function Differ\Differ\genDiff;
use function Differ\Parsers\parseYaml;

use PHPUnit\Framework\TestCase;

final class DifferTest extends TestCase
{
    

    // Проверка на "вложенных" данных

    public function test2()
    {

        $file1 = $this->getPathToFile('file1.json'); // не выводить на экран а использовать значения в файле
        $file2 = $this->getPathToFile('file2.json');  // не выводить на экран а использовать значения в файле
        $expected = file_get_contents($this->getPathToFile('jsonExpected')); // исправить ... сделать ожидаемое значение - файлом со значением. Или массивом
        $actual = genDiff($file1, $file2); // использовать значения из файлов и что то с ними сделать... например соеденить в один массив
        $message = "actual value for function test2() is not equals to expected"; // в сообщении можно определить конкретно данный тест для удобства работы с ошибками

        $this->assertSame($expected, $actual, $message);
    }

    public function test3()
    {

        $file1 = $this->getPathToFile('file111.yaml'); // не выводить на экран а использовать значения в файле
        $file2 = $this->getPathToFile('file222.yaml');  // не выводить на экран а использовать значения в файле
        $expected = file_get_contents($this->getPathToFile('jsonExpected')); // исправить ... сделать ожидаемое значение - файлом со значением. Или массивом
        $actual = genDiff($file1, $file2); // использовать значения из файлов и что то с ними сделать... например соеденить в один массив
        $message = "actual value for function test2() is not equals to expected"; // в сообщении можно определить конкретно данный тест для удобства работы с ошибками

        $this->assertSame($expected, $actual, $message);
    }

    //определена как приватная, чтобы ограничить ее доступность только внутри того класса или объекта, в котором она объявлена.
    private function getPathToFile($fileName)
    {
        return __DIR__ . "/fixtures/" . $fileName;
    }
}
