<?php
require_once("_config.php");
$title = "หน้าหลัก";
?>
<?php require_once("_header.php"); ?>
<nav class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
    <nav class="nav nav-pills flex-column">
        <a class="nav-link" href="#h1-1">เเผนผังของตัวอาคารวิทยวิภาส</a>
        <a class="nav-link" href="#h1-2">วิธีเดินทางมาอาคารวิทยวิภาส</a>
        <a class="nav-link" href="#h1-3">ตำเเหน่งที่อยู่อาคารวิทยวิภาส</a>                 
    </nav>           
</nav>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Resouces/Images/Is_1.jpg" class="d-block w-100" alt="Image">
        </div>
        <div class="carousel-item">
            <img src="Resouces/Images/Is_2.jpg" class="d-block w-100" alt="Image">
        </div>
        <div class="carousel-item">
            <img src="Resouces/Images/Is_3.jpg" class="d-block w-100" alt="Image">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container">
    <div class="pt-5" id="h1-1">
        <h1 class="text-center my-4">เเผนผังของตัวอาคารวิทยวิภาส</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4" data-masonry='{"percentPosition": true }'>
            <?php 
            $sql = "SELECT * FROM floorplan ORDER BY F_ID DESC LIMIT 8";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){ ?>
                <div class="col">
                    <div class="card">
                        <a href="<?php echo url($row['F_Image']); ?>" class='text-decoration-none' data-lightbox="floor" data-title="ชั้น <?php echo $row['F_Name']; ?>">
                            <img src="<?php echo url($row['F_Image']); ?>"  class="card-img-top" alt="<?php echo $row['F_Name']; ?>" style="width:100%;height:14rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">ชั้น <?php echo $row['F_Name']; ?></h5>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="pt-5" id="h1-2">
        <h1 class="text-center my-4">วิธีเดินทางมาอาคารวิทยวิภาส</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4" data-masonry='{"percentPosition": true }'>
            <div class="col">
                <div class="card">
                    <a href='Htgb/Modindaeng_Gate.php' class='text-decoration-none'>
                        <img src="Resouces/Images/Meeting_Room.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">หน้าประตูมอดินเเดง</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <a href='Htgb/Colombo_Gate.php' class='text-decoration-none'>
                        <img src="Resouces/Images/Meeting_Room.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">หน้าประตูโคลัมโบ</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <a href='Kangsadan_Gate.php' class='text-decoration-none'>
                        <img src="Resouces/Images/Meeting_Room.jpg" class="card-img-top" alt="..." style="">
                        <div class="card-body">
                            <h5 class="card-title">หน้าประตูกังสดาล</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <a href='Htgb/Sithan_Gate.php' class='text-decoration-none'>
                        <img src="Resouces/Images/Meeting_Room.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">หน้าประตูสีฐาน</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5" id="h1-3">
        <h1 class="text-center my-4" >เเกลลอรี่</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4" data-masonry='{"percentPosition": true }'>
            <?php 
            $sql = "SELECT * FROM gallery ORDER BY G_ID DESC LIMIT 8";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){ ?>
                <div class="col">
                    <div class="card">
                        <a href="<?php echo url($row['G_Image']); ?>" class='text-decoration-none' data-lightbox="gallery" data-title="<?php echo $row['G_Name']; ?>">
                            <img src="<?php echo url($row['G_Image']); ?>"  class="card-img-top" alt="<?php echo $row['G_Name']; ?>" style="width:100%;">
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>  
    <div class="pt-5" id="h1-4">
        <h1 class="text-center my-4">ตำเเหน่งที่อยู่อาคารวิทยวิภาส</h1>    
        <div class="Google_Map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1020.7207417044757!2d102.8251093055335!3d16.47537767035731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31228b1daee27277%3A0x4d95131862f3456e!2z4Lit4Liy4LiE4Liy4Lij4Lin4Li04LiX4Lii4Lin4Li04Lig4Liy4LiqIChTQzA5KQ!5e0!3m2!1sen!2sth!4v1636706291895!5m2!1sen!2sth" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
<?php require_once("_footer.php"); ?>