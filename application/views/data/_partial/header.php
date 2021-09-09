<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Justisia Institute">
  <link rel="shortcut icon" sizes="196x196" href="<?= base_url();?>assets/iconhead.png">
  <style type="text/css">
    .carousel-item{
    max-height: 670px;
    }
  </style>
  <title>Justisia Institute</title>

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet"> -->
  
  <link href="<?= base_url() ?>/assets/home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Bootstrap CSS File -->
  <link href="<?= base_url() ?>assets/home/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= base_url() ?>assets/home/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/lib/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= base_url() ?>assets/home/css/style.css" rel="stylesheet">

  <!-- datatable -->

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <!-- //datatable -->


  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header" class="header-fixed">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="<?= base_url() ?>assets/home/#main">C<span>o</span>nf</a></h1>-->
        <a href="<?= base_url() ?>home" class="scrollto"><img src="<?= base_url() ?>assets/logo-prc.png" alt="" title=""></a>        
        <!-- <a href="<?= base_url() ?>home" class="scrollto"><img src="<?= base_url() ?>assets/home/img/logooo.png" alt="" title=""></a> -->
      </div>

            <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li<?php if ($menu == "home") { echo " class=\"menu-active\""; } ?>><a href="<?= base_url() ?>home/#intro"><i class="fa fa-home"></i> Home</a></li>
          <li<?php if ($menu == "data") { echo " class=\"menu-active\""; } ?>><a href="<?= base_url() ?>home/datajatim/2019/1/1"><i class="fa fa-chart-bar"></i> Data</a></li>
          <li<?php if ($menu == "peta") { echo " class=\"menu-active\""; } ?>><a href="<?= base_url() ?>home/map"><i class="far fa-map"></i> Peta </a></li>
          <li<?php if ($menu == "berita") { echo " class=\"menu-active\""; } ?>><a href="<?= base_url() ?>home/berita"><i class="fa fa-newspaper"></i> Berita</a></li>
          <li<?php if ($menu == "tentangkami") { echo " class=\"menu-active\""; } ?>><a href="<?= base_url() ?>home/tentangkami"><i class="fa fa-info-circle"></i> Tentang Kami</a></li>
          <li<?php if ($menu == "hubungiKami") { echo " class=\"menu-active\""; } ?>><a href="<?= base_url() ?>home/hubungikami"><i class="fa fa-phone"></i> Hubungi Kami</a></li>
          <li class="buy-tickets"><a href="<?= base_url() ?>/auth"><i class="fa fa-user"></i> Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->

    </div>
  </header><!-- #header -->
