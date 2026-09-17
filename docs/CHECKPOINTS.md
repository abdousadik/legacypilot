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

Status: 🟡 IN PROGRESS

Goals:

- Repository becomes the canonical project source of truth.
- Track roadmap and checkpoints in Git.
- Track learning outcomes.
- Record important architecture decisions.
- Prepare the project for reliable continuation across ChatGPT conversations.

### 0.3 Docker Development Environment

Status: ⬜ NOT STARTED

Planned initial environment:

- PHP 8.5
- Composer
- Symfony 8
- Docker Compose

No database initially.

### 0.4 Modern PHP & Symfony Foundation

Status: ⬜ NOT STARTED
