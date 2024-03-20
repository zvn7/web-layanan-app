<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Permohonan App &mdash; Web Layanan App</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('permohonanapp') ?>" class="btn"><i class="	fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail App</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= site_url() ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= site_url('permohonanapp') ?>">Permohonan App</a></div>
            <div class="breadcrumb-item">Detail Permohonan App</div>
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
                                        <td>Pemohon</td>
                                        <td>: <?= $permohonanapp->name ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama App</td>
                                        <td>: <?= $permohonanapp->name_app ?></td>
                                    </tr>
                                    <tr>
                                        <td>Requested At</td>
                                        <td>: <?= $permohonanapp->requested_at ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama CP</td>
                                        <td>: <?= $permohonanapp->cp_name ?></td>
                                    </tr>
                                    <tr>
                                        <td>No CP</td>
                                        <td>: <?= $permohonanapp->cp_number ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surat Permohonan</td>
                                        <td>: <a target="_blank" title="<?= $permohonanapp->application_letter_file ?>  " href="<?= base_url(); ?>/file/<?= $permohonanapp->application_letter_file ?>"><?= $permohonanapp->application_letter_file ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Deadline</td>
                                        <td>: <?= $permohonanapp->deadline ?></td>
                                    </tr>
                                    <tr>
                                        <td>Progress</td>
                                        <td>: <?= $permohonanapp->progress ?></td>
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