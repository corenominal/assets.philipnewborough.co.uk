<?= $this->extend('templates/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            
            <div class="border-bottom border-1 mb-4 pb-4 d-flex align-items-center justify-content-between gap-3">
                <h2 class="mb-0">About</h2>
            </div>

            <p class="text-muted">A CodeIgniter 4 web application skeleton. It includes authentication, an admin area, an API layer, and a debug section. Frontend assets are built with a custom Bootstrap theme (compiled via Dart Sass), and vendor JS/CSS is managed through npm.</p>

            <hr class="my-4">

            <h5>npm Scripts</h5>
            <p class="text-muted small">Run these with <code>npm run &lt;script&gt;</code>:</p>
            <div class="table-responsive mb-4">
                <table class="table table-sm table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Script</th>
                            <th>What it does</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td><code>copy-bootstrap-js</code></td><td>Copies <code>bootstrap.bundle.min.js</code> from <code>node_modules</code> to <code>public/assets/js/vendor/</code></td></tr>
                        <tr><td><code>copy-bootstrap-icons</code></td><td>Copies Bootstrap Icons CSS and webfonts to <code>public/assets/css/vendor/</code></td></tr>
                        <tr><td><code>copy-datatables</code></td><td>Copies DataTables JS and its Bootstrap 5 integration JS/CSS to the vendor directories</td></tr>
                        <tr><td><code>copy-jquery</code></td><td>Copies <code>jquery.min.js</code> to <code>public/assets/js/vendor/</code></td></tr>
                        <tr><td><code>sass</code></td><td>Runs the Dart Sass watcher in watch mode, compiling <code>bootstrap-custom.scss</code> &rarr; <code>public/assets/css/vendor/bootstrap.css</code></td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-muted small">To set up from scratch, run all the <code>copy-*</code> scripts then <code>npm run sass</code> to compile Bootstrap.</p>

            <hr class="my-4">

            <h5>Bootstrap CSS and JS</h5>
            <p class="text-muted">Bootstrap is <strong>not</strong> linked from a CDN. Instead:</p>
            <ul class="text-muted">
                <li><strong>CSS</strong> &mdash; <code>public/assets/sass/bootstrap-custom.scss</code> imports Bootstrap&apos;s Sass source from <code>node_modules</code> with custom variable overrides (colours, grays, form elements, etc.), and compiles to <code>public/assets/css/vendor/bootstrap.css</code> via <code>npm run sass</code>.</li>
                <li><strong>JS</strong> &mdash; <code>npm run copy-bootstrap-js</code> copies the pre-built <code>bootstrap.bundle.min.js</code> (includes Popper) into <code>public/assets/js/vendor/</code>.</li>
            </ul>
            <p class="text-muted">Both files are referenced in view templates using the <code>config('Urls')-&gt;assets</code> base URL. The <code>assets</code> property in <code>app/Config/Urls.php</code> should be set to the base URL of the assets server.</p>

            <hr class="my-4">

            <h5>JS Assets in <code>public/assets/js/shared/</code></h5>
            <p class="text-muted">Three shared scripts used across the authenticated/admin interface:</p>
            <ul class="text-muted">
                <li><strong><code>appmenu.js</code></strong> &mdash; Dynamically creates and manages a Bootstrap modal (<code>#appMenuModal</code>) that acts as a searchable application menu. It fetches menu items, renders them as a filterable list, and handles keyboard/ARIA accessibility.</li>
                <li><strong><code>logout.js</code></strong> &mdash; Creates a Bootstrap confirmation modal (<code>#shared-logout-modal</code>) with &ldquo;Cancel&rdquo; and &ldquo;Logout&rdquo; buttons. Handles accessibility blur on hide and wires up the confirm action to perform the logout.</li>
                <li><strong><code>notifications.js</code></strong> &mdash; Currently a stub; not yet implemented.</li>
            </ul>

        </div>
    </div>

</div>
<?= $this->endSection() ?>