<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<!-- main -->
<main class="main main--ml-sidebar-width">
    <div class="row">
        <header class="main__header col-12 mb-2">
            <div class="main__title">
                <h4>Cek abnsensi</h4>
                <?php
                if ($this->session->userdata("admin")) {
                  echo "<a class='btn btn-primary' href='".base_url("admin/cek")."'><a>";
                }
                 ?>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Cek absensi</li>
                </ul>
            </div>
            <div class="main__text">
                  <section class="main__box">
                      <h5>Absensi kelas</h5>
                      <hr>
                      <pre>
                      <table class="table table--gray">
                          <thead>
                              <tr>
                                  <th width="50px">No absen</th>
                                  <th>Nama</th>
                                  <th width="70px">Waktu</th>
                                  <th width="100px">Kehadiran</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no=1;
                            foreach ($row as $var) {
                            // $exp=explode(" ",$var->nama);
                            ?>
                            <tr>
                              <td><?php echo htmlentities(strip_tags($var->absen)) ?></td>
                              <td><?php echo htmlentities(strip_tags($var->nama)) ?></td>
                              <td><?php echo $var->waktu ?></td>
                              <td><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/></svg></td>
                            </tr>
                            <?php
                            }
                             ?>
                          </tbody>
                      </table>
                      </pre>
                  </section>
            </div>
        </header>
    </div><!-- row -->
</main>
