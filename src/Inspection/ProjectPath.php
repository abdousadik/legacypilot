<?php

declare(strict_types=1);

namespace App\Inspection;

final readonly class ProjectPath
{
    public function __construct(
        private string $value,
    ) {
        if (!is_dir($value)) {
            throw new \InvalidArgumentException(
                sprintf('Project path must be an existing directory: "%s".', $value),
            );
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}