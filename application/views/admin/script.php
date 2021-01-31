<script type="text/javascript">
    $(document).ready(function() {

        // datatables
        $('#mytable').DataTable({
            "serverSide": true,
            "processing": true,
            "order": [],
            "ajax": {
                url: "<?php echo base_url("admin/json") ?>",
                type: 'post',
                dataType: 'json'
            },
            "oLanguage": {
                sSearch: "Cari :",
                sLengthMenu: "Menampilkan _MENU_ data",
                sInfo: "Menampilkan _START_ - _END_ dari total _TOTAL_ data",
                sInfoEmpty: "Tidak ada data",
                sProcessing: "Tungguin ya...",
                oPaginate: {
                    sPrevious: "<<",
                    sNext: ">>"
                }
            },
            "language": {
                emptyTable: "-- TIDAK ADA DATA --"
            },
            "initComplete": function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            "columns": [{
                    data: "id_admin",
                    width: "5px",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: "image",
                    render: function(data) {
                        if (data == 'default.jpg') {

                            return '<img class="rounded" src="<?= base_url("assets/img/") ?>' + data + '"height="75">'
                        } else {
                            return '<img class="rounded" src="<?= base_url("assets/img/admin/") ?>' + data + '"height="75">'

                        }
                    },
                    orderable: false
                },
                {
                    data: "name"
                },
                {
                    data: "username",

                },
                {
                    data: "aksi",
                    class: "text-center",
                    orderable: false,
                    width: "130px"
                }
            ]
        });
    });
    // end datatable


    // modal tambah admin
    $('.btnTambahAdmin').on('click', function() {
        $('#ModalTambahAdmin').modal('show');
    });

    // clear value & error pada modal tambah admin
    $("#ModalTambahAdmin").on('hidden.bs.modal', function() {
        clearError();
        $('.valueNama').val('');
        $('.valueUsername').val('');
    });
    // end modal tambah admin

    // handle proses tambah admin
    $("#tambahAdmin").submit(function(e) {
        e.preventDefault();
        let dataAdmin = $("#tambahAdmin").serialize();
        $.ajax({
            url: "<?php echo base_url("admin/insertAdmin") ?>",
            type: 'post',
            dataType: 'json',
            data: dataAdmin,
            success: function(result) {

                // if insert was successfull
                if (result === 1) {
                    $('#ModalTambahAdmin').modal('hide');
                    reload_table();
                    document.getElementById("tambahAdmin").reset(); //clear input field
                }
                //validation if error
                else if (result.error) {
                    $("#nama_error").html(result.nama);
                    $("#username_error").html(result.username);
                }
            }
        });
    });

    // image preview before upload
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#edit_imgPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#edit_image").change(function() {
        readURL(this);
    });
    // end handle proses tambah admin

    // modal edit admin
    $('#mytable').on('click', '.edit_admin', function() {
        let id = $(this).data('id');
        $.ajax({
            url: "<?php echo base_url("admin/getDataById") ?>",
            type: 'post',
            dataType: 'json',
            data: {
                "id": id
            },
            success: function(result) {
                $("#edit_id").html(result.id_admin);
                $("#edit_id_admin").val(result.id_admin);
                $("#edit_nama").val(result.name);
                $("#edit_username").val(result.username);
                if (result.image == 'default.jpg') {

                    $("#edit_imgPreview").attr("src", '<?= base_url("assets/img/") ?>' + result.image);
                } else {
                    $("#edit_imgPreview").attr("src", '<?= base_url("assets/img/admin/") ?>' + result.image);
                }
            }

        });

        // agar tidak keluar modal ketika backdrop diklik
        $('#ModalEditAdmin').modal({
            backdrop: 'static',
            keyboard: false
        })
    });

    // handle edit admin
    // $("#editAdmin").submit(function(e) {
    //     e.preventDefault();

    //     let id = $('#edit_id_admin').val();
    //     let nama = $('#edit_nama').val();
    //     let username = $('#edit_username').val();
    //     // delete data
    //     $.ajax({
    //         url: "<?php echo base_url("admin/editAdmin") ?>",
    //         type: 'post',
    //         dataType: 'json',
    //         data: {
    //             "id": id,
    //             "nama": nama,
    //             "username": username
    //         },
    //         success: function(result) {
    //             $('#ModalEditAdmin').modal('hide');
    //             reload_table();
    //             $('#konfirmasiEdit').modal('show');
    //             setTimeout(function() {
    //                 $("#konfirmasiEdit").modal('hide');
    //             }, 1500);
    //         }
    //     });
    // });

    // ketika modal edit telah tertutup
    // $("#ModalEditAdmin").on('hidden.bs.modal', function() {
    //     setTimeout(function() {
    //         reload_table();

    //     }, 2000);
    // });
    // prototype upload with loader
    $("#editAdmin").submit(function(e) {
        e.preventDefault();

        let frm = document.getElementById('editAdmin');
        let dataku = new FormData(frm);
        $.ajax({
            processData: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                //Upload progress
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        var percent = Math.ceil(percentComplete * 100);

                        //Do something with upload progress

                        $('.editBtn').addClass("disabled");
                        $('.editBtn').html(percent + "% ...");
                    }
                }, false);

                return xhr;
            },
            type: 'POST',
            url: "<?php echo base_url("admin/editAdmin") ?>",
            data: dataku,
            dataType: "json",
            contentType: false,
            success: function(result) {
                $('.editBtn').removeClass("disabled");
                $('.editBtn').html('Simpan');
                clearError();
                log(result);

                if (result) {
                    $('#ModalEditAdmin').modal('hide');
                    clearError();
                    reload_table();
                    return;
                }

                // jika berhasil
                if (result.edit == 1 && result.error_image == 0) {
                    $('#ModalEditAdmin').modal('hide');
                    clearError();
                    reload_table();
                } else if (result.error_image) {
                    $('#edit_nama_error').html(result.nama);
                    $('#edit_username_error').html(result.username);
                    $('#image_error').html(result.error_image);
                } else {
                    $('#image_error').html(result.error_image);
                    clearError();
                    reload_table();
                }
            }
        });
    });
    // penutup handle edit admin
    // penutup modal edit admin


    // modal hapus admin
    $('#mytable').on('click', '.hapus_admin', function() {
        let id = $(this).data('id');
        $.ajax({
            url: "<?php echo base_url("admin/getDataById") ?>",
            type: 'post',
            dataType: 'json',
            data: {
                "id": id
            },
            success: function(result) {
                $("#hapus_id").html(result.id_admin);
                $("#id_admin").val(result.id_admin);
                $("#hapus_nama").val(result.name);
                $("#hapus_username").val(result.username);
                if (result.image == 'default.jpg') {
                    $("#hapus_image").attr("src", '<?= base_url("assets/img/") ?>' + result.image);
                } else {
                    $("#hapus_image").attr("src", '<?= base_url("assets/img/admin/") ?>' + result.image);
                }
            }

        });
        $('#ModalHapusAdmin').modal('show');
    });

    // handle proses hapus admin
    $("#hapusAdmin").submit(function(e) {
        e.preventDefault();
        // tangkap id dari input hidden
        let id = $('#id_admin').val();
        // delete data
        $.ajax({
            url: "<?php echo base_url("admin/deleteAdmin") ?>",
            type: 'post',
            dataType: 'json',
            data: {
                "id": id
            },
            success: function(result) {
                $('#ModalHapusAdmin').modal('hide');
                reload_table();
                $('#konfirmasi').modal('show');
                setTimeout(function() {
                    $("#konfirmasi").modal('hide');
                }, 1500);
            }
        });
    });
    // end handle proses hapus admin
    // end modal hapus admin


    // reload the datatable
    function reload_table() {
        $('#mytable').DataTable().ajax.reload(null, false);
    }

    function clearError() {
        $('#edit_nama_error').html('');
        $('#edit_username_error').html('');
        $('#image_error').html('');
        $('#nama_error').html('');
        $('#username_error').html('');

    }

    // biar gak ngetik console.log lagi, capek
    function log(myLog) {
        console.log(myLog);
    }
</script>