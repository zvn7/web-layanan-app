<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Pemohon &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('pemohon') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Pemohon</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('pemohon') ?>">Pemohon</a></div>
            <div class="breadcrumb-item">Detail Pemohon</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td>Nama</td>
                                        <td>: <?= $pemohon->name ?></td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>: <?= $pemohon->category ?></td>
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