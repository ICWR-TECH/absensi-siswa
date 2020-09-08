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
                    <h3> <strong>Admin</strong> </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ul>
                </div>
                <div class="main__text">
                  <br>
                      <section class="main__box">
                          <h4>Absensi</h4>
                          <br>
                          <?php if ($this->session->flashdata("data_terhapus")): ?>
                            <div class="alert alert--success">
                                <div class="alert__icon">
                                    <span class="fa fa-check-circle"></span>
                                </div>
                                <div class="alert__description">
                                    <p><?php echo $this->session->flashdata("data_terhapus") ?></p>
                                </div>
                            </div>
                            <br><br>
                          <?php endif; ?>
                          <?php if ($this->session->flashdata("hapus_data_semua")): ?>
                            <div class="alert alert--success">
                                <div class="alert__icon">
                                    <span class="fa fa-check-circle"></span>
                                </div>
                                <div class="alert__description">
                                    <p><?php echo $this->session->flashdata("hapus_data_semua") ?></p>
                                </div>
                            </div>
                            <br><br>
                          <?php endif; ?>
                          <table class="table table--gray">
                            <thead>
                              <tr>
                                <th>No absen</th>
                                <th>Nama</th>
                                <th>Waktu</th>
                                <th>Email</th>
                                <th>Setting</th>
                                <th>Screenshots</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach ($row as $var) {
                              ?>
                              <tr>
                                <td><?php echo htmlentities(strip_tags($var->absen)); ?></td>
                                <td><?php echo htmlentities(strip_tags($var->nama))?></td>
                                <td><?php echo htmlentities(strip_tags($var->waktu)) ?></td>
                                <td><?php echo htmlentities(strip_tags($var->email)) ?></td>
                                <td> <a href="<?php echo base_url("dashboard/hapus/".$var->id) ?>" class="btn btn--red text-white">Hapus</a> </td>
                                <td><img src="<?php echo base_url("assets/gambar/").$var->screenshots ?>" alt="..." class="img-thumbnail" style="max-width:100px"></td>
                              </tr>
                              <?php
                              }
                               ?>
                            </tbody>
                          </table>
                      </section>
                </div>
                <br>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn--red" data-toggle="modal" data-target="#exampleModal">
                  Hapus Semua
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus!!!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Apakah anda yakin untuk menghapus data ini?!!!
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn--gray" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url("dashboard/hapus_data") ?>" class="btn btn--red">YAKIN!!!!</a>
                      </div>
                    </div>
                  </div>
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
