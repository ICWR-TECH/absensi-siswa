<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Admin - <?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/css/reza-admin.min.css">
</head>
<body>

  	<!-- navbar -->
  	<nav class="navbar justify-content-start navbar--white">
  	    <!-- sidebar toggler -->
  	    <a class="navbar__sidebar-toggler" href="#"><span class="fa fa-bars"></span></a>
  	    <!-- sidebar toggler -->
  	    <a class="navbar-brand ml-3" href="#">
  				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  				  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  				  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  				</svg> Absensi kelas
  	    </a>
  	</nav>
    <!-- sidebar -->
    <aside class="sidebar">
        <ul class="sidebar__nav">
            <li class="sidebar__item sidebar__item--header">Dashboard</li>
            <li class="sidebar__item">
                <a href="<?php echo base_url("dashboard") ?>"><span class="fa fa-home"></span> Home</a>
            </li>
            <li class="sidebar__item">
                <a href="<?php echo base_url("dashboard/create_form") ?>"><span class="fa fa-file-text"></span> Create form</a>
            </li>
            <li class="sidebar__item">
                <a href="<?php echo base_url() ?>dashboard/user"><span class="fa fa-user"></span> View user</a>
            </li>
            <li class="sidebar__item">
              <a href="<?php echo base_url("dashboard/out") ?>"> <span class="fa fa-sign-out">Log-out</span> </a>
            </li>
        </ul>
    </aside>

    <main class="main main--ml-sidebar-width">
        <div class="row">
            <header class="main__header col-12 mb-2">
                <div class="main__title">
                    <h4>Create form</h4>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create form</li>
                    </ul>
                </div>
                <div class="main__text">
                  <form class="" action="<?php echo base_url('dashboard/create_form') ?>" method="post">
                    <!-- <label for="tutup"> <strong>tutup/buka</strong> </label> -->
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <br>
                    <div class="col-md-12">
                      <div class="main__box">
                        <strong>Buka atau tutup form:</strong>
                        <div class="form-check form-check--not-label">
                          <input type="radio" name="atur" value="buka" class="form form--focus-blue"> <strong>Buka</strong>
                        </div>
                        <div class="form-check form-check--not-label">
                          <input type="radio" name="atur" value="tutup" class="form form--focus-blue"> <strong>Tutup</strong>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                      <div class="main__box">
                        <div class="form-group">
                          <label for="absen"> <strong>Absen:</strong> </label>
                          <input type="number" name="absen" value="" placeholder="Berapa absennya..." min="1" id="absen" class="form-control">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                      <div class="main__box">
                        <label for="berapa_kali"><strong>Bisa di isi be-berapa kali:</strong></label>
                        <div class="form-check form-check--not-label">
                          <input type="radio" name="berapa_kali" value="bisa" class="form form--focus-blue"> <strong>Bisa</strong>
                        </div>
                        <div class="form-check form-check--not-label">
                          <input type="radio" name="berapa_kali" value="tidak" class="form form--focus-blue"> <strong>Tidak</strong>
                        </div>
                      </div>
                    </div>
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Kirim" class="btn btn--blue col-md-12">
                    <br>
                    <?php if ($this->session->flashdata("cek_atur")): ?>
                      <br>
                      <div class="alert alert--danger">
                          <div class="alert__icon">
                              <span class="fa fa-ban"></span>
                          </div>
                          <div class="alert__description">
                              <p><?php echo $this->session->flashdata("cek_atur") ?></p>
                          </div>
                          <div class="alert__action">
                              <a class="alert__close-btn">&times;</a>
                          </div>
                      </div>
                    <?php endif; ?>
                  </form>
                  <br>
                  <?php if ($this->session->flashdata("form_update")): ?>
                    <div class="alert alert--success">
                        <div class="alert__icon">
                            <span class="fa fa-check-circle"></span>
                        </div>
                        <div class="alert__description">
                            <p><?php echo $this->session->flashdata("form_update") ?></p>
                        </div>
                        <div class="alert__action">
                            <a class="alert__close-btn">&times;</a>
                        </div>
                    </div>
                  <?php endif; ?>
                </div>
            </header>
        </div><!-- row -->
    </main>

    <footer class="footer footer--ml-sidebar-width">
        <p class="text-center">Copyright &copy; <strong>R&D ICWR</strong> 2020 All rights reserved. template from Reza-Admin</p>
    </footer>
<script src="<?php echo base_url(); ?>assets/dist/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/reza-admin.min.js"></script>
</body>
</html>
