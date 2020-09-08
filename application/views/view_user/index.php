<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Lihat user</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/dist/css/reza-admin.min.css">
</head>
<body>
  <!-- navbar -->
  <nav class="navbar justify-content-start navbar--white">
      <a class="navbar__sidebar-toggler" href="#"><span class="fa fa-bars"></span></a>
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
              <a href="<?php echo base_url() ?>dashboard"><span class="fa fa-home"></span> Home</a>
          </li>
          <li class="sidebar__item">
              <a href="<?php echo base_url() ?>dashboard/create_form"><span class="fa fa-file-text"></span> Create form</a>
          </li>
          <li class="sidebar__item">
              <a href="<?php echo base_url() ?>dashboard/user"><span class="fa fa-user"></span> View user</a>
          </li>
          <li class="sidebar__item">
            <a href="<?php echo base_url() ?>dashboard/out"> <span class="fa fa-sign-out">Log-out</span> </a>
          </li>
      </ul>
  </aside>
  <!-- main -->
  <main class="main main--ml-sidebar-width">
      <div class="row">
          <header class="main__header col-12 mb-2">
              <div class="main__title">
                  <h4>View user</h4>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">User</li>
                  </ul>
              </div>
              <div class="main__text">
                    <section class="main__box">
                        <h3>User</h3>
                        <hr>
                        <!-- button show modal info -->
                        <a href="#" class="btn btn--blue" id="show-modal-info">Create user</a>
                        <br><br>
                        <!-- modal info -->
                        <div class="modal modal--info" id="modal-info">
                            <div class="modal__content">
                                <div class="modal__header">
                                    <div class="modal__icon">
                                        <span class="fa fa-user"></span>
                                    </div>
                                    <div class="modal__title">
                                        <h5>Create user</h5>
                                    </div>
                                </div>
                                <div class="modal__body">
                                  <form class="" action="<?php echo base_url("dashboard/user") ?>" method="post">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                                    <div class="input-group">
                                        <div class="input-group__prepend">
                                            <a href="#" class="btn btn--blue"><span class="fa fa-user"></span></a>
                                        </div>
                                        <input type="text" name="username" placeholder="Username..." class="form form--focus-blue">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group__prepend">
                                            <a href="#" class="btn btn--blue"><span class="fa fa-lock"></span></a>
                                        </div>
                                        <input type="text" name="password" placeholder="Password..." class="form form--focus-blue">
                                    </div>
                                </div>
                                <div class="modal__footer">
                                    <div class="justify-content-right">
                                      <a href="#" class="btn btn--gray" id="close-modal">Cancel</a>
                                      <input type="submit" name="submit" value="Create" class="btn btn--blue">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table--gray">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no=1;
                              foreach ($row as $var) {
                              $str=strlen($var->password);
                              ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlentities($var->username) ?></td>
                                <td>
                                <?php
                                for($i=1;$i<=$str;$i++){
                                  echo "*";
                                }
                                ?>
                                </td>
                                <td> <a href="<?php echo base_url("dashboard/hapus_user/".$var->id) ?>" class="btn btn--red text-white"> <span class="fa fa-trash"></span> Delete</a> </td>
                              </tr>
                              <?php
                              }
                               ?>
                            </tbody>
                        </table>
                    </section>
                    <?php if ($this->session->flashdata("sukses_tambah_user")): ?>
                      <br><br>
                      <div class="alert alert--success">
                          <div class="alert__icon">
                              <span class="fa fa-check-circle"></span>
                          </div>
                          <div class="alert__description">
                              <p><?php echo $this->session->flashdata("sukses_tambah_user") ?></p>
                          </div>
                          <div class="alert__action">
                              <a class="alert__close-btn">&times;</a>
                          </div>
                      </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata("suksesHapusUser")): ?>
                      <br><br>
                      <div class="alert alert--success">
                          <div class="alert__icon">
                              <span class="fa fa-check-circle"></span>
                          </div>
                          <div class="alert__description">
                              <p><?php echo $this->session->flashdata("suksesHapusUser") ?></p>
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
  <script type="text/javascript">
    const btnShowModal = document.querySelector("a#show-modal-info");
    const modal = document.querySelector("div#modal-info");
    const closeModal = modal.querySelector("a#close-modal");
    btnShowModal.addEventListener('click', e => {
        // hilangkan fungsi default dari tag a
        e.preventDefault();

        // tampilkan modal
        modal.classList.add("modal--fade-in");

        /* tambahkan class .stop-scrolling pada tag <body> untuk menghilangkan scroll halaman,
        agar halaman tidak bisa di scroll */
        document.body.classList.add("stop-scrolling");
    });

    closeModal.addEventListener('click', e => {
        // hilangkan fungsi default dari tag a
        e.preventDefault();

        // sembunyikan/tutup modal
        modal.classList.remove("modal--fade-in");

        /* hapus class .stop-scrolling pada tag <body> agar
        halaman bisa di scroll kembali */
        document.body.classList.remove("stop-scrolling");
    });
  </script>
  <script src="<?php echo base_url() ?>assets/dist/js/jquery-3.5.1.slim.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/dist/js/reza-admin.min.js"></script>
</body>
</html>
