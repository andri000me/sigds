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
            <div class="card mb-3" style="width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <!-- <img class="card-img-top" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="Card image cap"> -->
                        <img class="card-img-top" src="<?= base_url('assets/vendor/stisla/img/avatar/avatar-1.png') ?>" alt="Card image cap">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">Mamang Ujang</h3>
                            <h6 class="card-text">12180308</h6>
                            <!-- <h3 class="card-title"><?= ucwords($user['name']); ?></h3>
                            <h6 class="card-text"><?= $user['email']; ?></h6> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-header">
                    <h3>Halo, Nama user</h3>
                </div>
                <div class="card-body">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis assumenda numquam impedit
                    cumque deleniti explicabo mollitia adipisci necessitatibus voluptatum repellat maiores, rerum
                    quibusdam ullam consectetur repudiandae corrupti amet perferendis officia!
                </div>
            </div> -->
        </div>
    </section>
</div>
<?php $this->load->view('siswa/layouts/footer') ?>