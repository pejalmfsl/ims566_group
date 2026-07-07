<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$isEdit = ! empty($event['id']);
$currentStatus = old('status', $event['status'] ?? 'draft');
?>

<section class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4 bg-primary text-white">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
            <div>
                <p class="text-warning fw-semibold text-uppercase mb-2">Event Management</p>
                <h1 class="h2 fw-bold mb-0"><?= $isEdit ? 'Edit Event' : 'Create Event' ?></h1>
            </div>
            <div class="align-self-md-center">
                <a class="btn btn-outline-warning" href="<?= site_url('events') ?>">Back to Events</a>
            </div>
        </div>
    </div>
</section>

<?php if ($isEdit && ! empty($event['registration_token'])): ?>
    <div class="alert alert-info shadow-sm" role="alert">
        <div class="fw-semibold mb-1">URL pendaftaran event</div>
        <div class="input-group">
            <input type="text" class="form-control" value="<?= esc(site_url('register/' . $event['registration_token'])) ?>" readonly>
            <a class="btn btn-outline-primary" target="_blank" href="<?= site_url('register/' . $event['registration_token']) ?>">Open</a>
        </div>
    </div>
<?php endif; ?>

<div class="card shadow-sm border-0 uitm-card">
    <div class="card-body p-4 p-md-5">
        <form method="post" action="<?= $isEdit ? site_url('events/' . $event['id']) : site_url('events') ?>">
            <?= csrf_field() ?>
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <div class="row g-4">
                <div class="col-md-7">
                    <label class="form-label fw-semibold">Event Name</label>
                    <input type="text" name="event_name" class="form-control form-control-lg" value="<?= esc(old('event_name', $event['event_name'] ?? '')) ?>" required>
                </div>
                <div class="col-md-5">
                    <label class="form-label fw-semibold">Venue</label>
                    <input type="text" name="venue" class="form-control form-control-lg" value="<?= esc(old('venue', $event['venue'] ?? '')) ?>" required>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Ringkasan aktiviti dan maklumat penting untuk peserta"><?= esc(old('description', $event['description'] ?? '')) ?></textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Event Date</label>
                    <input type="date" name="event_date" class="form-control" value="<?= esc(old('event_date', $event['event_date'] ?? '')) ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Event Time</label>
                    <input type="time" name="event_time" class="form-control" value="<?= esc(old('event_time', substr((string) ($event['event_time'] ?? ''), 0, 5))) ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Max Participants</label>
                    <input type="number" name="max_participants" class="form-control" min="1" value="<?= esc(old('max_participants', $event['max_participants'] ?? 30)) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Registration Close Date</label>
                    <input type="date" name="registration_close_date" class="form-control" value="<?= esc(old('registration_close_date', $event['registration_close_date'] ?? '')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="draft" <?= $currentStatus === 'draft' ? 'selected' : '' ?>>Draft</option>
                        <option value="open" <?= $currentStatus === 'open' ? 'selected' : '' ?>>Open</option>
                        <option value="closed" <?= $currentStatus === 'closed' ? 'selected' : '' ?>>Closed</option>
                    </select>
                    <div class="form-text">Gunakan Open apabila event sudah sedia menerima pendaftaran.</div>
                </div>
            </div>
            <div class="d-flex flex-column flex-sm-row gap-2 mt-4">
                <button class="btn btn-primary btn-lg" type="submit">Save Event</button>
                <a class="btn btn-outline-secondary btn-lg" href="<?= site_url('events') ?>">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
