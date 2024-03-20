<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Add Group &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('groups') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Group</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('groups') ?>">Groups</a></div>
            <div class="breadcrumb-item">Create Group</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Group</h4>
                    </div>
                    <div class="card-body">
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= site_url('groups') ?>" method="Post" autocomplete="off">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama Group</label>
                                <input type="text" class="form-control <?= $validation->hasError('name_group') ? 'is-invalid' : null ?>" name="name_group" value="<?=old('name_group')?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('name_group') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Group</label>
                                <input type="text" class="form-control" name="desc_group">
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