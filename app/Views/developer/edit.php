<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Developer &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('developer') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Groups</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('developer') ?>">Developer</a></div>
            <div class="breadcrumb-item">Update Developer</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Data Developer</h4>
                    </div>
                    <div class="card-body">
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= site_url('developer/' . $developer->id_developer) ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="fotoLama" value="<?= $developer->foto ?>">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="fullname" value="<?= $developer->fullname ?>" required>
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip" value="<?= $developer->nip ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" name="gender" value="<?= $developer->gender ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $developer->email ?>">
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" class="form-control" name="no_hp" value="<?= $developer->no_hp ?>">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div class="">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto'); ?>
                                        </div>
                                        <label class="custom-file-label" for="foto" name="foto"><?= $developer->foto ?></label>
                                    </div>
                                </div>
                                <div class="">
                                    <img src="/img/<?= $developer->foto ?>" class="img-thumbnail img-preview" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" name="note" value="<?= $developer->note ?>">
                            </div>
                            <div class="form-group">
                                <label>Dibuat Oleh</label>
                                <input type="text" class="form-control" name="created_by" value="<?= $developer->created_by ?>">
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