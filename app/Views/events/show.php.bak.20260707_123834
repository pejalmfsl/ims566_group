<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$status = (string) ($event['status'] ?? 'draft');
$statusClasses = [
    'draft' => 'text-bg-secondary',
    'open' => 'text-bg-success',
    'closed' => 'text-bg-danger',
];
$registrationUrl = ! empty($event['registration_token']) ? site_url('register/' . $event['registration_token']) : '';
?>

<section class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4 bg-primary text-white">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
            <div>
                <p class="text-warning fw-semibold text-uppercase mb-2">Event Detail</p>
                <h1 class="h2 fw-bold mb-2"><?= esc($event['event_name'] ?? 'Event') ?></h1>
                <p class="mb-0"><?= esc($event['venue'] ?? '-') ?> · <?= esc($event['event_date'] ?? '-') ?> · <?= esc(substr((string) ($event['event_time'] ?? ''), 0, 5)) ?></p>
            </div>
            <div class="align-self-md-center d-flex flex-wrap gap-2">
                <a href="<?= site_url('attendance/' . $event['id']) ?>" class="btn btn-warning">View Participants</a>
                <a href="<?= site_url('events/' . $event['id'] . '/edit') ?>" class="btn btn-outline-warning">Edit Event</a>
                <a href="<?= site_url('events') ?>" class="btn btn-outline-warning">Back</a>
            </div>
        </div>
    </div>
</section>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 uitm-card h-100">
            <div class="card-body">
                <div class="text-muted fw-semibold">Registered</div>
                <div class="display-6 fw-bold text-primary"><?= esc($registered ?? 0) ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 uitm-card h-100">
            <div class="card-body">
                <div class="text-muted fw-semibold">Present</div>
                <div class="display-6 fw-bold text-primary"><?= esc($attended ?? 0) ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 uitm-card h-100">
            <div class="card-body">
                <div class="text-muted fw-semibold">Absent</div>
                <div class="display-6 fw-bold text-primary"><?= esc($absent ?? 0) ?></div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white border-warning">
        <span class="fw-bold text-primary">Maklumat Event</span>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="small text-muted">Event Name</div>
                <div class="fw-semibold"><?= esc($event['event_name'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Status</div>
                <span class="badge <?= esc($statusClasses[$status] ?? 'text-bg-secondary') ?>"><?= esc(ucfirst($status)) ?></span>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Venue</div>
                <div class="fw-semibold"><?= esc($event['venue'] ?? '-') ?></div>
            </div>
            <div class="col-md-3">
                <div class="small text-muted">Date</div>
                <div class="fw-semibold"><?= esc($event['event_date'] ?? '-') ?></div>
            </div>
            <div class="col-md-3">
                <div class="small text-muted">Time</div>
                <div class="fw-semibold"><?= esc(substr((string) ($event['event_time'] ?? ''), 0, 5) ?: '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Max Participants</div>
                <div class="fw-semibold"><?= esc($event['max_participants'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Registration Close Date</div>
                <div class="fw-semibold"><?= esc($event['registration_close_date'] ?? '-') ?></div>
            </div>
            <div class="col-12">
                <div class="small text-muted">Description</div>
                <div><?= esc($event['description'] ?? '-') ?></div>
            </div>
            <div class="col-12">
                <div class="small text-muted">Registration URL</div>
                <?php if ($registrationUrl !== ''): ?>
                    <div class="input-group">
                        <input type="text" class="form-control" value="<?= esc($registrationUrl) ?>" readonly>
                        <a class="btn btn-outline-primary" target="_blank" href="<?= esc($registrationUrl) ?>">Open</a>
                    </div>
                <?php else: ?>
                    <div class="text-muted">Token belum dijana.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
