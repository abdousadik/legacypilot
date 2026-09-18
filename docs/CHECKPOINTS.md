# LegacyPilot Checkpoints

Last updated: 2026-09-17

## Phase 0 — Engineering Foundation

### 0.1 Development Environment

Status: ✅ PASS

Verified:

- WSL2 Ubuntu
- Git 2.53.0
- Docker 28.5.1
- Docker Compose 2.40.3
- PHP 8.5.4 native inside WSL
- Composer 2.10.3 native inside WSL

Notes:

- Docker Desktop provides the Docker engine through WSL2 integration.
- PHP and Composer installed in WSL are convenience tools.
- The LegacyPilot application runtime will be Docker-based.
- The project must not depend on the host machine having PHP installed.

### 0.2 Project HQ & Roadmap

Status: ✅ PASS

Completed:

- Repository is the canonical technical source of truth.
- GitHub remote configured and main branch pushed.
- Roadmap and checkpoints tracked in Git.
- Learning outcomes tracked in Git.
- Architecture decisions tracked in Git.
- Notion Career & Engineering HQ created.
- Notion roadmap, projects, and skills databases created.

### 0.3 Docker Development Environment

Status: ✅ PASS

Verified:

- Docker is the canonical LegacyPilot application runtime.
- PHP 8.5.10 runs inside the project container.
- Composer 2.10.3 runs inside the project container.
- Symfony 8.1.7 boots successfully inside Docker.
- Docker Compose configuration validates successfully.
- Container runs as a non-root user matching the WSL UID/GID.
- Git, unzip and the PHP zip extension are available.
- Symfony dependency injection container lints successfully.
- `composer validate --strict` passes.
- `vendor/` and runtime files are excluded from Git.
- Docker build context excludes unnecessary generated files.

Notes:

- The application is CLI-first, so development commands currently use `docker compose run --rm app ...`.
- No database, Redis, web server or other infrastructure has been added yet.
- Symfony Flex 2.11.0 emits a non-blocking PHP 8.5 deprecation in some Composer invocations.

### 0.4 Modern PHP & Symfony Foundation

Status: 🟡 IN PROGRESS
