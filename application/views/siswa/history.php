<?php $this->load->view('siswa/layouts/header'); ?>
<?php $this->load->view('siswa/layouts/topbar') ?>
<?php $this->load->view('siswa/layouts/sidebar') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo $judul; ?></h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Riwayat Pelanggaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td>Ngeganja diruang kelas</td>
                            </tr>
                            <?php $i++; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('siswa/layouts/footer') ?>