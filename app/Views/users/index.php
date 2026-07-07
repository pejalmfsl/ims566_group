<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4 bg-primary text-white">
        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <p class="text-warning fw-semibold text-uppercase mb-2">User Management</p>
                <h1 class="h2 fw-bold mb-2">Urus Akaun Sistem</h1>
                <p class="mb-0">Tambah dan pantau akaun admin yang boleh mengurus event LERS.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?= site_url('users/create') ?>" class="btn btn-warning btn-lg">Create User</a>
            </div>
        </div>
    </div>
</section>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-warning d-flex justify-content-between align-items-center">
        <span class="fw-bold text-primary">Senarai User</span>
        <span class="badge text-bg-light border"><?= esc(count($users ?? [])) ?> rekod</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (($users ?? []) as $user): ?>
                <tr>
                    <td class="fw-semibold"><?= esc($user['username']) ?></td>
                    <td><?= esc($user['name']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><span class="badge <?= ($user['role'] ?? '') === 'superadmin' ? 'text-bg-warning' : 'text-bg-secondary' ?>"><?= esc($user['role']) ?></span></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($users ?? [])): ?>
                <tr>
                    <td colspan="4" class="text-center text-muted py-5">Tiada user direkodkan.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
