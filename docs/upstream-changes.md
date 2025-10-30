# Upstream changes since merge-base

- Master SHA: 8fa5d52e0ec2bb6e255ad0ac55eff2208bb49514
- Production SHA: 3a50d1499599abdc171ab3c38b2cc61bfb63f66b
- Merge-base SHA: e7015f53666964a4aefd29b1a0fe3c0fa2c7f2ca
- Upstream repo: https://github.com/justbetter/magento2-sentry

## How this file was generated

```
git log --reverse --no-merges --date=short --pretty=format:%H\t%h\t%ad\t%s e7015f5366..master
git log --reverse --merges --date=short --pretty=format:%H\t%h\t%ad\t%s e7015f5366..master
```

## Highlights

- Monolog handler migration and 2.4.8 compatibility (#165)
- Performance tracking and related composer updates (#178)
- Cron check-ins support (#182) and regex-based job selection (#197)
- Secure renderer for Sentry frontend JS and CSP dynamic whitelist (#156/#157)
- Store-level overrides, lazy user context, improved IP gathering, CLI/command error capture

## Commits (chronological)

| Date | Short SHA | Title |
|------|-----------|-------|
| 2024-12-11 | 13747c7 | Lazily get user context if we should be able to (#152) |
| 2024-12-12 | b4fd7e1 | Allow override of some configuration per store (#155) |
| 2025-01-31 | e19cdc3 | Added typehints to SentryInteraction |
| 2025-01-31 | 00304ca | Version 3.9.0 |
| 2025-02-10 | 2549c84 | Use secureRenderer for including sentry frontend js (#157) |
| 2025-02-10 | 5e2b7e7 | Dynamically add sentry and logrocket domains to CSP whitelist (#156) |
| 2025-04-23 | 420ddf3 | Moved sentry logging to a monolog handler (2.4.8 compatibility) (#165) |
| 2025-04-23 | f692928 | Version 4.0.0 |
| 2025-04-30 | 39a118e | Updated readme |
| 2025-05-06 | 30b6e06 | Load customerSession in SentryLog via proxy (#169) |
| 2025-05-06 | 8ee8b98 | Updated templates, release 4.0.1 |
| 2025-05-06 | a398817 | Added additional type to issue templates |
| 2025-05-28 | 3b8677d | Pass config also relevant to sentry |
| 2025-05-28 | d100a8d | Clean up the Magento stacktrace before sending it to Sentry (#171) |
| 2025-05-28 | ace9b20 | Gather ip from Magento instead of server variable |
| 2025-05-28 | 1969702 | Apply fixes from StyleCI |
| 2025-05-28 | 6f344c4 | Added docblock |
| 2025-06-04 | 166414c | Updated changelog for 4.1.0 |
| 2025-06-04 | 2255d19 | Bump version to 4.1.0 |
| 2025-06-06 | 1446d71 | Automatically pass all supported sentry config |
| 2025-06-06 | d7bace5 | Apply fixes from StyleCI |
| 2025-06-06 | 20a2155 | Codestyle fixes |
| 2025-06-06 | a443747 | Added performance tracking (#178) |
| 2025-06-06 | f384aee | Updated composer requirements following performance tracking |
| 2025-06-06 | bc5b382 | rename tracing_sample_rate to traces_sample_rate |
| 2025-06-06 | 9fc9b6d | Apply fixes from StyleCI |
| 2025-06-06 | 0027181 | Fixed typo |
| 2025-06-06 | e31bd20 | Added the before callbacks |
| 2025-06-11 | 4906be4 | Improved event readme |
| 2025-06-24 | 80aae37 | Catch The default website isnt defined when getting store (#188) |
| 2025-06-24 | 3e4a4ed | Catch errors thrown from commands (#186) |
| 2025-06-24 | 24e8d8c | Add sentry logger by hooking into monolog setHandlers (#184) |
| 2025-06-24 | dfd482d | Added support for cron check-ins (#182) |
| 2025-06-24 | 8f7ecb8 | Also check previous exceptions whether to ignore |
| 2025-06-24 | 79afd6b | Added a default list of in_app_excludes |
| 2025-06-24 | 608ca80 | Updated changelog |
| 2025-06-24 | 88885d8 | Added newly added features |
| 2025-07-02 | ba77329 | Added support for spotlight |
| 2025-07-02 | 64d03ac | Apply fixes from StyleCI |
| 2025-07-14 | 8667890 | Catch zend db adapter errors when database is missing (#193) |
| 2025-07-14 | 7418d93 | Add the ability to select job codes using regex (#197) |
| 2025-07-14 | 8a63918 | Fix logrocket key type |
| 2025-07-14 | 55a60fc | Updated changelog |

## Merge commits (PR context)

| Date | Short SHA | Title |
|------|-----------|-------|
| 2025-05-28 | b7da74e | Merge pull request #173 from justbetter/analysis-o7aLDg |
| 2025-05-28 | d044a91 | Merge branch 'feature/improved-ip-gathering' into feature/improved-ip-gathering |
| 2025-06-03 | aacac3a | Merge pull request #172 from justbetter/feature/pass-config |
| 2025-06-03 | 38e3e07 | Merge pull request #174 from justbetter/feature/improved-ip-gathering |
| 2025-06-06 | d7e8491 | Merge pull request #176 from justbetter/analysis-547DnP |
| 2025-06-06 | 5955487 | Merge branch 'master' into feature/add-additional-sentry-config |
| 2025-06-06 | 5ba118e | Merge branch 'master' into feature/add-additional-sentry-config |
| 2025-06-06 | f82858f | Merge pull request #179 from justbetter/analysis-Q3bmZm |
| 2025-06-10 | 2517081 | Merge pull request #177 from justbetter/feature/add-additional-sentry-config |
| 2025-07-02 | cf1c272 | Merge pull request #194 from justbetter/analysis-V0vAkK |
| 2025-07-08 | af7bb64 | Merge pull request #195 from justbetter/feature/spotlight |

## Direct links

For any full SHA `<sha>`, see:
- Commit: https://github.com/justbetter/magento2-sentry/commit/<sha>
- PR: https://github.com/justbetter/magento2-sentry/pull/<number>


