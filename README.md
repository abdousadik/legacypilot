# LegacyPilot

An early-stage PHP/Symfony CLI learning project for inspecting Composer-based repositories.

## Implemented

The `legacypilot:inspect` command accepts a local directory and reports:

- Whether it contains `composer.json`.
- Whether `require.symfony/framework-bundle` is declared.
- The declared Symfony version constraint, when present.

It reads project metadata; it does not run modernization, generate tests, perform security analysis, or inspect a dependency graph.

## Development

The repository includes a Docker development environment, Composer dependencies and PHPUnit tests.

With PHP 8.4.1 or later and Composer installed (as required by the current locked dependencies):

    composer install
    php bin/console legacypilot:inspect /absolute/path/to/project
    php bin/phpunit

### Docker

The Dockerfile uses PHP 8.5 CLI and Composer 2.10.3. The Compose service mounts this repository at `/app`; it does not run a persistent application server. From the repository root:

    docker compose build app
    docker compose run --rm app composer install
    docker compose run --rm app php bin/console legacypilot:inspect /app
    docker compose run --rm app php bin/phpunit

These commands inspect this repository. For another repository, add a read-only bind mount to a one-off container, for example:

    docker compose run --rm -v /absolute/path/to/project:/target:ro app php bin/console legacypilot:inspect /target

The container runs as UID/GID 1000; its user must be able to read the target and write dependency/cache files in this checkout.

The inspected path must be accessible from the environment running the command. When using Docker, mount the target directory into the container and use its container path.

## Status and roadmap

This is a small implementation and an ongoing learning project. Broader legacy analysis, test generation, static analysis, mutation testing and modernization reports are future goals.

- [Roadmap](docs/ROADMAP.md)
- [Checkpoints](docs/CHECKPOINTS.md)
- [Decisions](docs/DECISIONS.md)
- [Learning notes](docs/LEARNING.md)
