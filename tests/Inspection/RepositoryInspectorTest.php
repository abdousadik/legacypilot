<?php

declare(strict_types=1);

namespace App\Tests\Inspection;

use App\Inspection\ProjectPath;
use App\Inspection\RepositoryInspector;
use PHPUnit\Framework\TestCase;

final class RepositoryInspectorTest extends TestCase
{
    public function testItDetectsAComposerProject(): void
    {
        $projectPath = new ProjectPath(dirname(__DIR__, 2));

        $inspector = new RepositoryInspector();

        $inspection = $inspector->inspect($projectPath);

        self::assertTrue($inspection->hasComposerFile());
    }

    public function testItDetectsASymfonyProject(): void
    {
        $projectPath = new ProjectPath(dirname(__DIR__, 2));

        $inspector = new RepositoryInspector();

        $inspection = $inspector->inspect($projectPath);

        self::assertTrue($inspection->isSymfonyProject());
    }

    public function testItDetectsTheSymfonyVersionConstraint(): void
    {
        $directory = sys_get_temp_dir().'/legacypilot-'.bin2hex(random_bytes(8));

        mkdir($directory);

        file_put_contents(
            $directory.'/composer.json',
            json_encode([
                'require' => [
                    'symfony/framework-bundle' => '^6.4',
                ],
            ], JSON_THROW_ON_ERROR),
        );

        try {
            $projectPath = new ProjectPath($directory);

            $inspector = new RepositoryInspector();

            $inspection = $inspector->inspect($projectPath);

            self::assertSame('^6.4', $inspection->symfonyVersionConstraint());
        } finally {
            unlink($directory.'/composer.json');
            rmdir($directory);
        }
    }

    public function testItDetectsANonComposerDirectory(): void
    {
        $directory = sys_get_temp_dir().'/legacypilot-'.bin2hex(random_bytes(8));

        mkdir($directory);

        try {
            $inspection = (new RepositoryInspector())->inspect(
                new ProjectPath($directory),
            );

            self::assertFalse($inspection->hasComposerFile());
            self::assertFalse($inspection->isSymfonyProject());
            self::assertNull($inspection->symfonyVersionConstraint());
        } finally {
            rmdir($directory);
        }
    }

    public function testItDetectsAComposerProjectThatIsNotSymfony(): void
    {
        $directory = sys_get_temp_dir().'/legacypilot-'.bin2hex(random_bytes(8));

        mkdir($directory);

        file_put_contents(
            $directory.'/composer.json',
            json_encode([
                'require' => [
                    'php' => '^8.2',
                ],
            ], JSON_THROW_ON_ERROR),
        );

        try {
            $inspection = (new RepositoryInspector())->inspect(
                new ProjectPath($directory),
            );

            self::assertTrue($inspection->hasComposerFile());
            self::assertFalse($inspection->isSymfonyProject());
            self::assertNull($inspection->symfonyVersionConstraint());
        } finally {
            unlink($directory.'/composer.json');
            rmdir($directory);
        }
    }
}