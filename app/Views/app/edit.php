<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update App &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('app') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Update App</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('app') ?>">App</a></div>
            <div class="breadcrumb-item">Update App</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Data App</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('app/update/' . $app->id_app) ?>" method="POST" autocomplete="off">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label>Nama App</label>
                                <input type="text" class="form-control" name="name_app" value="<?= $app->name_app ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi App</label>
                                <input type="text" class="form-control" name="desc_app" value="<?= $app->desc_app ?>">
                            </div>
                            <div class="form-group">
                                <label>Url App</label>
                                <input type="text" class="form-control" name="url_app" value="<?= $app->url_app ?>">
                            </div>
                            <div class="form-group">
                                <label>Base App</label>
                                <select class="form-control select2" name="base_app">
                                    <option value="Web">Web</option>
                                    <option value="App">App</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>IP Server</label>
                                <input type="text" class="form-control" name="ip_server" value="<?= $app->ip_server ?>">
                            </div>
                            <div class="form-group">
                                <label>Language</label>
                                <input type="text" class="form-control" name="lang" value="<?= $app->lang ?>">
                            </div>
                            <div class="form-group">
                                <label>Language Version</label>
                                <input type="text" class="form-control" name="lang_version" value="<?= $app->lang_version ?>">
                            </div>
                            <div class="form-group">
                                <label>Framework</label>
                                <input type="text" class="form-control" name="framework" value="<?= $app->framework ?>">
                            </div>
                            <div class="form-group">
                                <label>Versi App</label>
                                <input type="text" class="form-control" name="app_version" value="<?= $app->app_version ?>">
                            </div>
                            <div class="form-group">
                                <label>Start Developed</label>
                                <input type="date" class="form-control datemask" name="start_developed" value="<?= $app->start_developed ?>">
                            </div>
                            <div class="form-group">
                                <label>End Developed</label>
                                <input type="date" class="form-control datemask" name="end_developed" value="<?= $app->end_developed ?>">
                            </div>
                            <div class="form-group">
                                <label>live At</label>
                                <input type="date" class="form-control datemask" name="live_at" value="<?= $app->live_at ?>">
                            </div>
                            <div class="form-group">
                                <label>Created At</label>
                                <input type="date" class="form-control datemask" name="created_at" value="<?= $app->created_at ?>">
                            </div>
                            <div class="form-group">
                                <label>Updated At</label>
                                <input type="date" class="form-control datemask" name="updated_at" value="<?= $app->updated_at ?>">
                            </div>
                            <div class="form-group">
                                <label>Created By</label>
                                <input type="text" class="form-control" name="created_by" value="<?= $app->created_by ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" name="note" value="<?= $app->note ?>">
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