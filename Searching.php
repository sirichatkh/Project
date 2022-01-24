<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witthayawiphat : ค้นหา</title>
    <link rel="stylesheet" href="CSS/Searching.css">
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
                    <form action="Searching.php" method="post">
                    <a class="nav-search" href="Search.php"><button class="btn btn-light" type="submit"><img src="Resouces/Icons/Search_Black_24dp_X1.png" alt="Search"></button></a>
                </li>
            </ul>
        </nav>
    </header>
    <article>
        <h1>ค้นหา</h1>
        <div class="Form_Cate">
            <label for="category">หมวดที่ต้องการค้นหา</label>
            <select class="form-select" aria-label="Default select example">
                <option value="ห้อง" selected>ห้อง</option>
                <option value="บุคลากร">บุคลากร</option>
                <option value="กิจกรรม">กิจกรรม</option>
            </select>
        </div>
       
        <div class="Form_S">
            <form method="post" action="">  
                <label for="seacrh">ค้นหา</label>
                <input type="text" class="form-control" name="search" id="search" placeholder="ค้นหา.."/>
                <button type="submit" value="ค้นหา">ค้นหา</button> 
            </form>
        </div>

        <div class="room_type">
            <label for="room_type">ประเภทห้อง</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                <label class="form-check-label" for="flexSwitchCheckDefault">ห้องเรียน</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">ห้องเเล๊ป</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">ห้องประชุม</label>
            </div>
        </div>
        
        <div class="floor">
            <label for="floor">ชั้นที่</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDefault" checked>
                <label class="form-check-label" for="flexSwitchCheckCheckedDefault">ชั้นที่ 1</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDefault">
                <label class="form-check-label" for="flexSwitchCheckCheckedDefault">ชั้นที่ 2</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDefault">
                <label class="form-check-label" for="flexSwitchCheckCheckedDefault">ชั้นที่ 3</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDefault">
                <label class="form-check-label" for="flexSwitchCheckCheckedDefault">ชั้นที่ 4</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDefault">
                <label class="form-check-label" for="flexSwitchCheckCheckedDefault">ชั้นที่ 5</label>
            </div>
        </div>

    <?php
        $db_host = '127.0.0.1';
        $db_user = 'root';
        $db_password = '';
        $db_db = 'witthayawiphat';
        $db_port = 3306;

        $conn = new mysqli(
            $db_host,
            $db_user,
            $db_password,
            $db_db,
            $db_port
        );
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        //$sql = "SELECT R_Name , R_Capacity FROM room WHERE R_Name LIKE '%".$_POST["R_Name"]."%' OR R_Name LIKE '%".$_POST["search"]."%' ";
        $sql = "SELECT R_Name , R_Capacity FROM room WHERE R_Name LIKE '%".$_POST["R_Name"]."%'";
        $result = $conn->query($sql);

        //$sql2 = "SELECT F_Image , F_Floor FROM floorplan WHERE F_Floor LIKE '%".$_POST["search"]."%' ";
        $sql2 = "SELECT P_Name FROM professor WHERE P_Name LIKE '%".$_POST["P_Name"]."%' ";
        $result2 = $conn->query($sql2);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

        $R_Name = $row['R_Name'];
        $R_Capacity = $row['R_Capacity'];
        $P_Name = $row['P_Name'];

        echo "
        <table class='table'>
            <thead>
                <tr>
                    <th>ชื่อห้อง</th>
                    <th>จุได้</th>
                    <th>ผู้รับชอบห้องโดย</th>
                <tr>
            </thead>
                <tr>
                    <td>$R_Name</td> 
                    <td>$R_Capacity</td> 
                    <td>$S_Name</td>
                </tr>
        </table>
        ";}

        } if ($result2->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

        //$F_Image = $row['F_Image'];
        $F_Floor = $row['F_Floor'];

        echo "
        <div class='row row-cols-1 row-cols-md-3 g-4'>
            <div class='col'>
                <div class='card h-100'>
                    <img src='Resouces/Images/Computer_Lab.jpg' class='card-img-top' alt='Image' width='300px' height='300px'>
                    <div class='card-body'>
                        <h5 class='card-title'>ชั้นที่ $F_Floor </h5> 
                    </div>
                </div>
            </div>
        </div>
        ";}
        } else {
        echo "0 results";
        }
        $conn->close();
        ?>
         
        <?php
        // $conn=mysqli_connect("localhost","root","","witthayawiphat");

        // if (mysqli_connect_errno()){
        //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
        //     die();
        // }

        // $output = '';

        // if(isset($_POST['search'])) {
        //     $searchq = $_POST['search'];
        //     $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        //     $query = mysql_query("SELECT * FROM rooms WHERE R_Number LIKE '%$searchq%' OR R_Name LIKE '%$searchq%'") or die ("ไม่สามารถค้นหาได้");
        //     $count = mysql_num_rows($query);
        //     if ($count == 0) {
        //         $output = 'ไม่มีข้อมูลที่ต้องการ!';
        //     } else {
        //         while ($row = mysql_fetch_array($query)) {
        //             $R_Image = $row['R_Image'];
        //             $R_Number = $row['R_Number'];
        //             $R_Name = $row['R_Name'];
        //             $R_Description = $row['R_Description'];
        //             $R_Capacity = $row['R_Capacity'];

        //             $output .= '<div>'.$Num.' '.$Name.'</div>';
        //         ;}
        //     }
        // }
        // ?>   
        <!-- <?php 
        //print("$output");?>  -->
        
        <!--
        <nav aria-label="...">
            <ul class="pagination">
                <li <?php //if($pageno <= 1){ echo "class='page-item disabled'"; } ?>>
                    <a class="page-link" href="<?php //if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">ย้อนกลับ</a>
                <li <?php //if($pageno >= $total_pages){ echo "class='page-item disabled'"; } ?>>
                    <a class="page-link" href="<?php //if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">ถัดไป</a>
                </li>
            </ul>
        </nav>
        -->
        
    </article>

</body>
</html>