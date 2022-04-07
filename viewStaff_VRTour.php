<?php
require_once("_config.php");

$id = intval($_GET["id"]);
$room = "SELECT * FROM room WHERE R_ID = $id";

$result = mysqli_query($conn,$room);
while($row = mysqli_fetch_array($result)) {

$title = "รายละเอียด VRTour ของห้อง ".$row['R_Name'];

?>
<?php require_once("_header.php"); ?>

  <h1 class="text-center my-4">VR Tour ของห้อง <?php echo $row['R_Name']; ?></h1>
  <iframe style="max-width:100%;width:100%;height:610px;" src="<?php echo $row['R_VRTour']; ?>" frameborder="0" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" allowvr="true" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; vr" ></iframe>;

<?php } ?>
<?php require_once("_footer.php"); ?>



