# Learning Log

This file records concepts that have actually been understood and applied.

Watching a tutorial does not count as learning until the concept is used or explained.

## Phase 0

### WSL2

Learned:

- WSL provides a Linux development environment on Windows.
- Keeping Linux projects under `~/projects` avoids working through the Windows `/mnt/c` filesystem.
- Docker Desktop can expose its Docker engine directly to WSL2.

### PHP

Environment:

- PHP 8.5.4
- `/usr/bin/php`

Learned:

- Host PHP is a developer convenience.
- Application runtime reproducibility should come from Docker.

### Composer

Environment:

- Composer 2.10.3
- `/usr/local/bin/composer`

Learned:

- Windows and WSL binaries can accidentally mix through PATH.
- Project tooling should avoid depending on accidental host configuration.

### Docker

Environment:

- Docker 28.5.1
- Docker Compose 2.40.3

Current understanding:

- Docker will provide the canonical runtime for LegacyPilot.
- A developer should eventually be able to clone the repository and start the application without manually reproducing the author's PHP configuration.

## Docker Development Environment

Applied in LegacyPilot:

- A Dockerfile defines the application's PHP runtime.
- Docker Compose defines how the development service is run.
- The host PHP installation is not the application runtime.
- Source code is bind-mounted from WSL into `/app`.
- Container UID/GID matches the WSL user to avoid root-owned project files.
- Composer is copied from its official Docker image using a multi-stage build.
- Linux packages and PHP extensions are different layers of dependencies:
- `libzip-dev` provides the system library/build dependency.
- `docker-php-ext-install zip` builds the PHP extension.
- `.gitignore` controls Git tracking.
- `.dockerignore` controls Docker build context.
- `docker compose run --rm app` is appropriate for the current CLI-first application.
- Long-running services will be introduced only when LegacyPilot actually needs them.

Verified runtime:

- PHP 8.5.10
- Composer 2.10.3
- Symfony 8.1.7