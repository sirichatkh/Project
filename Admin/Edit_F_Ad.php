<?php
require_once("../_config.php");
/*checkLogin();*/
$title = "เเก้ไขข้อมูลแผนผังชั้น";

$upload_max_size = ini_get('upload_max_filesize');
$maxSize =  intval($upload_max_size); //MB

$id = intval($_GET["id"]);

?>

<?php require_once("_header.php"); ?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
       
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
        <div class="Form_Edit">
        <h5 class="card-title mt-1"><?php echo $title; ?></h5>
            <?php
                $sql = "SELECT * FROM floorplan WHERE F_ID = $id";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)){
            ?>    
            <form method="post" action="Edit_Func/Edit_F_Func.php"> 
            <input type="hidden" name="F_ID" id="F_ID">      
            <div class="mb-3">
                <label for="F_Image" class="form-label">ไฟล์ภาพ <small class="text-muted">รองรับเฉพาะไฟล์รูปภาพนามสกุล .jpg .png</small></label>
                <input class="form-control" type="file" id="F_Image" name="F_Image" accept="image/*" onchange="checkSize(this)"/>
                <div id="F_ImageFeedback" class="invalid-feedback"></div>
                <img class="mt-2" id="F_ImageShow" style="max-width:450px;max-height: 220px;" src="../<?php echo $row["F_Image"]?>"> 
            </div> 
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ชั้นที่</label>
                <input type="text" class="form-control" id="F_Name" name="F_Name" value="<?php echo $row["F_Name"];?>"/>
            </div>
            <?php
            }
            ?>
            <button type='button' class='btn btn-outline-danger' onclick="history.back()">ปิด</button>
            <button type='submit' class='btn btn-outline-primary'>บันทึกข้อมูล</button>
            </form>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once("_header.php"); ?>

<script>
function checkSize(file){
  if((file.files[0].size / 1024 / 1024) > <?php echo $maxSize; ?>){
    $(file).addClass('is-invalid');
    $("#F_ImageFeedback").html('รองรับขนาดไฟล์ไม่เกิน <?php echo $maxSize; ?>MB');
    $(file).val('');
  }
  else{
    $(file).removeClass('is-invalid');
    $("#F_ImageFeedback").html('');
    $('#F_ImageShow').show().attr("src", window.URL.createObjectURL(file.files[0]));
  }
}
</script>
