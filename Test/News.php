<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witthayawiphat | ข่าวสาร</title>
    <link rel="stylesheet" href="CSS/News.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="Home.php">Witthayawiphat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="Home.php">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="VRTour.php">VR Tour</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Booking.php">วิธีการจองห้องต่าง ๆ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="News.php">ข่าวสาร</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">อื่น ๆ</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://th.kku.ac.th/">Khon Kaen University</a></li>
                        <li><a class="dropdown-item" href="https://www.cs.kku.ac.th/index.php/th/">Computer Science</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <article>
        <?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 2;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $conn=mysqli_connect("localhost","root","","witthayawiphat");

        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $total_pages_sql = "SELECT COUNT(*) FROM card";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM card LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
        
            $Link = $row['Link'];
            $Image = $row['Image'];
            $Title = $row['Title'];
            $Description = $row['Description'];
            $DateTime = $row['Date&Time'];

            echo "
            <div class='row row-cols-1 row-cols-md-3 g-4'>
                <div class='col'>
                    <div class='card h-100'>
                        <a href='$Link' class='text-decoration-none'>
                            <img src='$Image' class='card-img-top' alt='Image'>
                            <div class='card-body'>
                                <h5 class='card-title'>$Title</h5>                                    
                                <p class='card-text'>$Description</p>
                            </div>
                            <div class='card-footer'>
                                <small class='text-muted'>$DateTime</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            ";} 
        ?> 
        
        <nav aria-label="...">
            <ul class="pagination">
                <li <?php if($pageno <= 1){ echo "class='page-item disabled'"; } ?>>
                    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">ย้อนกลับ</a>
                <li <?php if($pageno >= $total_pages){ echo "class='page-item disabled'"; } ?>>
                    <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">ถัดไป</a>
                </li>
            </ul>
        </nav>
        
    </article>
    <footer class="grid py-5 mt-5 bg-light">
        <div class="container fluid">
            <div class="col-6 lg-3 mb-3">
                <ul class="list-unstyled small text-muted">
                    <li class="mb-2">Contact :</li>
                    <li class="mb-2">Khon Kaen University 123 Moo 16 Mittraphap Rd., Nai-Muang, Muang District, Khon Kaen 40002,Thailand. Tel : (+66) 4300 9700 Fax: (+66) 4320 2216 email : info@kku.ac.th</li>
                    <li class="mb-2">Copyright © 2021 Khon Kaen University, All rights reserved.</li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

</body>
</html>