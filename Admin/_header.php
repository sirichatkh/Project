<!doctype html>
<html lang="th" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="<?php echo url("CSS/style.css"); ?>" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title><?php echo title." : ".$title ; ?></title>
  </head>
  <body class="d-flex flex-column h-100">
    <?php /*if(isset($_SESSION["U_ID"])) { */?>
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
                    <a class="nav-link <?php active('Floorplan_Admin.php');?>" href="<?php echo url("Admin/Floorplan_Admin.php"); ?>">ข้อมูลเเผนผังชั้น </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php active('Event_Admin.php');?>" href="<?php echo url("Admin/Event_Admin.php"); ?>">ข้อมูลกิจกรรม</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php active(['Room_Admin.php','equipment.php']);?>" href="<?php echo url("Admin/Room_Admin.php"); ?>">ข้อมูลห้อง</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php active('Staff_Admin.php');?>" href="<?php echo url("Admin/Staff_Admin.php"); ?>">ข้อมูลบุคลากร</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php active('Gallery_Admin.php');?>" href="<?php echo url("Admin/Gallery_Admin.php"); ?>">เเกลลอรี่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <?php /*}*/ ?>
    <main class="mt-5 py-4">