<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>App Trash&mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('app') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>App List - Trash</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('groups') ?>">App</a></div>
            <div class="breadcrumb-item">Trash</div>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data App - Trash</h4>
                        <div class="card-header-action">
                            <a href="<?= site_url('app/restore') ?>" class="btn btn-info">Restore All</i></a>
                            <form action="<?= site_url('app/delete2') ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                <?= csrf_field(); ?>
                                <button class="btn btn-danger btn-sm">Delete All Permanently</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover table-md" id="myTable">
                                <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Nama App</th>
                                    <th>Deskripsi App</th>
                                    <th>Url App</th>
                                    <th>Start Developed</th>
                                    <th>End Developed</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($app as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value->name_app ?></td>
                                        <td><?= $value->desc_app ?></td>
                                        <td><?= $value->url_app ?></td>
                                        <td><?= date('d/m/y', strtotime($value->start_developed)) ?></td>
                                        <td><?= date('d/m/y', strtotime($value->end_developed)) ?></td>
                                        <td>
                                            <a href="<?= site_url('app/restore/' . $value->id_app) ?>" class="btn btn-info btn-sm">Restore</a>
                                            <form action="<?= site_url('app/delete2/' . $value->id_app) ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                <?= csrf_field(); ?>
                                                <button class="btn btn-danger btn-sm">Delete Permanently</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>