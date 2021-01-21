<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/topbar') ?>
<?php $this->load->view('layouts/sidebar') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <!-- <div class="section-header">
            <h1><?php echo $judul; ?></h1>
        </div> -->

        <div class="section-body">
            <div class="card">
                <!-- <div class="card-header">
                    <h3>ADMIN</h3>
                </div> -->
                <div class="card-body">
                    <!-- TABEL -->
                    <button class="btn btn-md btn-success btnTambahAdmin">Tambah <i class="fas fa-plus"></i></button>
                    <div class="row">
                        <div class="table-responsive">
                            <div class="col-12 mt-3">
                                <table class="table table-bordered" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Modal Tambah Admin-->
<form id="tambahAdmin" method="post">
    <div class="modal fade" id="ModalTambahAdmin" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control">
                            <span id="nama_error" class="text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control">
                            <span id="username_error" class="text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Penutup Modal Tambah Admin-->

<!-- css loader -->
<!-- Modal Edit Admin -->
<form id="editAdmin" method="post">
    <div class="modal fade" id="ModalEditAdmin" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit ID <span class="text-primary" id="edit_id"></span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id_admin" name="id" class="form-control" required>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" id="edit_nama" name="edit_nama" class="form-control">
                            <span id="edit_nama_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" id="edit_username" name="edit_username" class="form-control" readonly>
                            <span id="edit_username_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Ganti Image (Opsional)</label>
                        <div class="col-sm-9">
                            <input type="file" name="edit_image" id="edit_image" class="form-control">
                            <span id="image_error" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Image Preview</label>
                        <div class="col-sm-9">
                            <img class="rounded" src="#" height="100" id="edit_imgPreview">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" href="javascript:void(0);" onclick="reload_table()" class="btn btn-primary editBtn">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Penutup Modal Edit Admin -->



<!-- Modal Hapus Admin -->
<form id="hapusAdmin" method="post">
    <div class="modal fade" id="ModalHapusAdmin" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Hapus ID <span class="text-danger" id="hapus_id"></span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_admin" name="id" class="form-control" required>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" id="hapus_nama" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" id="hapus_username" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <img class="rounded" src="#" height="100" id="hapus_image">
                        </div>
                    </div>
                    <strong>Anda yakin mau menghapus record ini ?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" href="javascript:void(0);" onclick="reload_table()" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Penutup Hapus Admin -->



<!-- Konfirmasi Edit -->
<div class="modal fade" id="konfirmasiEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <strong>Data Berhasil Diubah</strong>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Konfirmasi Edit -->



<!-- Konfirmasi Hapus -->
<div class="modal fade" id="konfirmasi" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <strong>Data Berhasil Dihapus</strong>
            </div>
        </div>
    </div>
</div>
<!-- Penutup Konfirmasi Hapus -->



<?php $this->load->view('layouts/footer') ?>

<!-- Javascript -->
<?php $this->load->view('admin/script') ?>