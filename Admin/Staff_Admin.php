<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witthayawiphat : ข้อมูลบุคลากร</title>
    <link rel="stylesheet" href="CSS/Staff_Admin.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="Floorplan_Admin.php">Witthayawiphat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="Floorplan_Admin.php">ข้อมูลเเผงผังชั้น</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Event_Admin.php">ข้อมูลกิจกรรม</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Room_Admin.php">ข้อมูลห้อง</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Staff_Admin.php">ข้อมูลบุคลากร</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Gallery_Admin.php">ข้อมูลเเกลลอรี่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="SignIn.php">ออกจากระบบ</a>
                </li>
            </ul>
        </nav>
    </header>
    <article>
        <div class='Add_btn'>
            <a href='Staff_Func/Insert_S_Ad.php'><button type='button' class='btn btn-outline-primary'>เพิ่มข้อมูลบุคลากร</button></a>
        </div>
        <?php
        $conn=mysqli_connect("localhost","root","","witthayawiphat");

        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $sql = "SELECT * FROM staff";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){

            $S_Image = $row['S_Image'];
            $S_Name = $row['S_Name'];
            $S_Position = $row['S_Position'];
            $S_Skill = $row['S_Skill'];
            $S_Email = $row['S_Email'];

        ?>
            <table class='table'>
                <thead>
                    <tr>
                        <th>รูปภาพบุคลากร</th>
                        <th>ชื่อบุคลากร</th>
                        <th>ตำเเหน่ง</th>
                        <th>ความเชี่ยวชาญ</th>
                        <th>อีเมล</th>
                    <tr>
                </thead>
                    <tr>
                        <td><?php echo $row['S_Image']; ?></td>
                        <td><?php echo $row['S_Name']; ?></td> 
                        <td><?php echo $row['S_Position']; ?></td> 
                        <td><?php echo $row['S_Skill']; ?></td> 
                        <td><?php echo $row['S_Email']; ?></td> 
                        <td><a href='Staff_Func/Edit_S_Ad.php?edit=<?php echo $row['S_ID']; ?>'><button type='button' class='btn btn-outline-warning'>เเก้ไข</button></a></td>
                        <td><a href='Staff_Func/Del_S_Ad.php?del=<?php echo $row['S_ID']; ?>'><button type='button' class='btn btn-outline-danger'>ลบ</button></a></td>
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