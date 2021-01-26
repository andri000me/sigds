<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/topbar') ?>
<?php $this->load->view('siswa/layouts/sidebar') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo $judul; ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Riwayat Pelanggaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-striped">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Pelanggaran</th>
                                        <th>Point</th>
                                        <th>Tanggal</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Tidak mengguankan dasi</td>
                                        <td class="text-center text-danger">-10</td>
                                        <td>4 Agustus 2019</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('layouts/footer') ?>