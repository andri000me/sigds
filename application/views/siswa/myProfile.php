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
            <div class="card mb-3" style="width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img-top" src="<?= base_url('assets/vendor/stisla/img/avatar/avatar-1.png') ?>" alt="Card image cap">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">Mamang Ujang</h3>
                            <h6 class="card-text">12180308</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('/layouts/footer') ?>