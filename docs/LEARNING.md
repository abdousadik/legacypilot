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
