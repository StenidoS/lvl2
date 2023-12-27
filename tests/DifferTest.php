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
        
    public function testNegativeTestcaseForAssertEquals() 
    {
        $expected = "geeks"; 
        $actual = "geeks";
        $message = "actual value is not equals to expected"; 
  
        // Assert function to test whether expected 
        // value is equal to actual or not 
        $this->assertEquals( 
            $expected, 
            $actual, 
            $message
        );
    }     
}
