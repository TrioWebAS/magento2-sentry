# Prematurely merged 2024 PRs/commits on production

- Master SHA: 8fa5d52e0ec2bb6e255ad0ac55eff2208bb49514
- Production SHA: 3a50d1499599abdc171ab3c38b2cc61bfb63f66b
- Merge-base SHA: e7015f53666964a4aefd29b1a0fe3c0fa2c7f2ca
- Upstream repo: https://github.com/justbetter/magento2-sentry

## How this file was generated

```
# Merge commits in 2024 on production
git log --merges --since=2024-01-01 --until=2024-12-31 --pretty=format:%H\t%h\t%ad\t%s --date=short origin/production

# Heuristic keyword scan
git log --since=2024-01-01 --until=2024-12-31 -E --grep="(php 8\.4|8\.4|magento 2\.4\.8|sentry sdk|sentry)" --pretty=format:%H\t%h\t%ad\t%s --date=short origin/production
```

## Candidate list (by date)

| Date | Short SHA | Subject | Likely upstream PR | Present on master? |
|------|-----------|---------|--------------------|--------------------|
| 2024-11-15 | 6d5c4e0 | Merge pull request #151 from justbetter/analysis-xgL3pA | #151 | yes (post-merge-base) |
| 2024-12-03 | 100865e | Merge branch 'feature/configuration-per-store' of github.com:blackbird-agency/magento2-sentry into develop | could be #155 | yes (b4fd7e1) |
| 2024-12-03 | b0b74bd | Merge branch 'master' of github.com:superdav42/magento2-sentry into merge-fix/csp | relates to CSP | yes (#156/#157) |
| 2024-12-04 | 539f7d9 | Merge branch 'develop' into production | aggregate | mixed |
| 2024-12-04 | 5abfbda | Merge branch 'develop' into production | aggregate | mixed |
| 2024-12-04 | ba66643 | Merge branch 'feat-performance' of github.com:webidea24/magento2-sentry into develop | performance | partly (#178) |
| 2024-12-04 | 295da54 | Merge branch 'bugfix/admin-logout' of github.com:justbetter/magento2-sentry into develop | bugfix | unknown |
| 2024-03-29 | 9647503 | Raise sentry sdk, bump 3.6.0 | version bump | superseded by 4.x |

## Notes

- Several 2024 merges were umbrella merges from `develop` into `production`; items within are partially upstreamed in 2025 commits on `master`.
- CSP/logrocket/secureRenderer and per-store configuration appear upstreamed by early 2025.
- Performance-related items align with the 2025 performance tracking series (#178 et al.).

## Follow-up checks

- For any local-only behavior still required, cross-check in the diff summary document to confirm presence/absence and any deviations.
