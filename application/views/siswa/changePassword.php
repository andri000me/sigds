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
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header"><h4>Ubah Password</h4></div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="password">Password Lama</label>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="1" required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="password1">Password Baru</label>
                                    <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1" tabindex="2" required>
                                    <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password2">Ulang Password</label>
                                    <input id="password2" type="password" class="form-control" name="password2" tabindex="2" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('layouts/footer') ?>