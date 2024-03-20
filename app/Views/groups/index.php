<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Groups &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Groups List</h1>
        <div class="section-header-button">
            <a href="<?= site_url('groups/new') ?>" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <!-- <div class="breadcrumb-item"><a href="#">App</a></div> -->
            <div class="breadcrumb-item">Groups</div>
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
                        <h4>Data Groups</h4>
                        <div class="card-header-action">
                            <a href="<?= site_url('groups/trash/') ?>" class="btn btn-danger"><i class="fa fa-trash-alt"> Trash</i></a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped table-hover table-md" id="myTable">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Nama Groups</th>
                                    <th>Deskripsi Groups</th>
                                    <th width="80">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($groups as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value->name_group ?></td>
                                        <td><?= $value->desc_group ?></td>
                                        <td>
                                            <a href="<?= site_url('groups/edit/' . $value->id_group) ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="<?= site_url('groups/delete/' . $value->id_group) ?>" method="POST" class="d-inline" id="del-<?=$value->id_group?>">
                                                <?= csrf_field(); ?>
                                                <button class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda Yakin?" data-confirm-yes="submitDel(<?=$value->id_group?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <a href="" class="btn btn-info btn-sm">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
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
</section>
<?= $this->endSection() ?>