<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$currentStatus = old('status', $participant['status'] ?? 'registered');
$statusOptions = [
    'registered' => 'Registered',
    'approved' => 'Approved',
    'rejected' => 'Rejected',
    'attended' => 'Attended',
    'absent' => 'Absent',
];
?>

<section class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4 bg-primary text-white">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
            <div>
                <p class="text-warning fw-semibold text-uppercase mb-2">Participant Management</p>
                <h1 class="h2 fw-bold mb-2">Edit Participant</h1>
                <p class="mb-0"><?= esc($event['event_name'] ?? 'Aktiviti') ?></p>
            </div>
            <div class="align-self-md-center">
                <a class="btn btn-outline-warning" href="<?= site_url('attendance/' . ($participant['event_id'] ?? '')) ?>">Back to List</a>
            </div>
        </div>
    </div>
</section>

<div class="card shadow-sm border-0 uitm-card">
    <div class="card-body p-4 p-md-5">
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <div class="fw-semibold mb-1">Maklumat peserta tidak berjaya dikemaskini.</div>
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('participants/' . ($participant['id'] ?? '')) ?>">
            <?= csrf_field() ?>
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="full_name" class="form-control form-control-lg" value="<?= esc(old('full_name', $participant['full_name'] ?? '')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Student/Staff ID</label>
                    <input type="text" name="student_staff_id" class="form-control form-control-lg" value="<?= esc(old('student_staff_id', $participant['student_staff_id'] ?? '')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" value="<?= esc(old('email', $participant['email'] ?? '')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control form-control-lg" value="<?= esc(old('phone_number', $participant['phone_number'] ?? '')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Faculty</label>
                    <input type="text" name="faculty" class="form-control form-control-lg" value="<?= esc(old('faculty', $participant['faculty'] ?? '')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Programme</label>
                    <input type="text" name="programme" class="form-control form-control-lg" value="<?= esc(old('programme', $participant['programme'] ?? '')) ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select form-select-lg" required>
                        <?php foreach ($statusOptions as $value => $label): ?>
                            <option value="<?= esc($value) ?>" <?= $currentStatus === $value ? 'selected' : '' ?>><?= esc($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row gap-2 mt-4">
                <button class="btn btn-primary btn-lg" type="submit">Save Participant</button>
                <a class="btn btn-outline-secondary btn-lg" href="<?= site_url('attendance/' . ($participant['event_id'] ?? '')) ?>">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
