<!-- 7fed7fe3-1b0a-4a30-a631-1edb8736ecb9 a6a926da-c9cd-4cdc-88f1-2c823c4d5812 -->
# Documentation Plan: Magento2 Sentry Upstream Status and Update Strategy

## Scope and assumptions

- Baseline branches: `upstream/master` ≡ local `master`, and target `origin/production`.
- Only local `git` CLI is used, no GitHub API.
- Outputs are .md files under `docs/` (no code or history changes).

## Outputs to produce in docs/

1. `docs/upstream-changes.md`: Human-readable list of upstream changes (commits) currently on `master` relevant to the module, with links back to upstream.
2. `docs/merged-2024-prs.md`: Human-readable digest of the prematurely merged 2024 PRs that were integrated into `production` before upstream.
3. `docs/diff-upstream-master-vs-origin-production.md`: Precise diff summary between `master` and `origin/production` with grouped file changes and high-signal highlights.
4. `docs/update-recommendation.md`: Safe, step-by-step, low-risk plan to update the module while keeping backward compatibility and minimizing divergence.

## Conventions

- Remotes: `upstream` and `origin` exist; `master` equals upstream/master.
- Use commit links in the form `https://github.com/justbetter/magento2-sentry/commit/<hash>` and PR links if inferable from messages.
- Prefer concise tables and grouped sections per Magento area: `etc/`, `Block/`, `Model/`, `Observer/`, `Plugin/`, `view/`, configs.

## Preparation (read-only)

- Verify branches are present locally and up-to-date (no changes performed):
- `git fetch --all --prune` (read-only network)
- `git rev-parse master` and `git rev-parse origin/production`

## 1) Build upstream changes digest (docs/upstream-changes.md)

- Identify divergence base between `master` and `origin/production`:
- Base commit: `git merge-base master origin/production`
- Collect upstream-only commits since base:
- `git log --reverse --no-merges --date=short --pretty=format:"%h | %ad | %s" $(git merge-base master origin/production)..master`
- Also capture merge commits (to preserve PR context):
- `git log --reverse --merges --date=short --pretty=format:"%h | %ad | %s" $(git merge-base master origin/production)..master`
- For each commit, build a link: `https://github.com/justbetter/magento2-sentry/commit/<full_sha>`.
- Group by top-level path using shortstat and path lists for signal:
- `git log --name-only --pretty=format:"---%n%h %s" $(git merge-base master origin/production)..master`
- Author and labels table (optional if helpful): `git shortlog -sne` over the range.
- Output sections:
- Summary (counts, timeframe)
- Highlights (breaking/public API, config changes, composer constraints, SDK version bumps)
- Full chronological table with commit links

## 2) Build digest of prematurely merged 2024 PRs (docs/merged-2024-prs.md)

- Identify 2024-era merge commits into your line that reference PRs:
- On `production`: `git log --merges --since=2024-01-01 --until=2024-12-31 --pretty=format:"%H | %ad | %s" --date=short origin/production`
- If PR URLs or numbers appear in messages (e.g., `#123` or `https://github.com/.../pull/123`), extract them.
- If messages don’t include PR refs, heuristics:
- Search commits that include keywords you remember (e.g., PHP 8.4, Magento 2.4.8, Sentry SDK 4.x):
 - `git log --since=2024-01-01 --until=2024-12-31 -E --grep="(php 8\.4|8\.4|magento 2\.4\.8|sentry sdk|sentry)" --pretty=format:"%H | %ad | %s" --date=short origin/production`
- For each candidate, record:
- Commit hash, date, subject, and a commit link to your fork if public; else keep hash.
- If a PR number is embedded, link to upstream PR `https://github.com/justbetter/magento2-sentry/pull/<num>`.
- Normalize into a table with a note if change exists on `master` now:
- Existence check: `git branch --contains <sha> master` (or content-level check via file diffs if message-only).
- Sections:
- Overview and rationale
- Table of PRs/commits with status: already upstreamed vs still local-only
- Notes on conflicts or deviations

## 3) Create the diff summary (docs/diff-upstream-master-vs-origin-production.md)

- High-level: changed files and directories
- `git diff --name-status origin/production...master`
- Group by Magento areas and summarize impacts:
- Use `awk`/manual grouping; note new/removed/modified counts per directory.
- Semantic highlights:
- Config changes under `etc/`: system.xml, di.xml, events.xml
- PHP API surface changes in `Block/`, `Model/`, `Observer/`, `Plugin/`
- View/JS changes and Sentry JS SDK version inclusions
- Composer constraints and SDK version bumps (scan `composer.json` via `git show master:composer.json` vs `git show origin/production:composer.json`)
- Risk flags:
- Breaking constructor signature changes, removed classes, observers, or events
- Changes gated by config that may alter behavior by default

## 4) Draft the update recommendation (docs/update-recommendation.md)

- Strategy: maintain minimal diff; upstream-first, local deltas isolated behind config
- Steps:
1) Identify local-only changes that are still needed (from doc 2 + 3)
2) For each needed local change, prefer minimal, backward-compatible variant; gate with config where possible
3) Validate PHP 8.4 and Magento 2.4.8 compatibility impacts noted in your 2024 changes
4) Propose an integration path:
 - Option A: Fast-forward `production` to `master` then re-apply minimal necessary local deltas (safer if diffs small)
 - Option B: Merge `master` into a new `integration/upgrade-YYYYMM` branch, resolve conflicts, then QA—recommended
5) Testing and rollout checklist (no code yet):
 - compile DI, static content, run unit checks (document commands only)
 - verify Sentry initialization in CLI, Cron, Webfront, and Admin areas
 - verify performance tracking toggles and excluded areas
6) Backout plan and tags (document-only): create annotated tag pre-merge, and rollback instructions
- Include a clear go/no-go criteria list and sign-off matrix

## File skeletons to use

- Each .md begins with: Title, Date, Branch SHAs (`master` and `origin/production`), `merge-base` SHA.
- Include a short “How this file was generated” commands block to ensure repeatability.

## Acceptance criteria

- The four .md files exist under `docs/`, are internally consistent, list SHAs and links, and provide a clear decision-ready recommendation.
- No repo state is changed; all commands are read-only and reproducible.

## References

- Local task brief: `docs/plans/upstream-status-report.md`
- Upstream repository: https://github.com/justbetter/magento2-sentry (for commit/PR links)