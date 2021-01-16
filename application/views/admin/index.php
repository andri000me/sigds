<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/topbar') ?>
<?php $this->load->view('layouts/sidebar') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo $judul; ?></h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h3>Halo</h3>
                </div>
                <div class="card-body">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis assumenda numquam impedit
                    cumque deleniti explicabo mollitia adipisci necessitatibus voluptatum repellat maiores, rerum
                    quibusdam ullam consectetur repudiandae corrupti amet perferendis officia!
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('layouts/footer') ?>