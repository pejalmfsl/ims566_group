<!doctype html>
<html lang="ms">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'LERS Login') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('/public/assets/css/uitm-theme.css') ?>" rel="stylesheet">
</head>
<body class="uitm-page">
    <main class="container py-5">
        <div class="row min-vh-100 align-items-center justify-content-center py-4">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="text-center text-white mb-4">
                    <a href="<?= site_url('/') ?>" class="d-inline-block">
                        <img src="<?= base_url('/public/uitm-logo.svg') ?>" alt="Logo UiTM" class="img-fluid uitm-logo-sm bg-white rounded-4 shadow-sm p-3 mb-3">
                    </a>
                    <p class="text-warning fw-semibold text-uppercase mb-1">Universiti Teknologi MARA</p>
                    <h1 class="h2 fw-bold mb-0">LIBRARY EVENT<br>REGISTRATION SYSTEM (LERS)</h1>
                </div>

                <div class="card shadow border-0 uitm-card">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="h4 mb-1 text-primary fw-bold">LOGIN</h2>
                            <!-- <p class="text-muted mb-0">Library Event Registration System</p> -->
                        </div>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= esc(session()->getFlashdata('success')) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= esc(session()->getFlashdata('error')) ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($validation)): ?>
                            <div class="alert alert-danger" role="alert">
                                <div class="fw-semibold mb-1">Login failed.</div>
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?= site_url('login') ?>">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <input type="text" name="username" class="form-control form-control-lg" value="<?= esc(old('username')) ?>" required autofocus>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg" required>
                            </div>
                            *Demo Account Superadmin: superadmin/Password123!
                            <br>
                            *Demo Account Admin: admin/123456
                            <button class="btn btn-primary btn-lg w-100" type="submit">Login</button>
                        </form>

                        <div class="text-center mt-4">
                            <a href="<?= site_url('/') ?>" class="link-secondary text-decoration-none">Back to landing page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
