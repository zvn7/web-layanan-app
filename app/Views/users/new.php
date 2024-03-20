<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Add User &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('users') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Group</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('users') ?>">Users</a></div>
            <div class="breadcrumb-item">Create User</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data User</h4>
                    </div>
                    <div class="card-body">
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= site_url('users') ?>" method="Post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" name="fullname">
                            </div>
                            <div class="form-group">
                                <label>Nip</label>
                                <input type="text" class="form-control" name="nip">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" name="gender" placeholder="L / P">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto" onchange="previewImg()">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('foto'); ?>
                                    </div>
                                    <label class="custom-file-label input-group input-group-outline" for="foto" name="foto">Pilih Foto</label>
                                </div>
                                <div class="mt-3">
                                    <img src="/img/user.png" class="img-thumbnail img-preview" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Created By</label>
                                <input type="text" class="form-control" name="created_by">
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" name="note">
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