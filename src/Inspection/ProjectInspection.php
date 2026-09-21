<?php

declare(strict_types=1);

namespace App\Inspection;

final readonly class ProjectInspection
{
    public function __construct(
        private bool $hasComposerFile,
        private ?string $symfonyVersionConstraint,
    ) {
    }

    public function hasComposerFile(): bool
    {
        return $this->hasComposerFile;
    }

    public function isSymfonyProject(): bool
    {
        return $this->symfonyVersionConstraint !== null;
    }

    public function symfonyVersionConstraint(): ?string
    {
        return $this->symfonyVersionConstraint;
    }
}