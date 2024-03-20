<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Add Developing &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('developing') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Developing</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('developing') ?>">Developing</a></div>
            <div class="breadcrumb-item">Create Developing</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Developing</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('developing/create') ?>" method="Post" autocomplete="off">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama App</label>
                                <select name="id_app" class="form-control select2" required>
                                    <?php foreach ($app as $key => $value) : ?>
                                        <option value="<?= $value->id_app ?>"><?= $value->name_app ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Developer</label>
                                <select name="id_developer" class="form-control select2" required>
                                    <?php foreach ($developer as $key => $value) : ?>
                                        <option value="<?= $value->id_developer ?>"><?= $value->fullname ?></option>
                                    <?php endforeach; ?>
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