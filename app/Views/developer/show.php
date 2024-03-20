<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>App &mdash; Web Layanan app</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('developer') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail App</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('developer') ?>">Developer</a></div>
            <div class="breadcrumb-item">Detail Developer</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Nama Developer</td>
                                <td>: <?= $developer->fullname ?></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>: <?= $developer->nip ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>: <?= $developer->gender ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <?= $developer->email ?></td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td>: <?= $developer->no_hp ?></td>
                            </tr>
                            <tr>
                                <td>Note</td>
                                <td>: <?= $developer->note ?></td>
                            </tr>
                            <tr>
                                <td>Created By</td>
                                <td>: <?= $developer->created_by ?></td>
                            </tr>
                            <tr>
                                <td>Created At</td>
                                <td>: <?= $developer->created_at ?></td>
                            </tr>
                            <tr>
                                <td>Updated At</td>
                                <td>: <?= $developer->updated_at ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top" src="<?= base_url('/img/' . $developer->foto); ?>" alt="<?= $developer->fullname; ?>">
                    </div>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection() ?>