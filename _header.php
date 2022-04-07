<!doctype html>
<html lang="th" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?php echo url("css/style.css"); ?>" rel="stylesheet">
    <title><?php echo title." : ".$title ; ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js" integrity="sha512-6gudNVbNM/cVsLUMOb8g2b/RBqtQJ3aDfRFgU+5paeaCTtbYY/Dg00MzZq7r6RvJGI2KKtPBhjkHGTL/iOe21A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="<?php echo url(); ?>"><?php echo title; ?></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
            </ul>
            <div class="d-flex">
              <ul class="nav nav-pills me-auto">
                <li class="nav-item">
                  <a class="nav-link <?php active('index.php');?>" href="<?php echo url("index.php"); ?>">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php active('VRTour.php');?>" href="<?php echo url("VRTour.php"); ?>">VR Tour</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php active('Booking.php');?>" href="<?php echo url("Booking.php"); ?>">วิธีการจองห้องต่าง ๆ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php active('HoB.php');?>" href="<?php echo url("HoB.php"); ?>">ประวัติอาคารวิทยวิภาส</a>
                </li>
                <li class="nav-item">
                    <a class="nav-search <?php active('Searching.php');?>" href="<?php echo url("Searching.php"); ?>"><button class="btn btn-light" type="button"><img src="<?php echo url("Resouces/Icons/Search_Black_24dp_X1.png"); ?>" alt="Search"></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <main class="my-5">
