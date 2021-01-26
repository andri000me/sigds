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
                    <form action="<?= base_url('konten/visimisi') ?>" method="POST">
                        <div class="form-group">
                            <h3 class="mb-3">Visi</h3>
                            <?php
                            foreach ($visi as $v) {
                            ?>
                            <input name="id_konten_visi" type="hidden" value="<?= $v->id_konten ?>">
                            <textarea name="visi" id="visi" cols="30" rows="10">
                            <?php
                                echo $v->isi;
                            }
                            ?>
                            </textarea>
                            <?php echo form_error('visi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <h3 class="mb-3">Misi</h3>
                            <?php
                            foreach ($misi as $m) {
                            ?>
                            <input name="id_konten_misi" type="hidden" value="<?= $m->id_konten ?>">
                            <textarea name="misi" id="misi" cols="30" rows="10">
                            <?php
                                echo $m->isi;
                            }
                            ?>
                            </textarea>
                            <?php echo form_error('misi', '<small class="text-danger">', '</small>'); ?>
                            <input class="mt-5 btn btn-primary" type="submit" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('layouts/footer') ?>