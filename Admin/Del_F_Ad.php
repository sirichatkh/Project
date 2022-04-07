<?php
require_once("../_config.php");

$id = intval($_GET["id"]);

$del = "DELETE FROM floorplan WHERE F_ID = $id";
  if ($conn->query($del) === TRUE) {
  echo "<script type='text/javascript'>alert('ลบข้อมูลเเผนผังชั้นเรียบร้อยเเล้ว');
  window.location = 'Floorplan_Admin.php';
  </script>";
  } else {
  echo "<script type='text/javascript'>alert('ไม่สามารถลบข้อมูลเเผนผังชั้นได้');
  window.location = 'Floorplan_Admin.php';
  </script>";
  }
?>