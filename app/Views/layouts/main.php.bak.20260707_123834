<!doctype html>
<html lang="ms">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'LERS') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets/css/uitm-theme.css') ?>" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom border-warning">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="<?= site_url('dashboard') ?>">
            <img src="<?= base_url('/public/uitm-logo.svg') ?>" alt="Logo UiTM" height="34" class="bg-white rounded-2 p-1">
            <span>LERS</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                    <?php if (session()->get('role') === 'superadmin'): ?>
                        <li class="nav-item"><a class="nav-link" href="<?= site_url('users') ?>">Users</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('events') ?>">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('participants') ?>">Participants</a></li>
                    <li class="nav-item"><span class="badge text-bg-warning"><?= esc(session()->get('role') ?? 'user') ?></span></li>
                    <li class="nav-item"><a class="btn btn-sm btn-warning" href="<?= site_url('logout') ?>">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="btn btn-sm btn-warning" href="<?= site_url('login') ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <?= esc(session()->getFlashdata('success')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <?= esc(session()->getFlashdata('error')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
