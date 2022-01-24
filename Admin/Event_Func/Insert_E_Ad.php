<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witthayawiphat : เพิ่มข้อมูลกิจกรรม</title>
    <link rel="stylesheet" href="CSS/Insert_E_Ad.css">
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
                    <a class="nav-search" href="../Event_Admin.php"><button class="btn btn-light" type="button"><img src="Resouces/Icons/Clear_Black_24dp_X1.png" alt="Clear"></a>
                </li>
            </ul>
        </nav>
    </header>
    <article>
        <div class="Form_Add">
            <h1>เพิ่มข้อมูลกิจกรรม</h1>
            <form action="Insert_Func/Insert_E_Func.php" method="post">
            <div class="mb-3">
                <label for="date" class="form-label">วันที่</label>
                <input class="form-control" type="date" id="E_Date" name="E_Date" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">เวลา</label>
                <input class="form-control" type="time" id="E_Time" name="E_Time" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">ชื่อกิจกรรม</label>
                <input type="input" class="form-control" id="E_Name" name="E_Name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">รายละเอียดกิจกรรม</label>
                <textarea type="input" class="form-control" id="E_Description" name="E_Description" required></textarea>
            </div>
            <button type='reset' class='btn btn-outline-danger'>ล้าง</button>
            <button type='submit' class='btn btn-outline-primary' id="insert" name="insert">เพิ่มข้อมูล</button>
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