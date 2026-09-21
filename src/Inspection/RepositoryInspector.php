<?php

declare(strict_types=1);

namespace App\Inspection;

final class RepositoryInspector
{
    public function inspect(ProjectPath $projectPath): ProjectInspection
    {
        $composerFile = $projectPath->value().'/composer.json';
        $hasComposerFile = is_file($composerFile);

        $symfonyVersionConstraint = null;

        if ($hasComposerFile) {
            $composer = json_decode(
                file_get_contents($composerFile),
                true,
                flags: JSON_THROW_ON_ERROR,
            );

            $symfonyVersionConstraint =
                $composer['require']['symfony/framework-bundle'] ?? null;
        }

        return new ProjectInspection(
            hasComposerFile: $hasComposerFile,
            symfonyVersionConstraint: $symfonyVersionConstraint,
        );
    }
}