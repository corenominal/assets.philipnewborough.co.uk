# assets.philipnewborough.co.uk

A **CodeIgniter 4** web application skeleton. It includes authentication, an admin area, an API layer, and a debug section. Frontend assets are built with a custom Bootstrap theme (compiled via Dart Sass), and vendor JS/CSS is managed through npm.

---

## npm Scripts

Run these with `npm run <script>`:

| Script | What it does |
|---|---|
| `copy-bootstrap-js` | Copies `bootstrap.bundle.min.js` from `node_modules` to `public/assets/js/vendor/` |
| `copy-bootstrap-icons` | Copies Bootstrap Icons CSS and webfonts to `public/assets/css/vendor/` |
| `copy-datatables` | Copies DataTables JS and its Bootstrap 5 integration JS/CSS to the vendor directories |
| `copy-jquery` | Copies `jquery.min.js` to `public/assets/js/vendor/` |
| `sass` | Runs the Dart Sass watcher in watch mode, compiling `public/assets/sass/bootstrap-custom.scss` → `public/assets/css/vendor/bootstrap.css` |

To set up from scratch, run all the `copy-*` scripts then `npm run sass` to compile Bootstrap.

---

## Bootstrap CSS and JS

Bootstrap is **not** linked from a CDN. Instead:

- **CSS** — `public/assets/sass/bootstrap-custom.scss` imports Bootstrap's Sass source from `node_modules` with custom variable overrides (colours, grays, form elements, etc.), and compiles to `public/assets/css/vendor/bootstrap.css` via `npm run sass`.
- **JS** — `npm run copy-bootstrap-js` copies the pre-built `bootstrap.bundle.min.js` (includes Popper) into `public/assets/js/vendor/`.

Both files are referenced in the view templates using the `config('Urls')->assets` base URL:

```php
<link rel="stylesheet" href="<?= config('Urls')->assets ?>assets/css/vendor/bootstrap.css"/>
<script defer src="<?= config('Urls')->assets ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
```

The `assets` property in `app/Config/Urls.php` should be set to the base URL of the assets server (e.g. `https://assets.example.com/`).

---

## JS Assets in `public/assets/js/shared/`

Three shared scripts used across the authenticated/admin interface:

- **`appmenu.js`** — Dynamically creates and manages a Bootstrap modal (`#appMenuModal`) that acts as a searchable application menu. It fetches menu items, renders them as a filterable list, and handles keyboard/ARIA accessibility.
- **`logout.js`** — Creates a Bootstrap confirmation modal (`#shared-logout-modal`) with "Cancel" and "Logout" buttons. Handles accessibility blur on hide and wires up the confirm action to perform the logout.
- **`notifications.js`** — Currently a stub; not yet implemented.