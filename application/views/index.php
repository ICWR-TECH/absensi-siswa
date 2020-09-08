<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
                <h3>Absensi siswa</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Absen</li>
                </ul>
            </div>
            <div class="main__text">
              <?php if ($this->session->flashdata("absen_diisi")): ?>
                <div class="alert alert--warning">
                    <div class="alert__icon">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="alert__description">
                        <p><?php echo $this->session->flashdata("absen_diisi") ?></p>
                    </div>
                </div>
              <?php endif; ?>
              <?php if ($this->session->flashdata("success_input")): ?>
                <div class="alert alert--success">
                    <div class="alert__icon">
                        <span class="fa fa-check-circle"></span>
                    </div>
                    <div class="alert__description">
                        <p><?php echo $this->session->flashdata("success_input") ?></p>
                    </div>
                </div>
              <?php endif; ?>
							<?php
							if($this->session->userdata("sudah_input")) {
              ?>
              <div class="alert alert--success">
                  <div class="alert__icon">
                      <span class="fa fa-check-circle"></span>
                  </div>
                  <div class="alert__description">
                      <p>Anda sudah input absen.</p>
                  </div>
              </div>
              <?php
							}else{
							?>
							<form class="mt-4" action="<?php echo base_url() ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<label for="nama"><strong>Nama:</strong></label>
								<input type="text" name="nama" value="<?php echo set_value("nama") ?>" class="form-control <?php echo form_error("nama") ? 'is-invalid':'' ?>" id="nama" placeholder="nama lengkap (Gunakan huruf kapital!)">
								<div class="invalid-feedback">
									<?php echo form_error("nama") ?>
								</div>
								<br>
								<label for="absen"><strong>Absen:</strong></label>
                <select class="form-control <?php echo form_error("absen") ? 'is-invalid':'' ?>" name="absen">
                  <option value="">No absen</option>
                  <?php
                  $no=1;
                  $no1=1;
                  for ($i=0; $i < $count_absen; $i++) {
                  ?>
                  <option value="<?php echo $no1++ ?>"><?php echo $no++ ?></option>
                  <?php
                  }
                   ?>
                </select>
								<div class="invalid-feedback">
									<?php echo form_error("absen"); ?>
								</div>
								<br>
								<label for="email"> <strong>Email:</strong> </label>
								<input type="email" name="email" value="<?php echo set_value("email") ?>" class="form-control" id="email" placeholder="Email...">
								<br>
								<label for=""> <strong>ScreenShots</strong> </label>
								<input type="file" name="file" value="" class="form form--focus-blue">
								<br><br>
								<input type="submit" name="submit" value="Submit" class="btn btn-primary">
							</form>
              <br><br>
							<?php } ?>
            </div>
        </header>
    </div><!-- row -->
</main>
