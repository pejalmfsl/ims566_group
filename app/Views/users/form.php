<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4 bg-primary text-white">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
            <div>
                <p class="text-warning fw-semibold text-uppercase mb-2">User Management</p>
                <h1 class="h2 fw-bold mb-0">Create User</h1>
            </div>
            <div class="align-self-md-center">
                <a class="btn btn-outline-warning" href="<?= site_url('users') ?>">Back to Users</a>
            </div>
        </div>
    </div>
</section>

<div class="card shadow-sm border-0 uitm-card">
    <div class="card-body p-4 p-md-5">
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <div class="fw-semibold mb-1">User tidak berjaya dicipta.</div>
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('users') ?>">
            <?= csrf_field() ?>
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" class="form-control form-control-lg" value="<?= esc(old('username')) ?>" required>
                    <div class="form-text">Username akan disimpan dalam huruf besar.</div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" value="<?= esc(old('name')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" value="<?= esc(old('email')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Role</label>
                    <input type="text" class="form-control form-control-lg" value="admin" disabled>
                    <div class="form-text">Superadmin hanya mencipta akaun admin.</div>
                </div>
            </div>
            <div class="d-flex flex-column flex-sm-row gap-2 mt-4">
                <button class="btn btn-primary btn-lg" type="submit">Save User</button>
                <a class="btn btn-outline-secondary btn-lg" href="<?= site_url('users') ?>">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
