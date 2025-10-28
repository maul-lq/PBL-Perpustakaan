PBL-Perpustakaan — Copilot agent guide

What this repo is
- Plain PHP + Tailwind CSS app served by Apache/XAMPP (no SPA, no framework router). Views live in `view/`.

Structure and flow (keep this separation)
- Views: templates under `view/`. Common head lives at `view/components/head.php` and is included via `require __DIR__.'/components/head.php';` (use `__DIR__` for stable paths).
- Controllers/Models: `controller/` and `model/` are scaffolds (empty now). Put business logic in `controller/` and DB access in `model/`. Keep presentation in `view/`.
- DB config: `config/koneksi.php` should create a PDO `$pdo`. A safe template exists at `config/koneksi.example.php` — copy it to `config/koneksi.php` locally and fill credentials.

Run and build (Windows/PowerShell examples)
- Place the folder under XAMPP `htdocs` and start Apache + MySQL, then browse: http://localhost/PBL%20Perpustakaan/
- Tailwind build (from project root):
  - npm install
  - npm run watch:css (dev) or npm run build:css (minified)
- CSS paths: input `assets/css/input.css` -> output `assets/css/main.css` (already referenced by pages when you link it).

Project conventions (follow these patterns)
- Includes use `__DIR__`-relative paths. Example in views: `require __DIR__.'/header/head.php';`.
- New pages go under `view/<feature>/index.php` or `view/<name>.php`; share the header include above.
- Assets live under `assets/` (CSS in `assets/css`).
- Never commit secrets. Use `config/koneksi.example.php`; keep your local `config/koneksi.php` untracked.

Integration points and deps
- Tailwind via `@tailwindcss/cli` and `tailwindcss` (see `package.json` scripts: `build:css`, `watch:css`).
- MySQL via PHP PDO (`config/koneksi.php` exposes `$pdo`). No other external APIs detected.

Concrete examples
- Minimal DB usage in a controller/model:
  - `require __DIR__.'/../config/koneksi.php'; $rows = $pdo->query('SELECT 1')->fetchAll();`
- Minimal view skeleton:
  - `<?php require __DIR__.'/header/head.php'; ?>` then add HTML body.

Good first tasks for agents
- Wire a simple controller (e.g., `controller/auth.php`) that uses `$pdo` and is required from a view.
- Add or tweak a view (e.g., `view/login.php`) and rebuild CSS with `npm run watch:css`.

Unknowns to confirm with the maintainer
- Exact PHP version/extensions (pdo_mysql/mysqli) and any expected DB schema (folder `sql/` is empty).
