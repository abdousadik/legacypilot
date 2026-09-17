# Architecture Decision Log

Important technical decisions are recorded here so they do not disappear inside chat history.

## ADR-001 — Git Repository Is the Technical Source of Truth

Date: 2026-09-17

Decision:

Technical roadmap, checkpoints, architecture decisions, and project documentation live inside the LegacyPilot repository.

Reason:

The project should remain understandable and resumable independently of any individual ChatGPT conversation.

Notion may be used as a higher-level dashboard, but Git remains authoritative for technical project state.

---

## ADR-002 — Docker Is the Canonical Application Runtime

Date: 2026-09-17

Decision:

LegacyPilot will run through Docker even though PHP and Composer are also installed natively inside WSL.

Reason:

Docker provides:

- reproducibility
- environment isolation
- easier onboarding
- closer development/production parity
- practical Docker experience

Native PHP and Composer remain optional developer conveniences.

---

## ADR-003 — Start Small

Date: 2026-09-17

Decision:

The initial application will contain only PHP, Composer, Symfony, and Docker.

PostgreSQL, Redis, Python, AI services, queues, Kubernetes, and cloud infrastructure will be introduced only when the application has a concrete need for them.

Reason:

Avoid unnecessary complexity and ensure each technology is actually understood.
