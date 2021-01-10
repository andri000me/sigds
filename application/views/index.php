<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo.svg') ?>" type="image/x-icon">

    <title>SIGDS</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
        <div class="container">
            <img src="<?= base_url('assets/img/logo.svg') ?>" class="logo">
            <a class="navbar-brand" href="#">SIGDS</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Peraturan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sejarah</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="btn-login nav-link dropdown-toggle btn btn-sm btn-primary text-white rounded" href="#"
                            id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Siswa</a>
                            <a class="dropdown-item" href="#">Guru</a>
                            <a class="dropdown-item" href="#">Admin</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <section id="home">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="hero-judul">Sistem Informasi Gerakan Disiplin Sekolah</h4>
                    <p>Patuhi aturan sekolah untuk menjadikan lingkungan sekolah yang tertib</p>
                    <a href="" class="btn btn-primary btn-hero">Baca Peraturan</a>
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('assets/img/hero.svg') ?>" class="hero-image">
                </div>
            </div>
        </section>

        <section id="tentang">
            <h4 class="text-center mb-5">Tentang Aplikasi</h4>
            <div class="row justify-content-center text-justify">
                <div class="col-md-10">
                    <p>
                        Aplikasi ini di buat untuk mengatur para siswa agar bisa mematuhi peraturan yang sudah ada pada
                        sekolah.
                    </p>
                    <p>
                        Membuat sekolah menjadi lebih tertib dan taat aturan. Sehingga tanggung jawab sebagai siswa
                        tertanam
                        pada masing-masing siswa.
                    </p>
                </div>
            </div>
            <h4 class="text-center mt-5 mb-5">Fitur</h4>
            <div class="row justify-content-center text-center">
                <div class="col-md-4 mb-5">
                    <img src="<?= base_url('assets/img/icon/icon input.svg') ?>" alt="">
                    <p class="icon-judul">Input Pelanggaran</p>
                    <p class="deskripsi">Siswa yang melanggar peraturan akan di input</p>
                </div>
                <div class="col-md-4 mb-5">
                    <img src="<?= base_url('assets/img/icon/icon data.svg') ?>" alt="">
                    <p class="icon-judul">Melihat Data Pelanggar</p>
                    <p class="deskripsi">Siswa dapat melihat pelanggaran yang telah diperbuat.</p>
                </div>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/icon/icon sp.svg') ?>" alt="">
                    <p class="icon-judul">Surat Peringatan</p>
                    <p class="deskripsi">Surat peringatan akan dibuat jika siswa telah mecapai point 0.</p>
                </div>
                <div class="col-md-5 mt-5">
                    <img src="<?= base_url('assets/img/icon/icon laporan.svg') ?>" alt="">
                    <p class="icon-judul">Membuat Laporan Pelanggaran</p>
                    <p class="deskripsi">Membuat laporan siswa yang melanggar aturan</p>
                </div>
                <div class="col-md-5 mt-5">
                    <img src="<?= base_url('assets/img/icon/icon point.svg') ?>" alt="">
                    <p class="icon-judul">Sistem Point</p>
                    <p class="deskripsi">Siswa mendapatkan point awal 100. Point berkurang jika siswa melanggar aturan
                    </p>
                </div>
            </div>
        </section>

        <section id="peraturan">
            <h4 class="text-center mb-5">Peraturan</h4>
            <div class="row justify-content-center text-justify">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum pariatur perspiciatis delectus
                        error, harum dolores dolorem mollitia! Sed similique quo placeat, quae reprehenderit quas ea
                        cumque, enim nulla fuga alias?
                        <br><br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae rem in animi non, odit ducimus
                        hic temporibus recusandae aspernatur deleniti.
                    </p>
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum pariatur perspiciatis delectus
                        error, harum dolores dolorem mollitia! Sed similique quo placeat, quae reprehenderit quas ea
                        cumque, enim nulla fuga alias?
                        <br><br>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi praesentium expedita placeat
                        ratione repudiandae et, voluptatem officia aliquid id corporis.
                    </p>
                </div>
            </div>
        </section>

        <section id="sejarah">
            <h4 class="text-center mb-5">Sejarah</h4>
            <div class="row justify-content-center text-justify">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum pariatur perspiciatis delectus
                        error, harum dolores dolorem mollitia! Sed similique quo placeat, quae reprehenderit quas ea
                        cumque, enim nulla fuga alias?
                        <br><br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae rem in animi non, odit ducimus
                        hic temporibus recusandae aspernatur deleniti.
                    </p>
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum pariatur perspiciatis delectus
                        error, harum dolores dolorem mollitia! Sed similique quo placeat, quae reprehenderit quas ea
                        cumque, enim nulla fuga alias?
                        <br><br>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi praesentium expedita placeat
                        ratione repudiandae et, voluptatem officia aliquid id corporis.
                    </p>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 mb-3">
                    <h4>
                        <img src="<?= base_url('assets/img/logo.svg') ?>" class="footer-logo">
                        Sistem Informasi Gerakan Disiplin Sekolah
                    </h4>
                </div>
                <div class="col-md-8 mb-5">
                    <p>Jl. Jendral Sudirman Nomor 04, Kota Bogor</p>
                    <p>sigds@smkn1indonesia.co.id</p>
                    <img src="<?= base_url('assets/img/icon/facebook.svg') ?>" alt="">
                    <img src="<?= base_url('assets/img/icon/twitter.svg') ?>" alt="">
                    <img src="<?= base_url('assets/img/icon/instagram.svg') ?>" alt="">

                </div>
                <div class="col-md-8">
                    <p>Copyright © <?= date('Y') ?>. SIGDS. Design by Aldi Tegar Prakoso. All rights reserved. </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>