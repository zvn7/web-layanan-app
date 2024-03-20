<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>App &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, <?= user()->username; ?>!</h2>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                    <img class="rounded-circle profile-widget-picture" src="<?= base_url('/img/' . user()->foto); ?>" alt="<?= user()->fullname; ?>">
                    </div>
                    <div class="profile-widget-description">
                        <div class="card-body p-1">
                            <div class="list-group">
                                <table>
                                    <tr>
                                        <td>Username </td>
                                        <td>: <?= user()->username; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Fullname </td>
                                        <td>: <?= user()->fullname; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Nip </td>
                                        <td>: <?= user()->nip; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Email </td>
                                        <td>: <?= user()->email; ?> </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection() ?>