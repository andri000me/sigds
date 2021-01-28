<?php $this->load->view('auth/layouts/header'); ?>

<body>
    <div id="app">
        <section class="section">
        <div class="container mt-5">
            <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
            </div>
                <div class="card card-primary">
                    <div class="card-header"><h4>Login Admin</h4></div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('auth/logAdmin') ?>" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="text">Username</label>
                                <input id="text" type="text" class="form-control" name="username" tabindex="1" value="<?= set_value('username'); ?>" required autofocus>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Login
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

    <?php $this->load->view('auth/layouts/footer'); ?>