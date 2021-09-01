<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none" style="background:#2064ca!important">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="images/icon/logo.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
        <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?= base_url('siswa/')?>">
                        <i class="fas fa-chart-bar"></i>Beranda</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/Pesan')?>">
                        <i class="fas fa-table"></i>Pesan</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/jadwalMapel/1')?>">
                        <i class="far fa-check-square"></i>Jadwal Mata pelajaran</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/tugas')?>">
                        <i class="fas fa-calendar-alt"></i>Tugas</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/materi')?>">
                        <i class="fas fa-map-marker-alt"></i>Materi</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/filterPengajar')?>">
                        <i class="fas fa-map-marker-alt"></i>Filter pengajar</a>
                </li>   
                <li>
                    <a href="<?= base_url('siswa/filterSiswa')?>">
                        <i class="fas fa-map-marker-alt"></i>Filter Siswa</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/absen')?>">
                        <i class="fas fa-map-marker-alt"></i>Presensi</a>
                </li>                 
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo" style="background:#2064ca!important">
        <a href="#">
            <img src="images/icon/logo.png" alt="" />
            <h3 class="text-white mb-4 ml-4">E - Learning</h3>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <div class="image">
                <?php if ($this->session->userdata('foto') != null) { ?>
                    <img class="shadow rounded-circle" src="<?= base_url('assets/images/user/'.$this->session->userdata('foto'))?>" alt="<?php echo $this->session->userdata('nama');?>" />
                <?php }else{ ?>
                    <img class="shadow rounded-circle" src="<?= base_url('assets/images/icon/user.png')?>" alt="<?php echo $this->session->userdata('nama');?>" />
                <?php } ?>
            </div>
            <h4 class="text-center mt-2"><?= $this->session->userdata('nama');?></h4>
            <h5 class="text-center mt-2">Siswa</h5>
            <div class="d-flex justify-content-center">
                <a class="btn-sm btn-success shadow text-center my-2 text-white">Online</a>
            </div>
            <ul class="list-unstyled navbar__list">
                <li class="active">
                    <a href="<?= base_url('siswa/')?>">
                        <i class="fas fa-chart-bar"></i>Beranda</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/Pesan')?>">
                        <i class="fas fa-table"></i>Pesan</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/jadwalMapel/1')?>">
                        <i class="far fa-check-square"></i>Jadwal Mata pelajaran</a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/tugas')?>">
                        <i class="fas fa-calendar-alt"></i>Tugas <span class="badge badge-light"><?= count($count_tugas) ?></span></a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/materi')?>">
                        <i class="fas fa-map-marker-alt"></i>Materi <span class="badge badge-light"><?= count($count_materi) ?></span></a>
                </li>
                <li>
                    <a href="<?= base_url('siswa/filterPengajar')?>">
                        <i class="fas fa-map-marker-alt"></i>Filter pengajar</a>
                </li>   
                <li>
                    <a href="<?= base_url('siswa/filterSiswa')?>">
                        <i class="fas fa-map-marker-alt"></i>Filter Siswa</a>
                </li> 
                <li>
                    <a href="<?= base_url('siswa/ujian')?>">
                        <i class="fas fa-map-marker-alt"></i>Ujian Online <span class="badge badge-light"><?= count($count_ujian) ?></span></a>
                </li>   
                <li>
                    <a href="<?= base_url('siswa/absen')?>">
                        <i class="fas fa-users"></i>Presensi</a>
                </li>                
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop" style="background:#2064ca!important">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <h3 class="text-white">SMK NEGERI JATIPURO</h3>
                    <form class="form-header" action="" method="POST">
                        
                    </form>
                    <div class="header-button">
                        <div class="noti-wrap">
                        
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <?php if ($this->session->userdata('foto') != null) { ?>
                                        <img src="<?= base_url('assets/images/user/'.$this->session->userdata('foto'))?>" alt="<?php echo $this->session->userdata('nama');?>" />
                                    <?php }else{ ?>
                                        <img src="<?= base_url('assets/images/icon/user.png')?>" alt="<?php echo $this->session->userdata('nama');?>" />
                                    <?php } ?>
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn text-white" href="#" ><?= $this->session->userdata('nama')?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <?php if ($this->session->userdata('foto') != null) { ?>
                                                    <img src="<?= base_url('assets/images/user/'.$this->session->userdata('foto'))?>" alt="<?php echo $this->session->userdata('nama');?>" />
                                                <?php }else{ ?>
                                                    <img src="<?= base_url('assets/images/icon/user.png')?>" alt="<?php echo $this->session->userdata('nama');?>" />
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?= $this->session->userdata('nama')?></a>
                                            </h5>
                                            <span class="email"><?= $this->session->userdata('username')?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?= base_url('siswa/profile')?>">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?= base_url('user/logout') ?>">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->
