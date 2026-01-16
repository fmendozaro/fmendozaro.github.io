## 2024-05-22 - Missing package.json
**Learning:** The repository root is missing `package.json` despite having `package-lock.json`. This prevents running standard NPM scripts like `lint` or `test`.
**Action:** Always verify the existence of `package.json` before attempting to run `npm` or `pnpm` commands. Use custom scripts for verification when standard tools are unavailable.
