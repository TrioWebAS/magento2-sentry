# Update path to production

Goal: Safely align `origin/production` with `upstream/master` while preserving necessary local behavior. No force-pushes, no history rewrites.

## References
- Upstream: `https://github.com/justbetter/magento2-sentry`
- Our production history: `https://github.com/TrioWebAS/magento2-sentry/commits/production/`
- Internal reference (do not modify): `docs/plans/upstream-status-report.md`

## Phase 1 — Document and align (no code changes)
- Complete: `docs/research/upstream-changes-since-2024-11-15.md`
- Complete: `docs/research/our-2024-premature-merges.md`
- Complete: `docs/research/diff-upstream-master_vs_origin-production.md`
- Define acceptance criteria: error reporting intact, profiling optional, CSP passes baseline pages, config parity.

## Phase 2 — Incremental upgrade branches
- Create topical branches under `upgrade/*` to isolate risk:
  - `upgrade/csp`
  - `upgrade/performance`
  - `upgrade/config`
  - `upgrade/vendor`
- For each branch:
  - Merge upstream changes for the topic.
  - Re-apply required local adjustments (only if not in upstream), with minimal diff.
  - Add feature flags for new behaviors where feasible.

## Phase 3 — Integrate via develop and QA
- Merge topical branches into `develop` behind flags where possible.
- QA Checklist:
  - Config parity validated across store views
  - CSP baseline on home, PLP, PDP, cart, checkout, admin dashboard
  - Error reporting and performance traces visible in Sentry
  - Admin login/logout workflows intact
- UAT sign-off and release notes prepared.

## Release to production
- Merge `develop` into `production` via PR.
- Rollback plan: revert merge commit if any regression detected.

## Risk register and mitigations
- Performance hooks conflict: guard with config flags and staged rollout.
- CSP regressions: start with report-only mode where applicable; iterate allowlists.
- Vendor rename: define composer strategy (keep local vendor or restore upstream vendor with replace mapping).

## Validation matrix
- Magento versions in use/environments
- PHP versions and opcache settings
- Sentry DSN per env; default integrations toggle
- Store-view specific config combinations

## Post-release
- Monitor error rates, transaction performance, and CSP violations for 7 days.
- Remove temporary flags if stable.
