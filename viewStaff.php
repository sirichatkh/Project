<?php
require_once("_config.php");

$id = intval($_GET["id"]);
$staff= "SELECT staff.S_ID, staff.S_Image, staff.S_Name, staff.S_Position, staff.S_Skill, room.R_Name, staff.S_Email, room.R_VRTour
FROM staff 
INNER JOIN room ON room.R_Staff = staff.S_ID
WHERE S_ID = $id";

$result = mysqli_query($conn,$staff);
while($row = mysqli_fetch_array($result)) {

$title = "รายละเอียดบุคลากร ".$row['S_Name'];

?>
<?php require_once("_header.php"); ?>

<div class="container">
  <div class="card mt-5 mx-auto w-75">
    <div class="row g-0">
      <div class="col-md-6">
        <img src="<?php echo $row['S_Image']; ?>" class="img-fluid rounded-start h-100" alt="<?php echo $row['S_Name']; ?>">
      </div>
      <div class="col-md-6">
        <div class="card-body text-center">
          <h2 class="card-title"><?php echo $row['S_Name']; ?></h2>
          <h5 class="text-bold">ตำแหน่ง</h5>
          <p class="card-text"><?php echo $row['S_Position']; ?></p>
          <h5 class="text-bold">ความเชี่ยวชาญ</h5>
          <p class="card-text"><?php echo $row['S_Skill']; ?></p>
          <h5>ห้องพัก , โต๊ะทำงาน</h5>
          <p class="card-text"><?php echo $row['R_Name']; ?></p>
          <h5>Email</h5>
          <p class="card-text"><?php echo $row['S_Email']; ?></p>
          <?php if ($row['R_VRTour'] == NULL) { ?>
          
          <?php } else {?>
          <a href="<?php echo url() ?>viewStaff_VRTour.php?id=<?php echo $row['S_ID']; ?>"><button type="button" class="btn btn-outline-info">VR Tour วิธีเดินทางไปห้องพักอาจารย์</button></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php require_once("_footer.php"); ?>