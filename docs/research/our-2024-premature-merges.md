# Our prematurely merged 2024 PRs and local tweaks

Scope: Merges and tweaks after 2024-11-15 that were staged into `develop` and then promoted to `production`. Reference timeline pulled from our production history. Reference only; no code changes.

## Source
- Our production commits: `https://github.com/TrioWebAS/magento2-sentry/commits/production/`
- Internal reference (do not modify): `docs/plans/upstream-status-report.md`

## Entries

- 2024-12-04 — ba66643 — Merge `feat-performance` from `webidea24/magento2-sentry` into `develop`
  - Type: feature (performance tracing)
  - Notes: integrates upstream/fork performance work

- 2024-12-04 — 295da54 — Merge `bugfix/admin-logout` from `justbetter/magento2-sentry` into `develop`
  - Type: bugfix (admin session/logout)

- 2024-12-03 — 100865e — Merge `feature/configuration-per-store` from `blackbird-agency/magento2-sentry` into `develop`
  - Type: feature (per-store configuration)

- 2024-12-03 — b0b74bd — Merge `master` from `superdav42/magento2-sentry` into `merge-fix/csp`
  - Type: CSP improvements

- 2024-12-03 — 02d820b — Merge-fix; re-implements some missed improvements from a5ac47e
  - Type: reconciliation/merge fix

- 2024-12-03 — 7f10723 — Adds branch as submodule for Magento production
  - Type: infra/release process change

- 2025-02-04 — 3a50d14 — Composer vendor rename to triowebas
  - Type: local customization (vendor/package naming)
  - Impact: requires composer.json alignment when updating

## Categorization
- Features: performance tracing, per-store configuration
- Fixes: admin logout bugfix
- CSP/Frontend: CSP changes via external fork
- Infra: submodule and process
- Local customization: vendor rename to `triowebas`

## Next steps
- For each item, check if upstream/master provides an equivalent change post-2024-11-15.
- Any item not in upstream/master becomes a candidate for re-application or rework during upgrade.

## References
- Our production history: `https://github.com/TrioWebAS/magento2-sentry/commits/production/`
- Upstream repository: `https://github.com/justbetter/magento2-sentry`
- Do not modify: `docs/plans/upstream-status-report.md`
