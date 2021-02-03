<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('admin') ?>">SIGDS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('admin') ?>">SIGDS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= $this->uri->segment(1) == 'admin' ? ' active' : '' ?>">
                <a href="<?= base_url('admin') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data Master</li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-users"></i><span>Guru</span></a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-users"></i><span>Siswa</span></a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-users"></i><span>Petugas</span></a>
            </li>
            <li>
                <a href="#" class="nav-link"><i class="fas fa-list"></i><span>Pelanggaran</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i><span>Keterangan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Pending</a></li>
                    <li><a class="nav-link" href="#">Confirm</a></li>
                </ul>
            </li>
            <li class="menu-header">Content</li>
            <li
                <?= $this->uri->segment(1) == 'konten' && $this->uri->segment(2) == 'peraturan' ? 'class=active' : '' ?>>
                <a href="<?php echo base_url('konten/peraturan'); ?>" class="nav-link">
                    <i class="fas fa-cog"></i><span>Peraturan</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'konten' && $this->uri->segment(2) == 'sejarah' ? 'class=active' : '' ?>>
                <a href="<?= base_url('konten/sejarah'); ?>" class="nav-link"><i class="fas fa-list"></i><span>Sejarah</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'konten' && $this->uri->segment(2) == 'visimisi' ? 'class=active' : '' ?>>
                <a href="<?= base_url('konten/visimisi'); ?>" class="nav-link"><i class="fas fa-list"></i><span>Visi Misi</span></a>
            </li>
        </ul>
    </aside>
</div>