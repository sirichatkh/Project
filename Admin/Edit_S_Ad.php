<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witthayawiphat : เเก้ไขข้อมูลบุคลากร</title>
    <link rel="stylesheet" href="CSS/Edit_S_Ad.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <a class="navbar-brand" href="../Floorplan_Admin.php">Witthayawiphat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-search" href="../Staff_Admin.php"><button class="btn btn-light" type="button"><img src="Resouces/Icons/Clear_Black_24dp_X1.png" alt="Clear"></a>
                </li>
            </ul>
        </nav>
    </header>
    <article>
    <?php
        $conn=mysqli_connect("localhost","root","","witthayawiphat");

        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        $sql = "SELECT * FROM staff WHERE S_ID = '$POST["S_ID"]' ";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){

            $S_Image = $row['S_Image'];
            $S_Name = $row['S_Name']; 
            $S_Position = $row['S_Position']; 
            $S_Skill = $row['S_Skill']; 
            $S_Email = $row['S_Email']; 
    ?>       
        <div class="Form_Edit">
            <h1>เเก้ไขข้อมูลบุคลากร</h1>
            <form action="Func_Update" method="post">
            <!-- <div class="mb-3">
                <label for="formFile" class="form-label">ไฟล์ภาพ</label>
                <input class="form-control" type="file" id="formFile" required value="<?php #echo $row['G_Image'];?>"/>
            </div> -->
            <div class="mb-3">
                <label for="image" class="form-label">รูปภาพบุคลากร</label>
                <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $S_Image;?>"/>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อบุคลากร</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $S_Name;?>"/>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">ตำเเหน่ง</label>
                <input type="text" name="position" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $S_Position;?>"/>
            </div>
            <div class="mb-3">
                <label for="skill" class="form-label">ความเชี่ยวชาญ</label>
                <input type="text" name="skill" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $S_Skill;?>"/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">อีเมล</label>
                <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $S_Email;?>"/>
            </div>
            <?php
            }
            ?>
            <button type='reset' class='btn btn-outline-danger'>ล้าง</button>
            <button type='submit' class='btn btn-outline-primary'>บันทึกข้อมูล</button>
            </form>
        </div>
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