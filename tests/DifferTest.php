<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DifferTest extends TestCase
{
    public function testDiffer(): void
    {
        $greeter = Greeter;

        $greeting = $greeter->greet('Alice');

        $this->assertSame('Hello, Alice!', $greeting);
    }
}