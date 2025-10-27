# PBL Perpustakaan — Local dev notes

Short guide to run and contribute to this simple PHP + Tailwind project.

Prerequisites

- XAMPP (Apache + PHP + MySQL) or equivalent LAMP/WAMP stack.
- Node.js + npm (for Tailwind CSS build).

Run locally (quick)

1. Place the project folder under XAMPP's `htdocs` (e.g. `C:\xampp\htdocs\PBL Perpustakaan`).
2. Start Apache and MySQL from the XAMPP control panel.
3. Copy `config/koneksi.example.php` to `config/koneksi.php` and fill your DB credentials.
4. Open the app in your browser: [http://localhost/PBL%20Perpustakaan/](http://localhost/PBL%20Perpustakaan/).

Tailwind CSS (styles)

- Source: `assets/css/input.css`
- Generated CSS: `assets/css/main.css` (committed but rebuild when editing source)
- The global header `view/header/head.php` automatically includes `assets/css/main.css` for all pages; you don't need to link it per-view.

Install dependencies and build CSS (run from project root)

```pwsh
npm install
npm run build:css    # build once (minified)
npm run watch:css    # watch during development
```

Project layout and conventions

- Views (presentation) are in `view/`. Example: `view/login.php` includes `view/header/head.php` via `require __DIR__.'/header/head.php';`.
- Keep business logic out of views. Add controller logic under `controller/` and DB access under `model/` when adding features.
- DB config: `config/koneksi.php` should provide a `$pdo` (or similar) instance for use in models/controllers.
- Assets live under `assets/` (CSS in `assets/css`).

Important notes for contributors

- The project uses plain PHP files (no framework). Follow the existing include pattern when adding new views.
- `config/koneksi.php` is intentionally gitignored to prevent committing credentials. Copy `config/koneksi.example.php` to `config/koneksi.php` and set your local secrets.
