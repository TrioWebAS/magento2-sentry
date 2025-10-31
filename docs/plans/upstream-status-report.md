# Status report; `upstream/master` VS `origin/production` branches

We're going to update this module by fething upstream updates.

## CRITICAL NOTICE!

**IMPORTANT:**
This project is mainly about gathering info and documenting the current state of the module. We will NOT alter any code or github history yet.

## Sidenotes
- Our local `upstream` branch is a checkout of latest `upstream/master`
- `origin/production` is the default branch, and the one that runs on our magento production instance. We aim to update this branch.

## Why we cannot simply merge `upstream` into `production`

- We needed to prematurely merge more than 3 PRs that where pending on upstream/master in 2024. 
  - We therefore kept our own `upstream` as a copy of the `upstream/master`. It has since been updated 
  - We merged these PRs into `develop` and made the project run smoothly.
  - Finally, we pushed all of it to `production`.
  - We're unsure about whether or not these pending PRs where ever accepted and worked into the latest upstream/master of 2025.
- We have not got a clear picture of what other new/unknown changes/features has been done to upstream/master since 2024.
- We prefer staying as close to upstream, without mods, as possible. We need to identify and isolate which of our prematurely added features/PRs are eventually missing in todays master and create a new version based on that.

## TO-DO list

> What we plan to do

- [] Create a human-readble summary/list of upstream changes made to the module, with links to the corresponding github commit
- [] Create a human-readable summary/list of the PRs we prematurely merged into our `production` branch in 2024
- [] Create a summary the difference between `upstream/master` and `origin/production`
- [] Create a safe and solid step-by-step plan/recommandation on how to update this module. 