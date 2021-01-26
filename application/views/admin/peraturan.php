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
                    <form action="<?= base_url('konten/peraturan') ?>" method="POST">
                        <div class="form-group">
                            <h3 class="mb-3">Peraturan</h3>
                            <?php
                            foreach ($peraturan as $p) {
                            ?>
                            <input name="id_konten" type="hidden" value="<?= $p->id_konten ?>">
                            <textarea name="peraturan" id="peraturan" cols="30" rows="10">
                            <?php
                                echo $p->isi;
                            }
                            ?>
                            </textarea>
                            <?php echo form_error('peraturan', '<small class="text-danger">', '</small>'); ?>
                            <input class="mt-5 btn btn-primary" type="submit" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('layouts/footer') ?>