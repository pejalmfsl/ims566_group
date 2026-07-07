<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$status = (string) ($participant['status'] ?? 'registered');
$statusOptions = [
    'registered' => 'Registered',
    'approved' => 'Approved',
    'rejected' => 'Rejected',
    'attended' => 'Attended',
    'absent' => 'Absent',
];
$statusClasses = [
    'registered' => 'text-bg-secondary',
    'approved' => 'text-bg-info',
    'rejected' => 'text-bg-danger',
    'attended' => 'text-bg-success',
    'absent' => 'text-bg-warning',
];
?>

<section class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4 bg-primary text-white">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
            <div>
                <p class="text-warning fw-semibold text-uppercase mb-2">Participant Detail</p>
                <h1 class="h2 fw-bold mb-2"><?= esc($participant['full_name'] ?? 'Participant') ?></h1>
                <p class="mb-0"><?= esc($event['event_name'] ?? '-') ?> · <?= esc($event['event_date'] ?? '-') ?></p>
            </div>
            <div class="align-self-md-center d-flex flex-wrap gap-2">
                <a href="<?= site_url('participants/' . $participant['id'] . '/edit') ?>" class="btn btn-warning">Edit Participant</a>
                <a href="<?= site_url('attendance/' . $participant['event_id']) ?>" class="btn btn-outline-warning">Back to List</a>
            </div>
        </div>
    </div>
</section>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white border-warning">
        <span class="fw-bold text-primary">Maklumat Peserta</span>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="small text-muted">Full Name</div>
                <div class="fw-semibold"><?= esc($participant['full_name'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Student/Staff ID</div>
                <div class="fw-semibold"><?= esc($participant['student_staff_id'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Email</div>
                <div class="fw-semibold"><?= esc($participant['email'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Phone Number</div>
                <div class="fw-semibold"><?= esc($participant['phone_number'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Faculty</div>
                <div class="fw-semibold"><?= esc($participant['faculty'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Programme</div>
                <div class="fw-semibold"><?= esc($participant['programme'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Registration Date</div>
                <div class="fw-semibold"><?= esc($participant['register_date'] ?? $participant['created_at'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Status</div>
                <span class="badge <?= esc($statusClasses[$status] ?? 'text-bg-secondary') ?>"><?= esc($statusOptions[$status] ?? ucfirst($status)) ?></span>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-warning">
        <span class="fw-bold text-primary">Maklumat Event</span>
    </div>
    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="small text-muted">Event</div>
                <div class="fw-semibold"><?= esc($event['event_name'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Venue</div>
                <div class="fw-semibold"><?= esc($event['venue'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Date</div>
                <div class="fw-semibold"><?= esc($event['event_date'] ?? '-') ?></div>
            </div>
            <div class="col-md-6">
                <div class="small text-muted">Time</div>
                <div class="fw-semibold"><?= esc(substr((string) ($event['event_time'] ?? ''), 0, 5) ?: '-') ?></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
