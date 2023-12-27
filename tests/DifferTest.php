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

    public function test2() 
    {
        $file1 = 'tests/fixtures/file11.json';
        $file1 = 'tests/fixtures/file22.json';
        $expected = "Hello, Alia, Foo!"; 
        $actual = genDiff($file1, $file2);
        $message = "actual value for function test2() is not equals to expected";  
        
        $this->assertSame($expected, $actual, $message);
    }          
}
