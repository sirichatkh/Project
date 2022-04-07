<?php
require_once("_config.php");

//$RCB = array("9226", "9227", "9228", "9230", "9421", "9422", "9423", "9427", "9524", "9525", "9527");
$id = intval($_GET["id"]);
$room = "SELECT room.R_ID, room.R_Image, room.R_Name, room.R_Description, room.R_Capacity, staff.S_Name, room.R_VRTour, room.R_Images
FROM room 
INNER JOIN staff ON room.R_Staff = staff.S_ID
WHERE R_ID = $id";

$result = mysqli_query($conn,$room);
while($row = mysqli_fetch_array($result)) {

$title = "รายละเอียดของห้อง ".$row['R_Name'];

?>
<?php require_once("_header.php"); ?>

<div class="container">
  <div class="card mt-5 mx-auto w-75">
    <div class="row g-0">
      <div class="col-md-6">
        <img src="<?php echo $row['R_Image']; ?>" class="img-fluid rounded-start h-100" alt="<?php echo $row['R_Name']; ?>">
      </div>
      <div class="col-md-6">
        <div class="card-body text-center">
          <h2 class="card-title"><?php echo $row['R_Name']; ?></h2>
          <h5 class="text-bold">รายละเอียดของห้อง</h5>
          <p class="card-text"><?php echo $row['R_Description']; ?></p>
          <h5>จุได้</h5>
          <p class="card-text"><?php echo $row['R_Capacity']; ?> คน</p>
          <h5>อาจารย์ประจำห้อง</h5>
          <p class="card-text"><?php echo $row['S_Name']; ?></p>
          <?php if ($row['R_VRTour'] == NULL) { ?>
          
          <?php } else {?>
          <a href="<?php echo url() ?>viewRoom_VRTour.php?id=<?php echo $row['R_ID']; ?>"><button type="button" class="btn btn-outline-info">VR Tour</button></a>
          <?php } ?>
          <!--ไม่ใช่ห้องที่จองได้ ปุ่มจะหาย-->
          <?php /*if ($row['R_Name'] == $RCB) { ?>
            <a href="https://appcs.kku.ac.th/rlab/day.php?year=<?php echo date("Y") ?>&month=<?php echo date("m") ?>&day=<?php echo date("d") ?>&area=3" target="_blank"><button type="button" class="btn btn-outline-success">จองห้องนี้</button></a>
          <?php } else { ?>

          <?php } */?>
        </div>
      </div>
    </div>
  </div>
</div>

<!--รูปภาพอื่น ๆ-->
<!-- 
<div class="container mt-5 mx-auto w-50">
  <div class="row row-cols-1 row-cols-md-3 g-4" data-masonry='{"percentPosition": true }'>
      <div class="col">
        <div class="card shadow-sm">
          <img src="<?php //echo $row['R_Images']; ?>" class="img-fluid rounded-start h-100" alt="">
        </div>
      </div>
    </a>
    <?php } ?>
  </div>
</div>
-->


<?php require_once("_footer.php"); ?>