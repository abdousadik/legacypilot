<?php

declare(strict_types=1);

namespace App\Command;

use App\Inspection\ProjectPath;
use App\Inspection\RepositoryInspector;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'legacypilot:inspect',
    description: 'Inspect a project repository.',
)]
final class InspectCommand extends Command
{
    public function __construct(
        private readonly RepositoryInspector $inspector,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument(
            'path',
            InputArgument::REQUIRED,
            'Path to the project repository.',
        );
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output,
    ): int {
        $projectPath = new ProjectPath(
            $input->getArgument('path'),
        );

        $inspection = $this->inspector->inspect($projectPath);

        $output->writeln(
            'Composer project: '.($inspection->hasComposerFile() ? 'yes' : 'no'),
        );

        $output->writeln(
            'Symfony project: '.($inspection->isSymfonyProject() ? 'yes' : 'no'),
        );

        if ($inspection->symfonyVersionConstraint() !== null) {
            $output->writeln(
                'Symfony requirement: '.$inspection->symfonyVersionConstraint(),
            );
        }

        return Command::SUCCESS;
    }
}