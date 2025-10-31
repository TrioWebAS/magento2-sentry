# Upstream changes since 2024-11-15

Context: We last synced from upstream on 2024-11-15. This document summarizes upstream changes from that date onward and groups them thematically for review. Reference only; no code changes.

## Sources
- Upstream repository: `https://github.com/justbetter/magento2-sentry`
- Internal reference (do not modify): `docs/plans/upstream-status-report.md`

## Method
- Identify the upstream commit at/near 2024-11-15.
- Review commits on `upstream/master` after that point.
- Summarize notable changes with links and classify by type (feature, fix, infra, docs, CSP, performance).

## Highlights (context and themes)
- User context improvements around early Nov 2024 introduced additional context capture in transactions and events.
- CSP adjustments from summer/fall 2024 work (secure render and allowlists) continued to be refined.
- Tooling and static analysis updates (PHPStan/PHPCS/workflows) can affect contribution standards.

## Post-2024-11-15 upstream changes (to be recorded)
Use this to record concrete items with links after running a local review:

- YYYY-MM-DD short-sha Title (Author) — commit/PR link

Suggested command:
```bash
git log upstream/master --since="2024-11-15" --pretty=format:"- %ad %h %s (%an)" --date=short
```

## Potential impact
- Configuration: verify defaults and new flags added during late 2024/2025.
- Frontend: CSP rules may require store/theme allowlist updates.
- Observability: ensure performance and profiling options align with our environment.

## Next steps
- Cross-reference each item with `origin/production` to determine divergence.
- Feed discrepancies into the branch diff doc and the upgrade plan.

## References
- Upstream: `https://github.com/justbetter/magento2-sentry`
- Our production history (for comparison context): `https://github.com/TrioWebAS/magento2-sentry/commits/production/`
- Do not modify: `docs/plans/upstream-status-report.md`
