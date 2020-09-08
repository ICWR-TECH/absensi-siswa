<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Siswa - <?php echo $title; ?></title>
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
  	            <a href="<?php echo base_url() ?>"><span class="fa fa-home"></span> Home</a>
  	        </li>
  	        <li class="sidebar__item">
  	            <a href="<?php echo base_url("cek"); ?>"><span class="fa fa-group"></span> Cek absen</a>
  	        </li>
  	    </ul>
  	</aside>
