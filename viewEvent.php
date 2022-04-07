<?php
require_once("_config.php");

$id = intval($_GET["id"]);
$event = "SELECT event.E_ID, event.E_Image, event.E_Name, event.E_Date, event.E_Time, room.R_Name, event.E_Description, event.E_Images
FROM event 
INNER JOIN room ON room.R_ID = event.E_Room
WHERE E_ID = $id";

$result = mysqli_query($conn,$event);
while($row = mysqli_fetch_array($result)) {
            
$title = "รายละเอียดของ ".$row['E_Name'];

?>
<?php require_once("_header.php"); ?>

<div class="container">
  <div class="card mt-5 mx-auto w-75">
    <div class="row g-0">
      <div class="col-md-6">
        <img src="<?php echo $row['E_Image']; ?>" class="img-fluid rounded-start h-100" alt="<?php echo $row['E_Name']; ?>">
      </div>
      <div class="col-md-6">
        <div class="card-body text-center">
          <h2 class="card-title"><?php echo $row['E_Name']; ?></h2>
          <h5 class="text-bold">จัดวันที่</h5>
          <p class="card-text"><?php echo date("d/m/Y",strtotime($row['E_Date'])); ?></p>
          <h5>เวลา</h5>
          <p class="card-text"><?php echo date("H:i",strtotime($row['E_Time'])); ?></p>
          <h5>จัดที่ห้อง</h5>
          <p class="card-text"><?php echo $row['R_Name']; ?></p>
          <h5>รายละเอียด</h5>
          <p class="card-text"><?php echo $row['E_Description']; ?></p>
       </div>
      </div>
    </div>
  </div>
</div>

<!--รูปภาพอื่น ๆ-->
<!-- 
<div class="container mt-5 mx-auto w-50">
  <div class="row row-cols-1 row-cols-md-3 g-4" data-masonry='{"percentPosition": true }'>
    <?php
    //$images = json_decode($event['E_Images'],true);
    //foreach ($images as $image) { ?>
    <a href="<?php //echo $image; ?>"  data-lightbox="Event">
      <div class="col">
        <div class="card shadow-sm">
          <img src="<?php //echo $image; ?>" class="img-fluid rounded-start h-100" alt="">
        </div>
      </div>
    </a>
    <?php //} ?>
  </div>
</div>
<?php } ?>
-->

<?php require_once("_footer.php"); ?>