<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Add Permohonan App &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('permohonanapp') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Permohonan App</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('permohonanapp') ?>">Permohonan App</a></div>
            <div class="breadcrumb-item">Create Permohonan App</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data Permohonan App</h4>
                    </div>
                    <div class="card-body">
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= site_url('permohonanapp/create') ?>" method="Post" autocomplete="off" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Pemohon</label>
                                <select name="id_pemohon" class="form-control select2">
                                    <?php foreach ($pemohon as $key => $value) : ?>
                                        <option value="<?= $value->id_pemohon ?>"> <?= $value->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama App</label>
                                <select name="id_app" class="form-control select2">
                                    <?php foreach ($app as $key => $value) : ?>
                                        <option value="<?= $value->id_app ?>"><?= $value->name_app ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Requested At</label>
                                <input type="date" class="form-control" name="requested_at">
                            </div>
                            <div class="form-group">
                                <label>Nama CP</label>
                                <input type="text" class="form-control" name="cp_name">
                            </div>
                            <div class="form-group">
                                <label>No CP</label>
                                <input type="text" class="form-control" name="cp_number">
                            </div>
                            <div class="form-group">
                                <label>File Permohonan</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('application_letter_file')) ? 'is-invalid' : '' ?>" id="application_letter_file" name="application_letter_file">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('application_letter_file'); ?>
                                    </div>
                                    <label class="custom-file-label">Pilih file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deadline</label>
                                <input type="date" class="form-control" name="deadline">
                            </div>
                            <div class="form-group">
                                <label>Progress</label>
                                <select class="form-control select2" name="progress">
                                    <option value="Requested">Requested</option>
                                    <option value="Developed">Developed</option>
                                    <option value="Finished">Finished</option>
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