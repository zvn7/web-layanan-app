<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>App &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('app') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail App</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('app') ?>">App</a></div>
            <div class="breadcrumb-item">Detail App</div>
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
                                        <td>Nama App</td>
                                        <td>: <?= $app->name_app ?></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi App</td>
                                        <td>: <?= $app->desc_app ?></td>
                                    </tr>
                                    <tr>
                                        <td>URL App</td>
                                        <td>: <?= $app->url_app ?></td>
                                    </tr>
                                    <tr>
                                        <td>Base App</td>
                                        <td>: <?= $app->base_app ?></td>
                                    </tr>
                                    <tr>
                                        <td>IP Server</td>
                                        <td>: <?= $app->ip_server ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bahasa</td>
                                        <td>: <?= $app->lang ?></td>
                                    </tr>
                                    <tr>
                                        <td>Versi Bahasa</td>
                                        <td>: <?= $app->lang_version ?></td>
                                    </tr>
                                    <tr>
                                        <td>Framework</td>
                                        <td>: <?= $app->framework ?></td>
                                    </tr>
                                    <tr>
                                        <td>Versi App</td>
                                        <td>: <?= $app->app_version ?></td>
                                    </tr>
                                    <tr>
                                        <td>Start Developed</td>
                                        <td>: <?= $app->start_developed ?></td>
                                    </tr>
                                    <tr>
                                        <td>End Developed</td>
                                        <td>: <?= $app->end_developed ?></td>
                                    </tr>
                                    <tr>
                                        <td>Live At</td>
                                        <td>: <?= $app->live_at ?></td>
                                    </tr>
                                    <tr>
                                        <td>Created At</td>
                                        <td>: <?= $app->created_at ?></td>
                                    </tr>
                                    <tr>
                                        <td>Updated At</td>
                                        <td>: <?= $app->updated_at ?></td>
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