<?php
$userdata = $this->session->userdata();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" href="<?=base_url()?>/assets/images/icon.ico" type="image/ico">
    <title>Bank Darah RS. Boromeus</title>
    <link href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>" rel="stylesheet" >
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('/assets/css/dashboard.css') ?>" rel="stylesheet" >
  <script src="<?php echo base_url('/assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
  </head>
  <body>
  
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
      
      
      <?php echo isset($userdata['nama_user']) ? $userdata['nama_user'] : '' ?></a>
      
      <?php
      if( isset($userdata['nik']) ){
        echo '<ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <a class="nav-link" href="'.base_url('/dashboard/logout').'">Logout</a>
          </li>
        </ul>';
      }
      ?>
    </nav>
<br>
<br>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <?php if( isset($userdata['role']) AND $userdata['role'] == 'admin' ){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/') ?>">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/admin/user') ?>">
              <span data-feather="user"></span>
              User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/admin/stok') ?>">
              <span data-feather="archive"></span>
              Stok
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/admin/stok/grafik') ?>">
              <span data-feather="bar-chart"></span>
              Grafik Stok
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/admin/pesanan') ?>">
              <span data-feather="clipboard"></span>
              Pesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/admin/riwayat_bulanan') ?>">
              <span data-feather="clipboard"></span>
              Riwayat Bulanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/admin/penerimaan_darah') ?>">
              <span data-feather="clipboard"></span>
              Penerimaan Darah
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/reaksi') ?>">
              <span data-feather="list"></span>
              Reaksi Transfusi
            </a>
          </li>
          <?php } else if( isset($userdata['role']) AND $userdata['role'] == 'user'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/') ?>">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/pesanan') ?>">
              <span data-feather="clipboard"></span>
              Pesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/batal') ?>">
              <span data-feather="clipboard"></span>
              Pembatalan Pesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/pesanan/riwayat') ?>">
              <span data-feather="list"></span>
              Riwayat Pesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/reaksi') ?>">
              <span data-feather="list"></span>
              Reaksi Transfusi
            </a>
          </li>
          
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather=""></span>
              <img src="assets/images/loader.gif" class="img-fluid" alt="RS BORROMEUS"> 
            </a>
            
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      