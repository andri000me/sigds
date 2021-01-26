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
                <div class="card-body">
                    <?php echo $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('konten/sejarah') ?>" method="POST">
                        <div class="form-group">
                            <h3 class="mb-3">Sejarah</h3>
                            <?php
                            foreach ($sejarah as $s) {
                            ?>
                            <input name="id_konten" type="hidden" value="<?= $s->id_konten ?>">
                            <textarea name="sejarah" id="sejarah" cols="30" rows="10">
                            <?php
                                echo $s->isi;
                            }
                            ?>
                            </textarea>
                            <?php echo form_error('sejarah', '<small class="text-danger">', '</small>'); ?>
                            <input class="mt-5 btn btn-primary" type="submit" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('layouts/footer') ?>