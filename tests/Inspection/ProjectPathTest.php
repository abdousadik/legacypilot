<?php

declare(strict_types=1);

namespace App\Tests\Inspection;

use App\Inspection\ProjectPath;
use PHPUnit\Framework\TestCase;

final class ProjectPathTest extends TestCase
{
    public function testItRepresentsAnExistingDirectory(): void
    {
        $directory = __DIR__;

        $projectPath = new ProjectPath($directory);

        self::assertSame($directory, $projectPath->value());
    }

    public function testItRejectsANonExistingDirectory(): void
    {
        $directory = __DIR__.'/this-directory-does-not-exist';

        self::assertDirectoryDoesNotExist($directory);

        $this->expectException(\InvalidArgumentException::class);

        new ProjectPath($directory);
    }
}