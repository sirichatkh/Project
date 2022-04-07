<?php
require_once("_config.php");
$title = "VR Tour";
?>
<?php require_once("_header.php"); ?>
<h1 class="text-center my-4">VR Tour</h1>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a href ="VRTour.php" style="text-decoration: none;"><button class="nav-link active" id="All-tab" data-bs-toggle="tab" data-bs-target="#All" type="button" role="tab" aria-controls="All" aria-selected="true">ทั้งอาคาร</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href ="VRTour_F1.php" style="text-decoration: none;"><button class="nav-link" id="F1-tab" data-bs-toggle="tab" data-bs-target="#F1" type="button" role="tab" aria-controls="F1" aria-selected="false">ชั้นที่ 1</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href ="VRTour_F2.php" style="text-decoration: none;"><button class="nav-link" id="F2-tab" data-bs-toggle="tab" data-bs-target="#F2" type="button" role="tab" aria-controls="F2" aria-selected="false">ชั้นที่ 2</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href ="VRTour_F3.php" style="text-decoration: none;"><button class="nav-link" id="F3-tab" data-bs-toggle="tab" data-bs-target="#F3" type="button" role="tab" aria-controls="F3" aria-selected="false">ชั้นที่ 3</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href ="VRTour_F4.php" style="text-decoration: none;"><button class="nav-link" id="F4-tab" data-bs-toggle="tab" data-bs-target="#F4" type="button" role="tab" aria-controls="F4" aria-selected="false">ชั้นที่ 4</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href ="VRTour_F5.php" style="text-decoration: none;"><button class="nav-link" id="F5-tab" data-bs-toggle="tab" data-bs-target="#F5" type="button" role="tab" aria-controls="F5" aria-selected="false">ชั้นที่ 5</button></a>
  </li>
</ul>
<iframe style="max-width:100%;width:100%;height:610px;" src="https://www.klapty.com/tour/tunnel/DIc07UODbd" frameborder="0" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" allowvr="true" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; vr" ></iframe>
  
<?php require_once("_footer.php"); ?>