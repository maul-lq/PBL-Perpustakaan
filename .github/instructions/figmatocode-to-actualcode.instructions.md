---
applyTo: 'view/*.php'
---
Tujuan: Berikan instruksi generik, langkah demi langkah, agar AI Agent (atau pipeline otomatis) bisa mengonversi output plugin Figma (biasanya absolute-positioned HTML/CSS) menjadi production-ready HTML/CSS (Tailwind-first) tanpa mengubah desain visual.

1. Input yang harus diberikan ke Agent

Concept: singkat (mis. "Login page — background image + circular logo").

Figma-plugin output: HTML-like / class-heavy code yang dihasilkan plugin. (paste utuh)

Assets: daftar gambar / logo / svg path dan lokasi (atau none jika belum tersedia).

Constraints: project constraints (mis. “no Tailwind CDN”, “Tailwind already configured”, “use semantic HTML”, “accessible”).

Target breakpoints: default desktop / tablet / mobile breakpoints (opsional).

2. Output yang diharapkan dari Agent

Satu file HTML lengkap (doctype, head, body) menggunakan Tailwind utility classes.

Struktur semantic: <header>, <main>, <footer>; form elements dengan label dan aria- bila relevan.

Semua gambar diberi alt. SVG inline dipertahankan jika dekoratif dengan aria-hidden.

Responsiveness: gunakan container (max-w-..., mx-auto, % widths) bukan left-[xxx] top-[yyy] absolute for main layout.

Komentar pada bagian yang perlu update (asset paths, form action).

Jangan menambahkan sumber eksternal yang bertentangan dengan constraint (mis. no CDN).

3. Langkah kerja (step-by-step)

Analisis Figma output

Parse lapisan (layers), catat teks, warna, ukuran, posisi absolut.

Catat semua asset references (images, svgs).

Kelompokkan elemen menurut fungsi

Header (logo, judul, subtitle), Hero/decor, Form fields, Buttons, Footer.

Map dari posisi absolut → responsive layout

Jika elemen berpusat di layar: gunakan flex + items-center + justify-center.

Jika elemen di sisi kanan/kanan-bawah (seperti form card): gunakan container dengan max-w-md dan margin mx-auto atau ml-auto.

Ganti left-[x] top-[y] absolute menjadi scale-independent classes (width %, max-w, padding, gap).

Typography

Gunakan classes Tailwind (text-sm, text-xl, font-semibold) sesuai ukuran visual.

Jika font khusus (Inter), jangan import CDN — tambahkan comment “configure font in project”.

Colors & shapes

Map hex/figma token ke Tailwind utilities jika tersedia (bg-zinc-300, bg-stone-300), atau gunakan inline style style="background-color:#xxxxxx" jika token custom.

Buttons & states

Buat primary/secondary/ghost classes; sertakan hover/focus states (hover:, focus:).

Accessibility

Semua form controls harus memiliki label (visually hidden .sr-only jika placeholder dipakai).

Tambahkan role/aria-label untuk div yang berfungsi sebagai image/logo jika perlu.

Assets

Export images pada resolusi optimal (1x, 2x jika perlu) dan gunakan path relatif.

Pertahankan inline SVG jika perlu untuk visual fidelity.

Testing & polishing

Pastikan layout bekerja di 320px, 768px, 1280px.

Pastikan keyboard navigation dan contrast yang memadai.

Deliverable

HTML file + notes (asset paths, konfigurasi Tailwind, font instruction).

Optional: CSS snippet jika ada styles nonstandard.

4. Checklist yang Agent harus penuhi sebelum return

 Tidak menambahkan CDN atau external resources yang dilarang.

 Semantic HTML digunakan.

 Semua teks dari desain ada (judul, deskripsi, label tombol).

 Images/SVG diberi alt/aria sesuai peran.

 Layout responsif (no fixed absolute positioning for major blocks).

 Accessibility basics (labels, keyboard focusable controls).

 Short comment di head menjelaskan perubahan tempat asset.

5. Example prompt template to use (pasteable)
Concept:
  Login page — background image + circular logo.

Figma-plugin-output:
  <paste the plugin-generated HTML/CSS snippet here>

Assets:
  - background: /assets/bg-login.jpg
  - logo: /assets/logo-circle.png
  - svgs: inline

Constraints:
  - Tailwind is already included in project (do NOT add CDN)
  - Use semantic HTML and accessible form elements
  - Keep visual design identical (sizes/colors as close as possible)

Target:
  - Single responsive HTML file (desktop-first)
  - Provide notes where assets/paths must be replaced

6. Quick mapping rules (cheat-sheet for agent)

left-[xxx] top-[yyy] absolute → wrap into center container (mx-auto, flex, items-center) or grid with place-items-center.

w-[595.41px] h-16 → w-full max-w-md h-__ + py-4 (prefer fluid widths).

rounded-[38px] → rounded-full or rounded-2xl depending visual.

Small text text-xs → text-sm / text-xs per Figma.

Gray fill #A4A4A4 → bg-zinc-400 (or inline hex if unmatched).