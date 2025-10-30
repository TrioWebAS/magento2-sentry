# Update recommendation: Align production with upstream/master safely

- Master SHA: 8fa5d52e0ec2bb6e255ad0ac55eff2208bb49514
- Production SHA: 3a50d1499599abdc171ab3c38b2cc61bfb63f66b
- Merge-base SHA: e7015f53666964a4aefd29b1a0fe3c0fa2c7f2ca
- References:
  - Upstream changes: `docs/upstream-changes.md`
  - 2024 merged items: `docs/merged-2024-prs.md`
  - Diff summary: `docs/diff-upstream-master-vs-origin-production.md`
  - Upstream repo: https://github.com/justbetter/magento2-sentry

## Strategy

- Prefer upstream-first code, minimize local divergence.
- Preserve any mandatory local behavior via minimal, configurable deltas.
- Use an integration branch to avoid touching `production` until validated.

## Steps

1. Create integration branch
```
git checkout -b integration/upgrade-202510 master
```

2. Reapply essential local-only deltas (if any remain)
- Review `docs/merged-2024-prs.md` and `docs/diff-upstream-master-vs-origin-production.md`.
- If required, add minimal, backward-compatible adapters or config toggles.

3. Composer/package naming decision
- Upstream uses `justbetter/magento2-sentry` while production has `triowebas/magento2-sentry`.
- Recommendation: keep upstream name in code; adjust deployment tooling/package refs accordingly.

4. Validate Magento compatibility (document-only commands)
```
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```
- Verify: Admin loads, Frontend loads, CLI commands execution.

5. Functional checks
- Sentry initialization (web, CLI, cron)
- Performance tracking toggles and excluded areas
- Cron check-ins behavior (rate limits)
- CSP headers include Sentry/LogRocket domains
- JS inclusion uses secureRenderer

6. Rollout plan
- Tag current production: `git tag -a pre-upgrade-202510 -m "Pre-upgrade snapshot"`
- Create PR from `integration/upgrade-202510` to `production`.
- QA/UAT sign-off checklist; monitor Sentry for regressions post-deploy.

7. Backout
- If issues, rollback to `pre-upgrade-202510` tag and redeploy.

## Go/No-Go criteria
- No blockers in DI compilation, static deploy, or caches.
- Sentry captures errors and breadcrumbs as expected across areas.
- No unexpected CSP violations in browser console.
- Cron check-ins within Sentry rate limits.

## Notes
- Profiling plugins removed upstream; rely on upstream performance tracking and monolog handler integration.
- Any local instrumentation depending on removed classes should be ported to upstream hooks/callbacks.
