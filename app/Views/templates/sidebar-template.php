<!doctype html>
<html lang="en-GB" data-bs-theme="auto" class="sidebar-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= esc($title) ?> - <?= esc(config('App')->siteName) ?></title>
    <meta name="theme-color" content="#282A36">
    <!-- Favicon and touch icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon-16x16.png">
    <!-- Stylesheets Remote -->
    <link rel="stylesheet" href="<?= config('Urls')->assets ?>assets/css/vendor/bootstrap-mono.css"/>
    <link rel="stylesheet" href="<?= config('Urls')->assets ?>assets/css/vendor/bootstrap-icons.css"/>
    <?php if(isset($datatables) && $datatables): ?>
    <link rel="stylesheet" href="<?= config('Urls')->assets ?>assets/css/vendor/datatables.bootstrap5.min.css"/>
    <?php endif; ?>
    <!-- Stylesheets Local -->
    <?php if(isset($css)): foreach ($css as $file): $cssPath = FCPATH . 'assets/css/' . $file . '.css'; ?>
    <link rel="stylesheet" href="/assets/css/<?= $file ?>.css<?= file_exists($cssPath) ? '?v=' . filemtime($cssPath) : '' ?>">
    <?php endforeach; endif; ?>
    <!-- JavaScript Remote -->
    <script defer src="<?= config('Urls')->assets ?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script defer src="<?= config('Urls')->assets ?>assets/js/shared/theme-select.js"></script>
    <script defer src="<?= config('Urls')->assets ?>assets/js/shared/logout.js"></script>
    <script defer src="<?= config('Urls')->assets ?>assets/js/shared/appmenu.js"></script>
    <script defer src="<?= config('Urls')->assets ?>assets/js/shared/metrics.js"></script>
    <?php if(isset($datatables) && $datatables): ?>
    <script defer src="<?= config('Urls')->assets ?>assets/js/vendor/jquery.min.js"></script>
    <script defer src="<?= config('Urls')->assets ?>assets/js/vendor/datatables.min.js"></script>
    <script defer src="<?= config('Urls')->assets ?>assets/js/vendor/datatables.bootstrap5.min.js"></script>
    <?php endif; ?>
    <!-- JavaScript Local -->
    <script defer src="/assets/js/templates/default.js"></script>
    <?php if(isset($js)): foreach ($js as $file): $jsPath = FCPATH . 'assets/js/' . $file . '.js'; ?>
    <script defer src="/assets/js/<?= $file ?>.js<?= file_exists($jsPath) ? '?v=' . filemtime($jsPath) : '' ?>"></script>
    <?php endforeach; endif; ?>
</head>
<body class="sidebar-template d-flex">

    <!-- ═══════════════════════════════════════════════════════
         SIDEBAR  (collapsed = icon-rail by default)
    ════════════════════════════════════════════════════════════ -->
    <div id="sidebar" class="d-none d-lg-flex flex-column h-100 collapsed">

        <!-- Brand -->
        <div class="sidebar-brand">
            <a href="#" id="sidebarToggle" class="sidebar-logo-link" aria-label="Toggle sidebar" title="Toggle sidebar">
                <img src="/icon.svg" alt="" width="40" height="40" class="rounded-circle flex-shrink-0">
                <span class="sidebar-label fw-semibold text-nowrap">corenominal</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-grow-1 overflow-y-auto py-2 px-2 sidebar-nav">
            <ul class="nav flex-column gap-1">
                <li>
                    <a href="#" class="nav-link active"
                       data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Home">
                        <i class="bi bi-house"></i>
                        <span class="sidebar-label">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link"
                       data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Blog">
                        <i class="bi bi-pencil"></i>
                        <span class="sidebar-label">Blog</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link"
                       data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Status">
                        <i class="bi bi-activity"></i>
                        <span class="sidebar-label">Status</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link"
                       data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Bookmarks">
                        <i class="bi bi-bookmark"></i>
                        <span class="sidebar-label">Bookmarks</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link"
                       data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="About">
                        <i class="bi bi-info-circle"></i>
                        <span class="sidebar-label">About</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link"
                       data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Contact">
                        <i class="bi bi-at"></i>
                        <span class="sidebar-label">Contact</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Sidebar footer -->
        <div class="p-2">
            <a href="#" class="sidebar-footer-link"
               data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Settings">
                <i class="bi bi-gear flex-shrink-0" aria-hidden="true"></i>
                <span class="sidebar-label">Settings</span>
            </a>
            <div class="dropdown dropup">
                <a href="#" class="sidebar-footer-link dropdown-toggle"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-circle-half flex-shrink-0" aria-hidden="true"></i>
                    <span class="sidebar-label">Theme</span>
                </a>
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button" data-theme="light"><i class="bi bi-sun me-2" aria-hidden="true"></i><span class="sidebar-label">Light</span></button></li>
                    <li><button class="dropdown-item" type="button" data-theme="dark"><i class="bi bi-moon me-2" aria-hidden="true"></i><span class="sidebar-label">Dark</span></button></li>
                    <li><button class="dropdown-item" type="button" data-theme="auto"><i class="bi bi-circle-half me-2" aria-hidden="true"></i><span class="sidebar-label">Auto</span></button></li>
                </ul>
            </div>
            <?php if( session()->get('user_uuid') ): ?>
            <a href="/sign-in.html" class="sidebar-footer-link trigger-logout"
               data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Sign out">
                <i class="bi bi-box-arrow-right flex-shrink-0" aria-hidden="true"></i>
                <span class="sidebar-label">Sign Out</span>
            </a>
            <?php else: ?>
            <a href="<?= config('Urls')->auth ?>login?redirect=<?= urlencode(current_url()) ?>" class="sidebar-footer-link"
               data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Sign in">
                <i class="bi bi-box-arrow-in-right flex-shrink-0" aria-hidden="true"></i>
                <span class="sidebar-label">Sign in</span>
            </a>
            <?php endif; ?>
        </div>

    </div>


    <!-- ═══════════════════════════════════════════════════════
         MAIN CONTENT
    ════════════════════════════════════════════════════════════ -->
    <div class="flex-grow-1 d-flex flex-column h-100 overflow-hidden">

        <!-- Top bar -->
        <div class="topbar d-flex align-items-center gap-2 px-3">
            <a href="#" class="d-lg-none"
               data-bs-toggle="offcanvas"
               data-bs-target="#mobileSidebar"
               aria-controls="mobileSidebar"
               aria-label="Open sidebar">
                <img src="/icon.svg" alt="Logo" width="40" height="40" class="rounded-circle">
            </a>
        </div>

        <!-- Scrollable area -->
        <div class="scrollable-area flex-grow-1 overflow-y-auto d-flex flex-column">

            <main class="pt-3 pb-5 px-3">
                <div style="max-width: 68ch; margin-inline: auto;">
                    <?= $this->renderSection('content') ?>
                </div>
            </main>

            <!-- Footer -->
            <footer class="mt-auto py-3 px-3 text-body-secondary">
                <div style="max-width: 68ch; margin-inline: auto;" class="text-center">
                    <small class="text-secondary">
                        <strong class="d-block py-3">* * *</strong>
                        <br>
                        <span class="flip-horizontal">&copy;</span> <?= date('Y') ?> Philip Newborough. All rights reserved.<br>
                        <a class="text-decoration-none me-2" href="<?= config('Urls')->license ?>"><i class="bi bi-file-earmark-text-fill"></i> License</a>
                        <a class="text-decoration-none me-2" href="<?= config('Urls')->github ?>"><i class="bi bi-github"></i> GitHub</a> <a class="text-decoration-none" href="<?= config('Urls')->github ?>blob/main/README.md"><i class="bi bi-file-text-fill"></i> README</a>
                    </small>
                    <?php if( session()->get('is_admin') ): ?>
                    <br>
                    <small class="text-secondary d-inline-block pt-2"><strong>Hostname:</strong> <?= gethostname() ?><br><strong>PHP version:</strong> <?= phpversion() ?> / <strong>CodeIgniter version:</strong> <?= \CodeIgniter\CodeIgniter::CI_VERSION ?></small>
                    <?php endif; ?>
                </div>
            </footer>

        </div><!-- /scrollable area -->

    </div><!-- /main -->
</body>
</html>
