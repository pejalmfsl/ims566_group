<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="card border-0 shadow-sm mb-4 overflow-hidden">
    <div class="card-body p-4 p-md-5 bg-primary text-white">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <p class="text-warning fw-semibold text-uppercase mb-2">Library Event Registration System</p>
                <h1 class="display-6 fw-bold mb-2">Dashboard Pentadbiran</h1>
                <p class="lead mb-0">Pantau aktiviti, pendaftaran peserta dan acara akan datang dalam satu paparan.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="d-flex flex-column flex-sm-row flex-lg-column gap-2 justify-content-lg-end">
                    <a href="<?= site_url('events/create') ?>" class="btn btn-warning btn-lg">Tambah Event</a>
                    <a href="<?= site_url('participants') ?>" class="btn btn-outline-warning btn-lg">Lihat Peserta</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 uitm-card h-100">
            <div class="card-body">
                <div class="text-muted fw-semibold">Total Events</div>
                <div class="display-6 fw-bold text-primary"><?= esc($totalEvents ?? 0) ?></div>
                <div class="small text-muted">Jumlah aktiviti direkodkan</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 uitm-card h-100">
            <div class="card-body">
                <div class="text-muted fw-semibold">Total Participants</div>
                <div class="display-6 fw-bold text-primary"><?= esc($totalParticipants ?? 0) ?></div>
                <div class="small text-muted">Jumlah pendaftaran peserta</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 uitm-card h-100">
            <div class="card-body">
                <div class="text-muted fw-semibold">Upcoming Events</div>
                <div class="display-6 fw-bold text-primary"><?= esc(count($upcomingEvents ?? [])) ?></div>
                <div class="small text-muted">Acara terdekat untuk dipantau</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-warning d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">Upcoming Events</span>
                <a href="<?= site_url('events') ?>" class="btn btn-sm btn-outline-warning">View All</a>
            </div>
            <div class="card-body">
                <?php foreach (($upcomingEvents ?? []) as $event): ?>
                    <div class="d-flex gap-3 border-bottom py-3">
                        <div class="text-center">
                            <div class="badge text-bg-warning mb-1"><?= esc(date('M', strtotime($event['event_date']))) ?></div>
                            <div class="fw-bold text-primary"><?= esc(date('d', strtotime($event['event_date']))) ?></div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="fw-semibold"><?= esc($event['event_name']) ?></div>
                            <div class="small text-muted"><?= esc($event['event_date']) ?> at <?= esc($event['event_time']) ?></div>
                            <?php if (! empty($event['venue'])): ?>
                                <div class="small text-muted"><?= esc($event['venue']) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($upcomingEvents ?? [])): ?>
                    <div class="text-center text-muted py-4">No upcoming events.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-warning d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">Recent Registrations</span>
                <a href="<?= site_url('participants') ?>" class="btn btn-sm btn-outline-warning">View All</a>
            </div>
            <div class="card-body">
                <?php foreach (($recentRegistrations ?? []) as $registration): ?>
                    <div class="border-bottom py-3">
                        <div class="fw-semibold"><?= esc($registration['full_name']) ?></div>
                        <div class="small text-muted"><?= esc($registration['email']) ?></div>
                        <?php if (! empty($registration['status'])): ?>
                            <span class="badge text-bg-light border mt-2"><?= esc($registration['status']) ?></span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($recentRegistrations ?? [])): ?>
                    <div class="text-center text-muted py-4">No registrations yet.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
