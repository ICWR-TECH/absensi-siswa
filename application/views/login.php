<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag wajib -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login admin</title>

    <!-- Pertama Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/bootstrap.min.css">
    <!-- Kemudian Font awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- dan Reza Admin CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/dist/css/reza-admin.min.css">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url() ?>assets/dist/img/Reza_Admin.ico">
</head>
<body>

    <div class="container-fluid">
        <div class="login">
            <div class="login__content mt-3">
                <div class="login__head">
                  <h4 class="mt-3">Login admin</h4>
                </div>
                <div class="login__form">
                    <form class="" method="post" action="<?php echo base_url("admin") ?>">
                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <div class="input-group mt-0">
                            <input type="text" name="username" placeholder="Username ..." class="form form--focus-blue">
                        </div>
                        <div class="input-group">
                            <div class="input-group__prepend">
                                <div class="input-group__text"><span class="fa fa-lock"></span></div>
                            </div>
                            <input type="password" name="password" placeholder="Password ..." class="form form--focus-blue">
                        </div>
                        <div class="login__form-action mt-3">
                            <p href="" class="btn btn--link"></p>
                            <button type="submit" class="btn btn--blue mb-2 mb-sm-0">Login</button>
                        </div>
                    </form>
                    <?php if ($this->session->flashdata("gagal_login")): ?>
                      <br>
                      <div class="alert alert--warning">
                          <div class="alert__icon">
                              <span class="fa fa-warning"></span>
                          </div>
                          <div class="alert__description">
                              <p><?php echo $this->session->flashdata("gagal_login") ?></p>
                          </div>
                          <div class="alert__action">
                              <a class="alert__close-btn">&times;</a>
                          </div>
                      </div>
                    <?php endif; ?>
                </div>
        </div><!-- login -->
    </div>

</body>
</html>
