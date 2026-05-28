<?= $this->extend('templates/dashboard_v2') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="border-bottom border-1 mb-4 pb-4 d-flex align-items-center justify-content-between gap-3">
                <h2 class="mb-0"><i class="bi bi-bootstrap me-2"></i>Bootstrap Demo</h2>
                <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#tocOffcanvas" aria-controls="tocOffcanvas">
                    <i class="bi bi-list-ul me-1"></i> Contents
                </button>
            </div>
        </div>
    </div>

    <!-- Table of Contents offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="tocOffcanvas" aria-labelledby="tocOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="tocOffcanvasLabel">Contents</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column gap-1">
                <li><a class="nav-link py-1 px-0" href="#typography"    data-bs-dismiss="offcanvas">Typography</a></li>
                <li><a class="nav-link py-1 px-0" href="#colors"        data-bs-dismiss="offcanvas">Colors</a></li>
                <li><a class="nav-link py-1 px-0" href="#buttons"       data-bs-dismiss="offcanvas">Buttons</a></li>
                <li><a class="nav-link py-1 px-0" href="#alerts"        data-bs-dismiss="offcanvas">Alerts</a></li>
                <li><a class="nav-link py-1 px-0" href="#badges"        data-bs-dismiss="offcanvas">Badges</a></li>
                <li><a class="nav-link py-1 px-0" href="#breadcrumb"    data-bs-dismiss="offcanvas">Breadcrumb</a></li>
                <li><a class="nav-link py-1 px-0" href="#cards"         data-bs-dismiss="offcanvas">Cards</a></li>
                <li><a class="nav-link py-1 px-0" href="#accordion"     data-bs-dismiss="offcanvas">Accordion</a></li>
                <li><a class="nav-link py-1 px-0" href="#forms"         data-bs-dismiss="offcanvas">Forms</a></li>
                <li><a class="nav-link py-1 px-0" href="#listgroup"     data-bs-dismiss="offcanvas">List Group</a></li>
                <li><a class="nav-link py-1 px-0" href="#navs"          data-bs-dismiss="offcanvas">Navs &amp; Tabs</a></li>
                <li><a class="nav-link py-1 px-0" href="#pagination"    data-bs-dismiss="offcanvas">Pagination</a></li>
                <li><a class="nav-link py-1 px-0" href="#progress"      data-bs-dismiss="offcanvas">Progress</a></li>
                <li><a class="nav-link py-1 px-0" href="#spinners"      data-bs-dismiss="offcanvas">Spinners</a></li>
                <li><a class="nav-link py-1 px-0" href="#tables"        data-bs-dismiss="offcanvas">Tables</a></li>
                <li><a class="nav-link py-1 px-0" href="#modal"         data-bs-dismiss="offcanvas">Modal</a></li>
                <li><a class="nav-link py-1 px-0" href="#offcanvas"     data-bs-dismiss="offcanvas">Offcanvas</a></li>
                <li><a class="nav-link py-1 px-0" href="#toast"         data-bs-dismiss="offcanvas">Toast</a></li>
                <li><a class="nav-link py-1 px-0" href="#tooltips"      data-bs-dismiss="offcanvas">Tooltips</a></li>
                <li><a class="nav-link py-1 px-0" href="#popovers"      data-bs-dismiss="offcanvas">Popovers</a></li>
                <li><a class="nav-link py-1 px-0" href="#dropdowns"     data-bs-dismiss="offcanvas">Dropdowns</a></li>
                <li><a class="nav-link py-1 px-0" href="#carousel"      data-bs-dismiss="offcanvas">Carousel</a></li>
                <li><a class="nav-link py-1 px-0" href="#utilities"     data-bs-dismiss="offcanvas">Utilities</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <!-- Main Content -->
        <div class="col-12">

            <!-- ── TYPOGRAPHY ──────────────────────────────────────────────── -->
            <section id="typography" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Typography</h4>

                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Headings</h6>
                        <h1>h1 — The quick brown fox</h1>
                        <h2>h2 — The quick brown fox</h2>
                        <h3>h3 — The quick brown fox</h3>
                        <h4>h4 — The quick brown fox</h4>
                        <h5>h5 — The quick brown fox</h5>
                        <h6>h6 — The quick brown fox</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Display headings</h6>
                        <p class="display-1 lh-1 mb-1" style="font-size:2.5rem">Display 1</p>
                        <p class="display-2 lh-1 mb-1" style="font-size:2rem">Display 2</p>
                        <p class="display-3 lh-1 mb-1" style="font-size:1.75rem">Display 3</p>
                        <p class="display-4 lh-1 mb-0" style="font-size:1.5rem">Display 4</p>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Inline text</h6>
                        <p class="lead">Lead paragraph — slightly larger body text for introductions.</p>
                        <p>Regular paragraph with <strong>bold</strong>, <em>italic</em>, <u>underline</u>, <s>strikethrough</s>, and <mark>highlighted</mark> text.</p>
                        <p><small>Small text for fine print or captions.</small></p>
                        <p><code>inline code</code> and <kbd>kbd shortcut</kbd></p>
                        <p><abbr title="HyperText Markup Language">HTML</abbr> abbreviation with tooltip.</p>
                        <blockquote class="mb-0">"A well-designed system treats dark mode as a first-class citizen, not an afterthought."</blockquote>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Pre / code block</h6>
                        <pre><code>function greet(name) {
  return `Hello, ${name}!`;
}

console.log(greet('World'));</code></pre>

                        <h6 class="text-secondary mb-2 mt-3">Lists</h6>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li>Unordered item one</li>
                                    <li>Unordered item two</li>
                                    <li>Nested
                                        <ul><li>Sub-item</li></ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ol>
                                    <li>Ordered item one</li>
                                    <li>Ordered item two</li>
                                    <li>Ordered item three</li>
                                </ol>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li>Unstyled list item</li>
                            <li>Another unstyled item</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- ── COLORS ──────────────────────────────────────────────────── -->
            <section id="colors" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Colors</h4>

                <h6 class="text-secondary mb-2">Text colors</h6>
                <div class="d-flex flex-wrap gap-3 mb-3">
                    <span class="text-primary fw-semibold">primary</span>
                    <span class="text-secondary fw-semibold">secondary</span>
                    <span class="text-success fw-semibold">success</span>
                    <span class="text-danger fw-semibold">danger</span>
                    <span class="text-warning fw-semibold">warning</span>
                    <span class="text-info fw-semibold">info</span>
                    <span class="text-muted fw-semibold">muted</span>
                    <span class="text-body fw-semibold">body</span>
                    <span class="text-body-secondary fw-semibold">body-secondary</span>
                </div>

                <h6 class="text-secondary mb-2">Background colors</h6>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <?php foreach (['primary','secondary','success','danger','warning','info','light','dark','body-secondary','body-tertiary'] as $c): ?>
                    <span class="px-3 py-2 rounded bg-<?= $c ?> border small"><?= $c ?></span>
                    <?php endforeach; ?>
                </div>

                <h6 class="text-secondary mb-2">Background subtle + text emphasis</h6>
                <div class="d-flex flex-wrap gap-2 mb-0">
                    <?php foreach (['primary','secondary','success','danger','warning','info'] as $c): ?>
                    <span class="px-3 py-2 rounded bg-<?= $c ?>-subtle text-<?= $c ?>-emphasis border border-<?= $c ?>-subtle small"><?= $c ?></span>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ── BUTTONS ─────────────────────────────────────────────────── -->
            <section id="buttons" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Buttons</h4>

                <h6 class="text-secondary mb-2">Solid</h6>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <?php foreach (['primary','secondary','success','danger','warning','info','light','dark'] as $v): ?>
                    <button type="button" class="btn btn-<?= $v ?>"><?= ucfirst($v) ?></button>
                    <?php endforeach; ?>
                    <button type="button" class="btn btn-link">Link</button>
                </div>

                <h6 class="text-secondary mb-2">Outline</h6>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <?php foreach (['primary','secondary','success','danger','warning','info','light','dark'] as $v): ?>
                    <button type="button" class="btn btn-outline-<?= $v ?>"><?= ucfirst($v) ?></button>
                    <?php endforeach; ?>
                </div>

                <h6 class="text-secondary mb-2">Sizes &amp; states</h6>
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <button type="button" class="btn btn-primary btn-lg">Large</button>
                    <button type="button" class="btn btn-primary">Default</button>
                    <button type="button" class="btn btn-primary btn-sm">Small</button>
                    <button type="button" class="btn btn-primary active">Active</button>
                    <button type="button" class="btn btn-primary" disabled>Disabled</button>
                    <button type="button" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm me-1"></span> Loading
                    </button>
                </div>

                <h6 class="text-secondary mb-2">Button group</h6>
                <div class="btn-group mb-3" role="group">
                    <button type="button" class="btn btn-outline-primary">Left</button>
                    <button type="button" class="btn btn-outline-primary">Centre</button>
                    <button type="button" class="btn btn-outline-primary">Right</button>
                </div>
                &nbsp;
                <div class="btn-group mb-3" role="group">
                    <button type="button" class="btn btn-primary">One</button>
                    <button type="button" class="btn btn-secondary">Two</button>
                    <button type="button" class="btn btn-success">Three</button>
                </div>

                <h6 class="text-secondary mb-2">Icon buttons</h6>
                <div class="d-flex flex-wrap gap-2 mb-0">
                    <button type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i></button>
                    <button type="button" class="btn btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                    <button type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                    <button type="button" class="btn btn-success"><i class="bi bi-check-lg me-1"></i> Save</button>
                    <button type="button" class="btn btn-outline-primary"><i class="bi bi-download me-1"></i> Export</button>
                </div>
            </section>

            <!-- ── ALERTS ──────────────────────────────────────────────────── -->
            <section id="alerts" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Alerts</h4>
                <?php foreach (['primary','secondary','success','danger','warning','info','light','dark'] as $v): ?>
                <div class="alert alert-<?= $v ?> alert-dismissible fade show" role="alert">
                    <strong><?= ucfirst($v) ?></strong> — This is a <?= $v ?> alert with a <a href="#" class="alert-link">link</a>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endforeach; ?>
            </section>

            <!-- ── BADGES ──────────────────────────────────────────────────── -->
            <section id="badges" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Badges</h4>

                <h6 class="text-secondary mb-2">Solid</h6>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <?php foreach (['primary','secondary','success','danger','warning','info','light','dark'] as $v): ?>
                    <span class="badge bg-<?= $v ?> text-<?= ($v === 'light') ? 'dark' : '' ?>"><?= ucfirst($v) ?></span>
                    <?php endforeach; ?>
                </div>

                <h6 class="text-secondary mb-2">Pill</h6>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <?php foreach (['primary','secondary','success','danger','warning','info'] as $v): ?>
                    <span class="badge rounded-pill bg-<?= $v ?>"><?= ucfirst($v) ?></span>
                    <?php endforeach; ?>
                </div>

                <h6 class="text-secondary mb-2">In headings &amp; buttons</h6>
                <div class="d-flex flex-wrap align-items-center gap-3">
                    <h5 class="mb-0">Notifications <span class="badge bg-danger">4</span></h5>
                    <button type="button" class="btn btn-primary">
                        Messages <span class="badge bg-secondary ms-1">12</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary position-relative">
                        Inbox
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+ <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                </div>
            </section>

            <!-- ── BREADCRUMB ──────────────────────────────────────────────── -->
            <section id="breadcrumb" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Breadcrumb</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bootstrap Demo</li>
                    </ol>
                </nav>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </section>

            <!-- ── CARDS ───────────────────────────────────────────────────── -->
            <section id="cards" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Cards</h4>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header">Card header</div>
                            <div class="card-body">
                                <h5 class="card-title">Basic card</h5>
                                <p class="card-text text-secondary">Some quick body text to pad out the card. A second sentence for length.</p>
                                <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
                            </div>
                            <div class="card-footer text-secondary small">Last updated 3 mins ago</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 bg-body-secondary">
                            <div class="card-body">
                                <h5 class="card-title">No-border card</h5>
                                <p class="card-text text-secondary">Card with <code>border-0</code> and <code>bg-body-secondary</code>.</p>
                                <a href="#" class="btn btn-outline-primary btn-sm">Action</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-secondary">Subtitle</h6>
                                <h5 class="card-title">Card with list</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Item one</li>
                                <li class="list-group-item">Item two</li>
                                <li class="list-group-item">Item three</li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <?php foreach (['primary','success','danger','warning'] as $v): ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card text-bg-<?= $v ?> h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?= ucfirst($v) ?></h5>
                                <p class="card-text small">Coloured card variant using <code>text-bg-<?= $v ?></code>.</p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ── ACCORDION ───────────────────────────────────────────────── -->
            <section id="accordion" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Accordion</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Default</h6>
                        <div class="accordion" id="accordionDefault">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#acc1" aria-expanded="true" aria-controls="acc1">
                                        Section one
                                    </button>
                                </h2>
                                <div id="acc1" class="accordion-collapse collapse show" data-bs-parent="#accordionDefault">
                                    <div class="accordion-body">Content for the first section. Accordion items collapse sibling panels automatically.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc2" aria-expanded="false" aria-controls="acc2">
                                        Section two
                                    </button>
                                </h2>
                                <div id="acc2" class="accordion-collapse collapse" data-bs-parent="#accordionDefault">
                                    <div class="accordion-body">Content for the second section.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc3" aria-expanded="false" aria-controls="acc3">
                                        Section three
                                    </button>
                                </h2>
                                <div id="acc3" class="accordion-collapse collapse" data-bs-parent="#accordionDefault">
                                    <div class="accordion-body">Content for the third section.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Flush</h6>
                        <div class="accordion accordion-flush" id="accordionFlush">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush1">Flush item one</button>
                                </h2>
                                <div id="flush1" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                    <div class="accordion-body">Flush accordion removes outer borders and rounding.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush2">Flush item two</button>
                                </h2>
                                <div id="flush2" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                    <div class="accordion-body">Second flush item content.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ── FORMS ───────────────────────────────────────────────────── -->
            <section id="forms" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Forms</h4>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Text inputs</h6>
                        <div class="mb-3">
                            <label class="form-label" for="demoEmail">Email address</label>
                            <input type="email" class="form-control" id="demoEmail" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="demoPassword">Password</label>
                            <input type="password" class="form-control" id="demoPassword" value="hunter2">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="demoTextarea">Textarea</label>
                            <textarea class="form-control" id="demoTextarea" rows="3" placeholder="Enter some text…"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="demoSelect">Select</label>
                            <select class="form-select" id="demoSelect">
                                <option value="">Choose…</option>
                                <option>Option one</option>
                                <option>Option two</option>
                                <option>Option three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="demoMultiSelect">Multi-select</label>
                            <select class="form-select" id="demoMultiSelect" multiple>
                                <option>First</option>
                                <option>Second</option>
                                <option>Third</option>
                                <option>Fourth</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="demoFile">File input</label>
                            <input type="file" class="form-control" id="demoFile">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="demoRange">Range</label>
                            <input type="range" class="form-range" id="demoRange" min="0" max="100" value="60">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Input group</h6>
                        <div class="input-group mb-3">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search…">
                            <button class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">£</span>
                            <input type="number" class="form-control" placeholder="0.00">
                            <span class="input-group-text">.00</span>
                        </div>

                        <h6 class="text-secondary mb-2 mt-3">Sizes</h6>
                        <input type="text" class="form-control form-control-lg mb-2" placeholder="Large input">
                        <input type="text" class="form-control mb-2" placeholder="Default input">
                        <input type="text" class="form-control form-control-sm mb-3" placeholder="Small input">

                        <h6 class="text-secondary mb-2">Checkboxes &amp; Radios</h6>
                        <div class="mb-2">
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="chk1" checked><label class="form-check-label" for="chk1">Checked</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="chk2"><label class="form-check-label" for="chk2">Unchecked</label></div>
                            <div class="form-check"><input class="form-check-input" type="checkbox" id="chk3" disabled><label class="form-check-label" for="chk3">Disabled</label></div>
                        </div>
                        <div class="mb-2">
                            <div class="form-check"><input class="form-check-input" type="radio" name="demoRadio" id="rad1" checked><label class="form-check-label" for="rad1">Radio one</label></div>
                            <div class="form-check"><input class="form-check-input" type="radio" name="demoRadio" id="rad2"><label class="form-check-label" for="rad2">Radio two</label></div>
                            <div class="form-check"><input class="form-check-input" type="radio" name="demoRadio" id="rad3" disabled><label class="form-check-label" for="rad3">Disabled</label></div>
                        </div>
                        <h6 class="text-secondary mb-2">Switches</h6>
                        <div class="form-check form-switch mb-1"><input class="form-check-input" type="checkbox" role="switch" id="sw1" checked><label class="form-check-label" for="sw1">Switch on</label></div>
                        <div class="form-check form-switch mb-1"><input class="form-check-input" type="checkbox" role="switch" id="sw2"><label class="form-check-label" for="sw2">Switch off</label></div>
                        <div class="form-check form-switch mb-3"><input class="form-check-input" type="checkbox" role="switch" id="sw3" disabled><label class="form-check-label" for="sw3">Disabled</label></div>

                        <h6 class="text-secondary mb-2">Validation states</h6>
                        <div class="mb-2">
                            <input type="text" class="form-control is-valid" value="Valid input">
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-2">
                            <input type="text" class="form-control is-invalid" value="Invalid input">
                            <div class="invalid-feedback">Please provide a valid value.</div>
                        </div>
                        <div class="mb-2">
                            <select class="form-select is-valid"><option>Valid select</option></select>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="mb-0">
                            <select class="form-select is-invalid"><option>Invalid select</option></select>
                            <div class="invalid-feedback">Please select a valid option.</div>
                        </div>
                    </div>
                </div>

                <hr class="my-3">

                <h6 class="text-secondary mb-2">Floating labels</h6>
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatEmail" placeholder="name@example.com">
                            <label for="floatEmail">Email address</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatPass" placeholder="Password">
                            <label for="floatPass">Password</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-floating">
                            <select class="form-select" id="floatSelect">
                                <option value="">Choose…</option>
                                <option>One</option>
                                <option>Two</option>
                            </select>
                            <label for="floatSelect">Select option</label>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ── LIST GROUP ──────────────────────────────────────────────── -->
            <section id="listgroup" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">List Group</h4>
                <div class="row g-3">
                    <div class="col-md-4">
                        <h6 class="text-secondary mb-2">Default</h6>
                        <ul class="list-group">
                            <li class="list-group-item">Plain item</li>
                            <li class="list-group-item active" aria-current="true">Active item</li>
                            <li class="list-group-item">Another item</li>
                            <li class="list-group-item disabled" aria-disabled="true">Disabled item</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-secondary mb-2">With badges</h6>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Inbox <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Spam <span class="badge bg-danger rounded-pill">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Drafts <span class="badge bg-secondary rounded-pill">1</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6 class="text-secondary mb-2">Contextual</h6>
                        <ul class="list-group">
                            <?php foreach (['primary','secondary','success','danger','warning','info','light','dark'] as $v): ?>
                            <li class="list-group-item list-group-item-<?= $v ?>"><?= ucfirst($v) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- ── NAVS & TABS ─────────────────────────────────────────────── -->
            <section id="navs" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Navs &amp; Tabs</h4>
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Tabs</h6>
                        <ul class="nav nav-tabs" id="demoTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab">Tab one</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab">Tab two</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab">Tab three</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" disabled type="button">Disabled</button>
                            </li>
                        </ul>
                        <div class="tab-content border border-top-0 p-3">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">Content for the first tab.</div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel">Content for the second tab.</div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel">Content for the third tab.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-secondary mb-2">Pills</h6>
                        <ul class="nav nav-pills" id="demoPills" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pill1-tab" data-bs-toggle="pill" data-bs-target="#pill1" type="button" role="tab">Active</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pill2-tab" data-bs-toggle="pill" data-bs-target="#pill2" type="button" role="tab">Link</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pill3-tab" data-bs-toggle="pill" data-bs-target="#pill3" type="button" role="tab">Link</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="pill1" role="tabpanel">Content for pill one.</div>
                            <div class="tab-pane fade" id="pill2" role="tabpanel">Content for pill two.</div>
                            <div class="tab-pane fade" id="pill3" role="tabpanel">Content for pill three.</div>
                        </div>

                        <h6 class="text-secondary mb-2 mt-3">Underline</h6>
                        <ul class="nav nav-underline">
                            <li class="nav-item"><a class="nav-link active" href="#">Active</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                            <li class="nav-item"><a class="nav-link disabled" aria-disabled="true">Disabled</a></li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- ── PAGINATION ──────────────────────────────────────────────── -->
            <section id="pagination" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Pagination</h4>
                <nav aria-label="Default pagination">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
                <nav aria-label="Large pagination">
                    <ul class="pagination pagination-lg">
                        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
                    </ul>
                </nav>
                <nav aria-label="Small pagination">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </section>

            <!-- ── PROGRESS ────────────────────────────────────────────────── -->
            <section id="progress" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Progress</h4>
                <div class="progress mb-3" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height:1.25rem">
                    <div class="progress-bar" style="width:25%">25%</div>
                </div>
                <?php
                $bars = [
                    ['value' => 50, 'color' => 'success',   'label' => '50%'],
                    ['value' => 75, 'color' => 'warning',   'label' => '75%'],
                    ['value' => 90, 'color' => 'danger',    'label' => '90%'],
                    ['value' => 60, 'color' => 'info',      'label' => ''],
                    ['value' => 40, 'color' => 'secondary', 'label' => ''],
                ];
                foreach ($bars as $bar): ?>
                <div class="progress mb-3" role="progressbar" aria-valuenow="<?= $bar['value'] ?>" aria-valuemin="0" aria-valuemax="100" style="height:1.25rem">
                    <div class="progress-bar bg-<?= $bar['color'] ?>" style="width:<?= $bar['value'] ?>%"><?= $bar['label'] ?></div>
                </div>
                <?php endforeach; ?>
                <div class="progress mb-3" role="progressbar" style="height:1.25rem">
                    <div class="progress-bar bg-success" style="width:35%"></div>
                    <div class="progress-bar bg-warning" style="width:25%"></div>
                    <div class="progress-bar bg-danger"  style="width:15%"></div>
                </div>
                <div class="progress mb-0" role="progressbar" style="height:1.25rem">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" style="width:65%"></div>
                </div>
            </section>

            <!-- ── SPINNERS ────────────────────────────────────────────────── -->
            <section id="spinners" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Spinners</h4>
                <h6 class="text-secondary mb-2">Border</h6>
                <div class="d-flex flex-wrap gap-3 align-items-center mb-3">
                    <?php foreach (['primary','secondary','success','danger','warning','info','dark'] as $v): ?>
                    <div class="spinner-border text-<?= $v ?>" role="status"><span class="visually-hidden">Loading…</span></div>
                    <?php endforeach; ?>
                </div>
                <h6 class="text-secondary mb-2">Grow</h6>
                <div class="d-flex flex-wrap gap-3 align-items-center mb-3">
                    <?php foreach (['primary','secondary','success','danger','warning','info','dark'] as $v): ?>
                    <div class="spinner-grow text-<?= $v ?>" role="status"><span class="visually-hidden">Loading…</span></div>
                    <?php endforeach; ?>
                </div>
                <h6 class="text-secondary mb-2">Sizes &amp; in buttons</h6>
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
                    <div class="spinner-border text-primary" role="status"></div>
                    <button type="button" class="btn btn-primary" disabled>
                        <span class="spinner-border spinner-border-sm me-1"></span> Loading…
                    </button>
                    <button type="button" class="btn btn-outline-secondary" disabled>
                        <span class="spinner-grow spinner-grow-sm me-1"></span> Working…
                    </button>
                </div>
            </section>

            <!-- ── TABLES ──────────────────────────────────────────────────── -->
            <section id="tables" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Tables</h4>
                <div class="table-responsive mb-3">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th><th>Name</th><th>Role</th><th>Status</th><th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td><td>Alice Smith</td><td>Admin</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td><button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash3"></i></button></td>
                            </tr>
                            <tr class="table-active">
                                <td>2</td><td>Bob Jones</td><td>Editor</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td><button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash3"></i></button></td>
                            </tr>
                            <tr>
                                <td>3</td><td>Carol White</td><td>Viewer</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                <td><button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash3"></i></button></td>
                            </tr>
                            <tr class="table-danger">
                                <td>4</td><td>Dave Brown</td><td>Viewer</td>
                                <td><span class="badge bg-danger">Banned</span></td>
                                <td><button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button><button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash3"></i></button></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr><td colspan="5" class="text-secondary small">4 total users</td></tr>
                        </tfoot>
                    </table>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table table-striped table-sm table-bordered">
                        <thead>
                            <tr><th>Variant</th><th>Class</th><th>Preview</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach (['primary','secondary','success','danger','warning','info','light','dark'] as $v): ?>
                            <tr class="table-<?= $v ?>">
                                <td><?= ucfirst($v) ?></td><td><code>table-<?= $v ?></code></td><td>Row background</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- ── MODAL ───────────────────────────────────────────────────── -->
            <section id="modal" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Modal</h4>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#demoModal">
                        Launch modal
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#demoModalSm">
                        Small modal
                    </button>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#demoModalLg">
                        Large modal
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#demoModalScrollable">
                        Scrollable modal
                    </button>
                </div>

                <!-- Default modal -->
                <div class="modal fade" id="demoModal" tabindex="-1" aria-labelledby="demoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="demoModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>This is the modal body. It can contain any content — forms, tables, media, etc.</p>
                                <p class="mb-0 text-secondary small">The backdrop opacity is set to 0.9 for this theme.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Small modal -->
                <div class="modal fade" id="demoModalSm" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Small modal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">A compact modal for simple confirmations.</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Large modal -->
                <div class="modal fade" id="demoModalLg" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Large modal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>A large modal is useful for forms, preview panels, or anything needing extra horizontal space.</p>
                                <div class="row g-3">
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="First name"></div>
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Last name"></div>
                                    <div class="col-12"><input type="email" class="form-control" placeholder="Email address"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scrollable modal -->
                <div class="modal fade" id="demoModalScrollable" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Scrollable modal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php for ($i = 1; $i <= 15; $i++): ?>
                                <p>Paragraph <?= $i ?> — Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <?php endfor; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ── OFFCANVAS ───────────────────────────────────────────────── -->
            <section id="offcanvas" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Offcanvas</h4>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasStart">Start (left)</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd">End (right)</button>
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom">Bottom</button>
                </div>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart" aria-labelledby="offcanvasStartLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasStartLabel">Offcanvas start</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <p>Content inside an offcanvas sliding in from the left.</p>
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link" href="#">Nav link one</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Nav link two</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Nav link three</a></li>
                        </ul>
                    </div>
                </div>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasEndLabel">Offcanvas end</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <p>Content sliding in from the right side.</p>
                        <input type="text" class="form-control mb-2" placeholder="Search…">
                        <button class="btn btn-primary w-100">Search</button>
                    </div>
                </div>

                <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" style="height:30vh">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body small">Content sliding up from the bottom.</div>
                </div>
            </section>

            <!-- ── TOAST ───────────────────────────────────────────────────── -->
            <section id="toast" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Toast</h4>
                <button type="button" class="btn btn-primary mb-3" id="showToastBtn">Show toast</button>

                <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index:1100">
                    <div id="demoToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto"><i class="bi bi-bell-fill me-1"></i> Notification</strong>
                            <small class="text-secondary">just now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">This is a Bootstrap toast. It dismisses automatically after 5 seconds.</div>
                    </div>
                </div>

                <h6 class="text-secondary mb-2">Static examples</h6>
                <div class="d-flex flex-wrap gap-3">
                    <?php foreach (['success' => 'bi-check-circle-fill', 'danger' => 'bi-exclamation-triangle-fill', 'warning' => 'bi-exclamation-circle-fill', 'info' => 'bi-info-circle-fill'] as $variant => $icon): ?>
                    <div class="toast show position-static" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-<?= $variant ?> text-<?= ($variant === 'warning') ? 'dark' : 'white' ?>">
                            <i class="bi <?= $icon ?> me-2"></i>
                            <strong class="me-auto"><?= ucfirst($variant) ?></strong>
                            <button type="button" class="btn-close <?= ($variant === 'warning') ? '' : 'btn-close-white' ?>" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body small"><?= ucfirst($variant) ?> toast message.</div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- ── TOOLTIPS ────────────────────────────────────────────────── -->
            <section id="tooltips" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Tooltips</h4>
                <p class="text-secondary small mb-2">Tooltips are opt-in and must be initialised via JavaScript.</p>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">Top</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">Right</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">Bottom</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left">Left</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-html="true" title="<em>HTML</em> tooltip">HTML tooltip</button>
                </div>
            </section>

            <!-- ── POPOVERS ────────────────────────────────────────────────── -->
            <section id="popovers" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Popovers</h4>
                <p class="text-secondary small mb-2">Popovers are opt-in and must be initialised via JavaScript.</p>
                <div class="d-flex flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="popover" data-bs-placement="top" data-bs-title="Popover title" data-bs-content="This is a popover positioned on top.">Top</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="popover" data-bs-placement="right" data-bs-title="Popover title" data-bs-content="This is a popover on the right.">Right</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-title="Popover title" data-bs-content="This is a popover on the bottom.">Bottom</button>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="popover" data-bs-placement="left" data-bs-title="Popover title" data-bs-content="This is a popover on the left.">Left</button>
                    <button type="button" class="btn btn-secondary" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Dismissible" data-bs-content="Click away to dismiss this popover.">Dismissible</button>
                </div>
            </section>

            <!-- ── DROPDOWNS ───────────────────────────────────────────────── -->
            <section id="dropdowns" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Dropdowns</h4>
                <div class="d-flex flex-wrap gap-2 align-items-start">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">Primary</button>
                        <ul class="dropdown-menu">
                            <li><h6 class="dropdown-header">Header</h6></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">Secondary</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item disabled" href="#">Disabled</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown">Success</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item active" href="#">Active item</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger">Split button</button>
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action one</a></li>
                            <li><a class="dropdown-item" href="#">Action two</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">Dropup</button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- ── CAROUSEL ────────────────────────────────────────────────── -->
            <section id="carousel" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Carousel</h4>
                <div class="row">
                    <div class="col-md-8 col-lg-6">
                        <div id="demoCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#demoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#demoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#demoCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner rounded border">
                                <div class="carousel-item active">
                                    <div class="d-flex align-items-center justify-content-center bg-body-secondary" style="height:220px">
                                        <div class="text-center"><i class="bi bi-image display-3 text-secondary"></i><p class="mt-2 mb-0 text-secondary">Slide one</p></div>
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="mb-0">First slide</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex align-items-center justify-content-center bg-body-tertiary" style="height:220px">
                                        <div class="text-center"><i class="bi bi-image display-3 text-secondary"></i><p class="mt-2 mb-0 text-secondary">Slide two</p></div>
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="mb-0">Second slide</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="d-flex align-items-center justify-content-center bg-black" style="height:220px">
                                        <div class="text-center"><i class="bi bi-image display-3 text-secondary"></i><p class="mt-2 mb-0 text-secondary">Slide three</p></div>
                                    </div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="mb-0">Third slide</h5>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#demoCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demoCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ── UTILITIES ───────────────────────────────────────────────── -->
            <section id="utilities" class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">Utilities</h4>

                <div class="row g-4">
                    <div class="col-md-4">
                        <h6 class="text-secondary mb-2">Borders</h6>
                        <div class="d-flex flex-wrap gap-2 mb-2">
                            <div class="p-3 border">border</div>
                            <div class="p-3 border border-2">border-2</div>
                            <div class="p-3 border border-primary">border-primary</div>
                            <div class="p-3 border border-success">border-success</div>
                            <div class="p-3 border border-danger">border-danger</div>
                            <div class="p-3 border-dashed">border-dashed</div>
                        </div>
                        <h6 class="text-secondary mb-2">Border radius</h6>
                        <div class="d-flex flex-wrap gap-2 align-items-center">
                            <div class="p-3 bg-body-secondary border rounded-0">0</div>
                            <div class="p-3 bg-body-secondary border rounded-1">1</div>
                            <div class="p-3 bg-body-secondary border rounded">def</div>
                            <div class="p-3 bg-body-secondary border rounded-3">3</div>
                            <div class="p-3 bg-body-secondary border rounded-pill">pill</div>
                            <div class="p-3 bg-body-secondary border rounded-circle" style="width:50px;height:50px"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h6 class="text-secondary mb-2">Shadows</h6>
                        <div class="d-flex flex-wrap gap-3 mb-3">
                            <div class="p-3 border rounded shadow-none bg-body-secondary">none</div>
                            <div class="p-3 border rounded shadow-sm bg-body-secondary">sm</div>
                            <div class="p-3 border rounded shadow bg-body-secondary">default</div>
                            <div class="p-3 border rounded shadow-lg bg-body-secondary">lg</div>
                        </div>
                        <h6 class="text-secondary mb-2">Opacity</h6>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <?php foreach ([100, 75, 50, 25, 10] as $o): ?>
                            <div class="p-3 bg-primary opacity-<?= $o ?> rounded" style="width:50px;height:50px" title="opacity-<?= $o ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h6 class="text-secondary mb-2">Glass utility <code>.glass</code></h6>
                        <div class="p-4 rounded glass mb-3">
                            <p class="mb-0">Frosted glass effect using the custom <code>.glass</code> class. Works in both light and dark mode.</p>
                        </div>
                        <h6 class="text-secondary mb-2">Image invert <code>.invert</code></h6>
                        <div class="d-flex gap-3 align-items-center">
                            <img src="/icon.svg" width="40" height="40" alt="Logo" class="rounded">
                            <img src="/icon.svg" width="40" height="40" alt="Logo" class="rounded invert" title=".invert (dark mode only)">
                            <span class="text-secondary small">Original / <code>.invert</code></span>
                        </div>
                    </div>

                    <div class="col-12">
                        <h6 class="text-secondary mb-2">Display &amp; flex helpers</h6>
                        <div class="d-flex gap-3 flex-wrap align-items-center p-3 border rounded mb-3">
                            <span class="badge bg-secondary">d-flex</span>
                            <span class="badge bg-secondary">gap-3</span>
                            <span class="badge bg-secondary">flex-wrap</span>
                            <span class="badge bg-secondary">align-items-center</span>
                            <span class="badge bg-secondary">justify-content-between</span>
                        </div>
                        <h6 class="text-secondary mb-2">Text utilities</h6>
                        <p class="text-start mb-1">text-start</p>
                        <p class="text-center mb-1">text-center</p>
                        <p class="text-end mb-1">text-end</p>
                        <p class="text-truncate mb-1" style="max-width:300px">text-truncate — This text is very long and will be clipped with an ellipsis at the end of the container.</p>
                        <p class="text-nowrap overflow-hidden mb-0">text-nowrap — The quick brown fox jumps over the lazy dog.</p>
                    </div>
                </div>
            </section>

        </div><!-- /col -->
    </div><!-- /row -->
</div>
<?= $this->endSection() ?>
