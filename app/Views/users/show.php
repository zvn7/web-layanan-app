<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Users &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('users') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('users') ?>">Users</a></div>
            <div class="breadcrumb-item">Detail User</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Username</td>
                                <td>: <?= $users->username ?></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td>: <?= $users->fullname ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <?= $users->email ?></td>
                            </tr>
                            <tr>
                                <td>Nip</td>
                                <td>: <?= $users->nip ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?= $users->gender ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top" src="<?= base_url('/img/' . $users->foto); ?>" alt="<?= $users->username; ?>">
                    </div>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection() ?>