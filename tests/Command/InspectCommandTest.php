<?php

declare(strict_types=1);

namespace App\Tests\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use App\Kernel;

final class InspectCommandTest extends TestCase
{
    public function testItInspectsAProject(): void
    {
        $kernel = new Kernel('test', true);
        $kernel->boot();

        try {
            $application = new Application($kernel);

            $command = $application->find('legacypilot:inspect');
            $tester = new CommandTester($command);

            $exitCode = $tester->execute([
                'path' => dirname(__DIR__, 2),
            ]);

            self::assertSame(Command::SUCCESS, $exitCode);
            self::assertStringContainsString(
                'Composer project: yes',
                $tester->getDisplay(),
            );
            self::assertStringContainsString(
                'Symfony project: yes',
                $tester->getDisplay(),
            );
            self::assertStringContainsString(
                'Symfony requirement: 8.1.*',
                $tester->getDisplay(),
            );
        } finally {
            $kernel->shutdown();
        }
    }
}