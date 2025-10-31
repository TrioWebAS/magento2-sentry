# Sentry module status: Executive summary (ELI5)

Audience: Non-technical. What we have that upstream (justbetter) may not, and what upstream has that we may not yet.

Sources
- Upstream: `https://github.com/justbetter/magento2-sentry`
- Our production history: `https://github.com/TrioWebAS/magento2-sentry/commits/production/`
- Internal reference (read-only): `docs/plans/upstream-status-report.md`

What we added (local advantages)
- Performance improvements (from external fork): We integrated extra performance tracing to better measure page speed and bottlenecks.
- Per‑store configuration: Settings can differ per store view, giving us finer control.
- CSP (security) tweaks: Adjusted rules to make modern tracking/tools work while staying safe.
- Composer vendor rename: Our package is branded under `triowebas` for internal consistency.

What upstream added (potential gaps for us)
- User context in error reports: More information about who/what triggered an error to help support.
- Formalized performance/profiling: Upstream introduced a structured series of performance hooks; we overlap, but alignment should be verified.
- Safer CSP rendering defaults: Changes that reduce security warnings by default.
- Developer quality gates: Stricter automated checks (coding standards, static analysis) to prevent regressions.

Why this matters
- Support quality: Better user context and measurements mean faster issue resolution.
- Security posture: CSP improvements reduce risk and noise from browser security.
- Stability: Aligning with upstream standards lowers long‑term maintenance.

Recommended path (plain language)
1) Compare features side‑by‑side and keep the best of both.
2) Roll in upstream improvements safely, in small steps.
3) Keep our must‑have customizations (like per‑store settings) with minimal changes.
4) Verify on staging, then release with an easy rollback.

Key risks to watch
- Overlapping performance code: Avoid double‑counting or slowing pages.
- CSP breakage: Ensure pages and third‑party tools continue working.
- Package naming: Decide whether to keep our vendor name or align with upstream to ease updates.

Bottom line
- We already have valuable additions for performance and configuration.
- Upstream has added helpful context, safer defaults, and stronger quality checks.
- A careful, phased update will give us the best of both with low risk.
