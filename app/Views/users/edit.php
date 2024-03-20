<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Users &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('users') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('users') ?>">Users</a></div>
            <div class="breadcrumb-item">Update Users</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Data Users</h4>
                    </div>
                    <div class="card-body">
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= site_url('users/' . $users->id_user) ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="fotoLama" value="<?= $users->foto ?>">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $users->username ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $users->email ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="fullname" value="<?= $users->fullname ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nip</label>
                                <input type="text" class="form-control" name="nip" value="<?= $users->nip ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" name="gender" value="<?= $users->gender ?>">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div class="">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('foto'); ?>
                                        </div>
                                        <label class="custom-file-label" for="foto" name="foto"><?= $users->foto ?></label>
                                    </div>
                                </div>
                                <div class="">
                                    <img src="/img/<?= $users->foto ?>" class="img-thumbnail img-preview" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Created By</label>
                                <input type="text" class="form-control" name="created_by" value="<?= $users->created_by ?>">
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" name="note" value="<?= $users->note ?>">
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