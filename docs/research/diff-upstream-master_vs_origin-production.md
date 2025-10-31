# Diff: upstream/master vs origin/production

Scope: High-level, path-based comparison to identify hotspots and behavioral differences. Reference only; no code changes.

## Sources
- Upstream repository: `https://github.com/justbetter/magento2-sentry`
- Our production commits: `https://github.com/TrioWebAS/magento2-sentry/commits/production/`
- Internal reference (do not modify): `docs/plans/upstream-status-report.md`

## Summary by path/category

### etc/
- Check `etc/config.xml` and `etc/adminhtml/system.xml` for new/renamed config options and defaults since 2024-11-15.
- Verify DI (`etc/di.xml`) for new preferences/plugins related to performance tracing and context providers.

### Helper/, Plugin/
- `Helper/Data.php`: confirm any additions for context/user data and performance toggles.
- Plugins related to logging/response finishing may differ due to performance series.

### Frontend/CSP
- CSP changes introduced by forks (see 2024-12-03/04 merges) vs upstream’s `secureRender` approach; reconcile allowlist differences.

### Composer and vendor naming
- Local change on 2025-02-04: composer vendor rename to `triowebas` (3a50d14). Upstream uses original vendor. Plan for mapping or revert during update.

### Workflows/QA
- Upstream raised PHPStan levels and updated workflows; ensure parity to keep CI green.

## Conflicts to watch
- Performance tracing hooks: additions to observers/plugins may conflict with local merges from external forks.
- CSP allowlists: theme and third-party integrations may diverge.
- Config flags: per-store configuration vs upstream defaults and scopes.
- Vendor/package name: composer.json and namespaces.

## Validation checklist
- [ ] File presence: added/removed/renamed files reconciled
- [ ] Config parity: keys, scopes, and defaults validated
- [ ] Behavior: tracing, context, and logging paths verified
- [ ] CSP: baseline tested on representative pages
- [ ] Composer: vendor name strategy defined

## References
- Upstream: `https://github.com/justbetter/magento2-sentry`
- Our production history: `https://github.com/TrioWebAS/magento2-sentry/commits/production/`
- Do not modify: `docs/plans/upstream-status-report.md`
