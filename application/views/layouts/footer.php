<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; <?= date('Y') ?>. Sistem Informasi Gerakan Disiplin Sekolah
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.nicescroll.min.js') ?>"></script>
<script src="<?= base_url('assets/js/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/stisla/js/stisla.js') ?>"></script>

<!-- JS Libraries -->

<!-- Template JS File -->
<script src="<?= base_url('assets/vendor/stisla/js/scripts.js') ?>"></script>
<script src="<?= base_url('assets/vendor/stisla/js/custom.js') ?>"></script>

<!-- Page Specific JS File -->

<!-- Datatable -->
<script src="<?= base_url('assets/js/datatables.min.js') ?>"></script>

<!-- CK Editor -->
<script src="<?= base_url('assets/vendor/ckeditor/ckeditor.js') ?>"></script>
<script>
let peraturan = document.getElementById("peraturan");
CKEDITOR.replace(peraturan, {
    language: 'en-gb'
});
let sejarah = document.getElementById("sejarah");
CKEDITOR.replace(sejarah, {
    language: 'en-gb'
});
let visi = document.getElementById("visi");
CKEDITOR.replace(visi, {
    language: 'en-gb'
});
let misi = document.getElementById("misi");
CKEDITOR.replace(misi, {
    language: 'en-gb'
});
CKEDITOR.config.allowedContent = true;
</script>
</body>

</html>