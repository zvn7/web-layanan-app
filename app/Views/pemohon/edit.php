<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Pemohon &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('pemohon') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Update App</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('pemohon') ?>">Pemohon</a></div>
            <div class="breadcrumb-item">Update Pemohon</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Data Pemohon</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('pemohon/' . $pemohon->id_pemohon) ?>" method="POST" autocomplete="off">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="<?= $pemohon->name ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" name="category">
                                    <option value="OPD">OPD</option>
                                    <option value="Kecamatan">Kecamatan</option>
                                    <option value="Desa">Desa</option>
                                    <option value="Sekolah">Sekolah</option>
                                    <option value="Personal">Personal</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"> Save</i></button>
                                <button type="reset" class="btn btn-secondary">Reset</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>