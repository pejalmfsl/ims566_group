<!doctype html>
<html lang="ms">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'LERS') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets/css/uitm-theme.css') ?>" rel="stylesheet">
</head>
<body class="uitm-page">
    <nav class="navbar navbar-dark bg-primary border-bottom border-warning">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= site_url('/') ?>">LERS</a>
            <a href="<?= site_url('login') ?>" class="btn btn-warning">Login</a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="text-center text-white mb-4">
                    <img src="<?= base_url('/public/uitm-logo.svg') ?>" alt="Logo UiTM" class="img-fluid uitm-logo bg-white rounded-4 shadow-sm p-3 mb-4">
                    <p class="text-warning fw-semibold text-uppercase mb-2">Universiti Teknologi MARA</p>
                    <h1 class="display-5 fw-bold mb-3">Selamat Datang ke LERS</h1>
                    <p class="lead mb-0">Library Event Registration System untuk pendaftaran aktiviti perpustakaan secara dalam talian.</p>
                </div>

                <div class="card shadow border-0 uitm-card">
                    <div class="card-body p-4 p-md-5 text-center">
                        <h2 class="h4 fw-bold mb-3 text-primary">Akses Sistem</h2>
                        <p class="text-muted mb-4">Log masuk untuk mengurus aktiviti, peserta dan rekod kehadiran.</p>
                        <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">
                            <a href="<?= site_url('login') ?>" class="btn btn-primary btn-lg">Login</a>
                            <a href="<?= site_url('login') ?>" class="btn btn-outline-warning btn-lg">Terus ke Sistem</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
