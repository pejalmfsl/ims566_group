<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$statusClasses = [
    'draft' => 'text-bg-secondary',
    'open' => 'text-bg-success',
    'closed' => 'text-bg-danger',
];
$filters = $filters ?? ['q' => '', 'status' => ''];
?>

<section class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4 bg-primary text-white">
        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <p class="text-warning fw-semibold text-uppercase mb-2">Event Management</p>
                <h1 class="h2 fw-bold mb-2">Urus Aktiviti Perpustakaan</h1>
                <p class="mb-0">Cipta, kemaskini dan salin URL pendaftaran unik untuk setiap event.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?= site_url('events/create') ?>" class="btn btn-warning btn-lg">Add Event</a>
            </div>
        </div>
    </div>
</section>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <form method="get" action="<?= site_url('events') ?>" class="row g-3 align-items-end">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Search</label>
                <input type="search" name="q" class="form-control" placeholder="Event name, venue, description" value="<?= esc($filters['q'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="draft" <?= ($filters['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                    <option value="open" <?= ($filters['status'] ?? '') === 'open' ? 'selected' : '' ?>>Open</option>
                    <option value="closed" <?= ($filters['status'] ?? '') === 'closed' ? 'selected' : '' ?>>Closed</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button class="btn btn-primary flex-fill" type="submit">Filter</button>
                <a class="btn btn-outline-secondary" href="<?= site_url('events') ?>">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-warning d-flex justify-content-between align-items-center">
        <span class="fw-bold text-primary">Senarai Event</span>
        <span class="badge text-bg-light border"><?= esc(count($events ?? [])) ?> rekod</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
            <tr>
                <th>Event</th>
                <th>Date & Time</th>
                <th>Status</th>
                <th>Registration URL</th>
                <th class="text-end">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (($events ?? []) as $event): ?>
                <?php
                    $status = $event['status'] ?? 'draft';
                    $registrationUrl = site_url('register/' . ($event['registration_token'] ?? ''));
                ?>
                <tr>
                    <td>
                        <div class="fw-semibold"><?= esc($event['event_name']) ?></div>
                        <div class="small text-muted"><?= esc($event['venue']) ?> · Capacity <?= esc($event['max_participants']) ?></div>
                        <?php if (! empty($event['description'])): ?>
                            <div class="small text-muted text-truncate event-description"><?= esc($event['description']) ?></div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div><?= esc($event['event_date']) ?></div>
                        <div class="small text-muted"><?= esc(substr((string) ($event['event_time'] ?? ''), 0, 5)) ?></div>
                    </td>
                    <td><span class="badge <?= esc($statusClasses[$status] ?? 'text-bg-secondary') ?>"><?= esc(ucfirst($status)) ?></span></td>
                    <td>
                        <?php if (! empty($event['registration_token'])): ?>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" value="<?= esc($registrationUrl) ?>" readonly>
                                <button type="button" class="btn btn-outline-primary" data-copy-url="<?= esc($registrationUrl) ?>">Copy</button>
                            </div>
                        <?php else: ?>
                            <span class="text-muted small">Token belum dijana.</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm" role="group">
                            <a class="btn btn-outline-secondary" href="<?= site_url('events/' . $event['id']) ?>">View</a>
                            <a class="btn btn-outline-primary" href="<?= site_url('events/' . $event['id'] . '/edit') ?>">Edit</a>
                            <a class="btn btn-outline-danger" href="<?= site_url('events/' . $event['id'] . '/delete') ?>" onclick="return confirm('Padam event ini?')">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($events ?? [])): ?>
                <tr>
                    <td colspan="5" class="text-center text-muted py-5">Tiada event sepadan dengan carian.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
document.querySelectorAll('[data-copy-url]').forEach((button) => {
    button.addEventListener('click', async () => {
        const url = button.getAttribute('data-copy-url');
        await navigator.clipboard.writeText(url);
        button.textContent = 'Copied';
        setTimeout(() => button.textContent = 'Copy', 1500);
    });
});
</script>
<?= $this->endSection() ?>
