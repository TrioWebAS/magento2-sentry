# Diff: upstream/master (local master) vs origin/production

- Master SHA: 8fa5d52e0ec2bb6e255ad0ac55eff2208bb49514
- Production SHA: 3a50d1499599abdc171ab3c38b2cc61bfb63f66b
- Merge-base SHA: e7015f53666964a4aefd29b1a0fe3c0fa2c7f2ca
- Upstream repo: https://github.com/justbetter/magento2-sentry

## How this file was generated

```
# Direct differences (two-dot)
git diff --name-status origin/production..master

# Composer comparison
git show origin/production:composer.json > /tmp/prod.composer.json
git show master:composer.json > /tmp/master.composer.json
```

## Summary of changes (production → master)

- Modified: 11
- Deleted: 8
- Added: 0

## File changes

### Modified
- Helper/Data.php
- Model/SentryInteraction.php
- Plugin/GlobalExceptionCatcher.php
- README.md
- composer.json
- etc/adminhtml/system.xml
- etc/config.xml
- etc/csp_whitelist.xml
- etc/di.xml
- view/frontend/templates/script/sentry.phtml

### Deleted (present on production, removed or relocated on master)
- .gitmodules
- Model/PerformanceTracingDto.php
- Model/SentryPerformance.php
- Plugin/Profiling/DbQueryLoggerPlugin.php
- Plugin/Profiling/EventManagerPlugin.php
- Plugin/Profiling/TemplatePlugin.php
- Plugin/SampleRequest.php
- etc/frontend/di.xml

## Notable semantic differences

- composer.json name field differs:
  - production: `triowebas/magento2-sentry`
  - master: `justbetter/magento2-sentry`
- Config surface:
  - Changes in `etc/system.xml`, `etc/config.xml`, and `etc/di.xml` align with upstream features (performance tracking, callbacks, cron check-ins, CSP updates).
- Frontend script inclusion:
  - `view/frontend/templates/script/sentry.phtml` updated; upstream uses secureRenderer and CSP domain management.
- Removed profiling-related plugins and DTOs on master, replaced by upstream-native performance tracking and monolog handler integration.

## Risk flags for integration

- Removal of profiling plugins may alter any local instrumentation relying on them.
- Changes to DI and CSP may require cache/config redeploy and environment validation.
- composer.json package name change could impact private packagist/automation if referencing `triowebas/*`.
