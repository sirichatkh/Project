<?php
require_once("_config.php");
$title = "ค้นหา";


    /*
    $Keyword        =   $_POST['search'];

    $search = "SELECT * FROM room WHERE R_Name LIKE '%'.$Keyword'%'' ";

    $result = mysqli_query($conn,$search);
    $num = mysqli_num_rows($result);
    if($num==0){
        echo "ไม่มีข้อมูล";
    }else{
    }
    */
    
?>

<?php require_once("_header.php"); ?>
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<h1 class="text-center my-4">ค้นหา</h1>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <label for="category">หมวดที่ต้องการค้นหา</label>
        <select class="form-select" onchange="changeType();" id="typeFilter">
          <option value="room" selected>ห้อง</option>
          <option value="staff">บุคลากร</option>
          <option value="event">กิจกรรม</option>
        </select>
    </div>
    <div class="col-md-9">
      <label for="seacrh">ค้นหา</label>
        <input type="text" class="form-control" name="search" id="search" placeholder="ชื่อห้อง"/>
    </div>
  </div>
  <hr>
  <label id="filter" for="filter">ตัวกรอง</label>
  <div id="roomFilter" style="margin-top: 2%">
    <div class="row justify-content-center">
      <label for="filterFloor" class="col-sm-2 col-form-label text-lg-end text-center pt-0">ชั้น</label>
        <div class="col-sm-6">
          <?php
          $select = "SELECT * FROM floorplan WHERE F_ID DESC";
          foreach ($select as $value) {
          /*
          $select = select("floorplan",NULL,"F_ID DESC");
          foreach ($select as $value) { 
          */
          ?>
      
        <div class="form-check form-check-inline mr-1">
          <input class="form-check-input filter" type="checkbox" id="filterFloor<?php echo $value['F_ID']; ?>" name="filterFloor[]" value="<?php echo $value['F_ID']; ?>" checked>
          <label class="form-check-label" for="filterFloor<?php echo $value['F_ID']; ?>">ชั้น <?php echo $value['F_Name']; ?></label>
        </div>
        <?php } ?>
        </div>
  </div>

      <div class="row justify-content-center" id="filterType">
        <label for="filterType" class="col-sm-2 col-form-label text-lg-end text-center pt-0">ประเภทห้อง</label>
          <div class="col-sm-6">
          <div class="form-check form-check-inline mr-1">
              <input class="form-check-input filter" type="checkbox" id="filterType1" name="filterType[]" value="1" checked>
              <label class="form-check-label" for="filterType1">ห้องเรียน</label>
          </div>
          <div class="form-check form-check-inline mr-1">
              <input class="form-check-input filter" type="checkbox" id="filterType2" name="filterType[]" value="2" checked>
              <label class="form-check-label" for="filterType2">ห้องเเล๊บ</label>
          </div>
          <div class="form-check form-check-inline mr-1">
              <input class="form-check-input filter" type="checkbox" id="filterType3" name="filterType[]" value="3" checked>
              <label class="form-check-label" for="filterType3">ห้องประชุม</label>
          </div>
          <div class="form-check form-check-inline mr-1">
              <input class="form-check-input filter" type="checkbox" id="filterType4" name="filterType[]" value="4" checked>
              <label class="form-check-label" for="filterType4">อื่น ๆ</label>
          </div>
          </div>
      </div>
      <hr style="margin-top: 2%">

      <div class="table-responsive p-2" id="table">
        <table class="table table-light table-hover" id="roomTable">
          <thead>
            <tr>
                <th scope="col" width="5%" data-orderable="false"></th>
                <th scope="col" width="10%" data-orderable="false"></th>
                <th scope="col" width="15%">ห้อง</th>
                <th scope="col" width="10%" data-orderable="false">ความจุของห้อง</th>
                <th scope="col" width="25%" data-orderable="false">ผู้รับผิดชอบเเละดูเเลห้อง</th>
                <th scope="col" width="15%" data-orderable="false"></th>
            </tr>
            <tr>
            <?php
              $sql = "SELECT room.R_ID, room.R_Name, room.R_Capacity, staff.S_Name
              FROM room 
              INNER JOIN staff ON room.R_Staff = staff.S_ID";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result)) {
              ?>
              <td scope="col" width="5%" data-orderable="false"></td>
              <td scope="col" width="10%" data-orderable="false"><?php echo $row['R_ID']; ?></td>
              <td scope="col" width="15%"><?php echo $row['R_Name']; ?></td>
              <td scope="col" width="10%" data-orderable="false"><?php echo $row['R_Capacity']; ?> คน/ที่นั่ง</td>
              <td scope="col" width="25%" data-orderable="false"><?php echo $row['S_Name']; ?></td>
              <td scope="col" width="15%" data-orderable="false"><div class="btn-group btn-group-sm" role="group"><a href="<?php echo url() ?>viewRoom.php?id=<?php echo $row['R_ID']; ?>" target="_blank" class="btn btn-primary w-100">ดูรายละเอียด</a></div></td>
            </tr>
            <?php 
            } 
            ?>
          </thead>
        </table>
      </div> 
    </div>
    
    <div id="staffFilter">
      <div class="table-responsive p-2" id="table">
        <table class="table table-light table-hover " id="staffTable">
          <thead>
            <tr>
              <th scope="col" width="5%" data-orderable="false"></th>
              <th scope="col" width="10%" data-orderable="false"></th>
              <th scope="col" width="15%">ชื่อบุคลากร</th>
              <th scope="col" width="20%" data-orderable="false">ตำเเหน่ง</th>
              <th scope="col" width="20%" data-orderable="false">ความเชี่ยวชาญ</th>
              <th scope="col" width="15%" data-orderable="false">ห้องพัก , โต๊ะทำงาน</th>
              <th scope="col" width="15%" data-orderable="false"></th>
            </tr>
            <tr>
            <?php
              $sql = "SELECT staff.S_ID, staff.S_Name, staff.S_Position, staff.S_Skill, room.R_Name
              FROM staff
              INNER JOIN room ON room.R_Staff = staff.S_ID";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result)){
              ?>
              <td scope="col" width="5%" data-orderable="false"></td>
              <td scope="col" width="10%" data-orderable="false"><?php echo $row['S_ID']; ?></td>
              <td scope="col" width="15%"><?php echo $row['S_Name']; ?></td>
              <td scope="col" width="20%" data-orderable="false"><?php echo $row['S_Position']; ?></td>
              <td scope="col" width="20%" data-orderable="false"><?php echo $row['S_Skill']; ?></td>
              <td scope="col" width="15%" data-orderable="false"><?php echo $row['R_Name']; ?></td>
              <td scope="col" width="15%" data-orderable="false"><div class="btn-group btn-group-sm" role="group"><a href="<?php echo url() ?>viewStaff.php?id=<?php echo $row['S_ID']; ?>" target="_blank" class="btn btn-primary w-100">ดูรายละเอียด</a></div></td>
            </tr>
            <?php 
            } 
            ?>
          </thead>
        </table>
      </div> 
    </div>
    <div id="eventFilter">
      <div class="table-responsive p-2" id="table">
        <table class="table table-light table-hover" id="eventTable">
          <thead>
            <tr>
              <th scope="col" width="5%" data-orderable="false"></th>
              <th scope="col" width="10%" data-orderable="false"></th>
              <th scope="col" width="10%">จัดวันที่</th>
              <th scope="col" width="10%" data-orderable="false">เวลา</th>
              <th scope="col" width="10%" data-orderable="false">จัดที่ห้อง</th>
              <th scope="col" width="20%" data-orderable="false">ชื่อกิจกรรม</th>
              <th scope="col" width="20%" data-orderable="false">รายละเอียดกิจกรรม</th>
              <th scope="col" width="15%" data-orderable="false"></th>
            </tr>
            <tr>
            <?php
              $sql = "SELECT event.E_ID, event.E_Date, event.E_Time, room.R_Name, event.E_Name, event.E_Description
              FROM event
              INNER JOIN room ON room.R_ID = event.E_Room";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result)){
              ?>
              <th scope="col" width="5%" data-orderable="false"></th>
              <td scope="col" width="10%" data-orderable="false"><?php echo $row['E_ID']; ?></td>
              <td scope="col" width="10%"><?php echo $row['E_Date']; ?></td>
              <td scope="col" width="10%" data-orderable="false"><?php echo $row['E_Time']; ?></td>
              <td scope="col" width="10%" data-orderable="false"><?php echo $row['R_Name']; ?></td>
              <td scope="col" width="20%" data-orderable="false"><?php echo $row['E_Name']; ?></td>
              <td scope="col" width="20%" data-orderable="false"><?php echo $row['E_Description']; ?></td>
              <td scope="col" width="15%" data-orderable="false"><div class="btn-group btn-group-sm" role="group"><a href="<?php echo url() ?>viewEvent.php?id=<?php echo $row['E_ID']; ?>" target="_blank" class="btn btn-primary w-100">ดูรายละเอียด</a></div></td>
            </tr>
            <?php 
            } 
            ?>
          </thead>
        </table>
      </div> 
    </div>
</div>
<?php require_once("_footer.php"); ?>

<script>
function changeType(){
    if($('#typeFilter').val() == 'room'){
        $('#roomFilter').show();
        $('#roomTable').show();
        $('#staffFilter').hide();
        $('#eventFilter').hide();
        $('#search').attr("placeholder", "ชื่อห้อง");
        
    }
    else if($('#typeFilter').val() == 'staff'){
        $('#filter').hide();
        $('#filterType').hide();
        $('#roomTable').hide();
        $('#staffFilter').show();
        $('#eventFilter').hide();
        $('#search').attr("placeholder", "ชื่อบุคลากร");

    }
    else if($('#typeFilter').val() == 'event'){
        $('#filter').hide();
        $('#filterType').hide();
        $('#roomFilter').hide();
        $('#staffFilter').hide();
        $('#eventFilter').show();
        $('#search').attr("placeholder", "ชื่อกิจกรรม");
    }
}

setTimeout(function(){
  changeType('room');
}, 200);
</script>
        <?php
        // $conn=mysqli_connect("localhost","root","","witthayawiphat");

        // if (mysqli_connect_errno()){
        //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
        //     die();
        // }

        // $output = '';

        // if(isset($_POST['search'])) {
        //     $searchq = $_POST['search'];
        //     $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        //     $query = mysql_query("SELECT * FROM rooms WHERE R_Number LIKE '%$searchq%' OR R_Name LIKE '%$searchq%'") or die ("ไม่สามารถค้นหาได้");
        //     $count = mysql_num_rows($query);
        //     if ($count == 0) {
        //         $output = 'ไม่มีข้อมูลที่ต้องการ!';
        //     } else {
        //         while ($row = mysql_fetch_array($query)) {
        //             $R_Image = $row['R_Image'];
        //             $R_Number = $row['R_Number'];
        //             $R_Name = $row['R_Name'];
        //             $R_Description = $row['R_Description'];
        //             $R_Capacity = $row['R_Capacity'];

        //             $output .= '<div>'.$Num.' '.$Name.'</div>';
        //         ;}
        //     }
        // }
        // ?>   
        <!-- <?php 
        //print("$output");?>  -->
        
        <!--
        <nav aria-label="...">
            <ul class="pagination">
                <li <?php //if($pageno <= 1){ echo "class='page-item disabled'"; } ?>>
                    <a class="page-link" href="<?php //if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">ย้อนกลับ</a>
                <li <?php //if($pageno >= $total_pages){ echo "class='page-item disabled'"; } ?>>
                    <a class="page-link" href="<?php //if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">ถัดไป</a>
                </li>
            </ul>
        </nav>
        -->
