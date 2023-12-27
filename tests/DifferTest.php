<?php

declare(strict_types=1);

use function Differ\Differ\genDiffer;
use PHPUnit\Framework\TestCase;

final class DifferTest extends TestCase
{
    public function testDiffer(): void
    {
        
        $greeting = genDiffer('Alice', 'Boob');

        $this->assertSame('Hello, Alice, Boob!', $greeting);
    }
}