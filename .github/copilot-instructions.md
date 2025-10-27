Project: PBL-Perpustakaan — quick agent notes

Purpose
- This is a small PHP/HTML view-driven library app (front-end views live in `view/`). The repo is intended to be served from an Apache/PHP host (e.g. XAMPP) and uses Tailwind for CSS.

Big-picture architecture
- Entry point: project files are plain PHP served by Apache (there is no front-end framework or single-page app).
- Views: `view/` contains page templates. Example: `view/login.php` includes `view/header/head.php` using PHP `require`.
- App layers: lightweight MVC-like layout is implied by directories `controller/`, `model/` and `view/`, but controllers/models are currently empty — new logic should follow that separation (put business logic in `controller/`, DB access in `model/`, presentation in `view/`).
- DB/config: `config/koneksi.php` is the expected place for DB connection code (currently empty). SQL dumps / schema should go in `sql/` when present.

How to run & common dev workflows (explicit)
- Local dev: this project is intended to run on XAMPP (Apache + PHP + MySQL). Put the project folder under XAMPP's `htdocs` and start Apache + MySQL. Access via http://localhost/<folder-name>/.
- Database: add connection credentials to `config/koneksi.php` and import any schema under `sql/` (if provided). Agents should search `config/koneksi.php` when adding DB work.
- Tailwind/CSS: Tailwind is included as a dependency in `package.json`. Source CSS is `assets/css/input.css` and the generated stylesheet is `assets/css/main.css`.
  - Common command to build/watch Tailwind (run from project root):
    - npx tailwindcss -i assets/css/input.css -o assets/css/main.css --watch
  - If asked to add npm scripts, add a `build:css` and `watch:css` entry in `package.json`.

Project-specific conventions and patterns (concrete)
- PHP view includes: pages commonly do `require __DIR__.'/header/head.php';` so path resolution should use `__DIR__` or absolute includes to match style.
- Keep presentation in `view/`. Minimal inline PHP is acceptable in views, but prefer moving logic to `controller/` or `model/`.
- Assets live under `assets/` (CSS under `assets/css`). Use that path when linking files in templates.
- Follow existing naming: pages are `view/<name>.php`; listing and subpages use subfolders (e.g., `view/booking/index.php`, `view/pinjam/`).

Integration points & external deps
- Tailwind CSS (dev dependency): found in `package.json`.
- Database: MySQL expected (configure in `config/koneksi.php`).
- No external API integrations were found; search for added PHP cURL or external SDKs before adding network code.

Examples (copy/paste-ready pointers for agents)
- Update DB connection: edit `config/koneksi.php` and set host/user/password/dbname. Example placeholder file to create should export a PDO or mysqli instance.
- Modify login view: edit `view/login.php`. It currently uses static layout and includes `view/header/head.php`.
- Add CSS build script: update `package.json` with:
  - "scripts": { "build:css": "npx tailwindcss -i assets/css/input.css -o assets/css/main.css --minify", "watch:css": "npx tailwindcss -i assets/css/input.css -o assets/css/main.css --watch" }

Agent behavior rules (practical, repo-specific)
- Don't change folder layout unless requested — many views expect header includes at `view/header/head.php`.
- If you add DB credentials for testing, never commit secrets — place a template `config/koneksi.example.php` and ask user to copy it to `config/koneksi.php`.
- Prefer small, reversible edits. Because controllers/models are empty, add new code in new files under `controller/` and `model/` rather than editing many views.
- When creating new pages, follow the existing pattern: view file under `view/` and include header via `require __DIR__.'/header/head.php';`.

What I couldn't discover (ask developer)
- Preferred PHP version and required PHP extensions (mysqli / pdo_mysql?).
- Any existing database schema or initial data; `sql/` is empty.

If anything here is unclear or you want more/less detail, tell me which area to expand (running locally, DB examples, CSS build scripts, or an initial `koneksi.php` template) and I'll iterate.
