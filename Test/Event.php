<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witthayawiphat : กิจกรรม</title>
    <link rel="stylesheet" href="CSS/Event.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Witthayawiphat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">หน้าหลัก</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="VRTour.php">VR Tour</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Booking.php">วิธีการจองห้องต่าง ๆ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Event.php">กิจกรรม</a>
                </li>
                <li class="nav-item">
                    <form action="Searching.php" method="post">
                    <a class="nav-search" href="Search.php"><button class="btn btn-light" type="submit"><img src="Resouces/Icons/Search_Black_24dp_X1.png" alt="Search"></button></a>
                </li>
            </ul>
        </nav>
    </header>
    <article>
        <h1>กิจกรรม</h1>
        <div class="Form_E">
            <form method="post" action="">  
                <label for="seacrh">ค้นหา</label>
                <input type="text" class="form-control" name="search" id="search" placeholder="ชื่อกิจกรรม.."/>
                <button type="submit" value="ค้นหา">ค้นหา</button> 
            </form>
        </div>

    <?php
        $conn=mysqli_connect("localhost","root","","witthayawiphat");

        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $sql = "SELECT * FROM event";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){

            $E_Date = $row['E_Date'];
            $E_Time = $row['E_Time'];
            $E_Name = $row['E_Name'];
            $E_Description = $row['E_Description'];
            
        ?>
            <table class='table'>
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>เวลา</th>
                        <th>ชื่อกิจกรรม</th>
                        <th>รายละเอียดกิจกรรม</th>
                    <tr>
                </thead>
                    <tr>
                        <td><?php echo $row['E_Date']; ?></td> 
                        <td><?php echo $row['E_Time']; ?></td> 
                        <td><?php echo $row['E_Name']; ?></td>
                        <td><?php echo $row['E_Description']; ?></td>   
                        <td><a href='Event_Func/Edit_E_Ad.php?edit=<?php echo $row['E_ID']; ?>'><button type='button' class='btn btn-outline-warning'>เเก้ไข</button></a></td>
                        <td><a href='Event_Func/Del_E_Ad.php?del=<?php echo $row['E_ID']; ?>'><button type='button' class='btn btn-outline-danger'>ลบ</button></a></td>
                    </tr>
            </table>
        <?php
        }
        ?> 
    </article>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>
</html>