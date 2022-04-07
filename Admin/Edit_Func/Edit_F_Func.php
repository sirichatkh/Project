<?php
require_once("../../_config.php");

$upload_max_size = ini_get('upload_max_filesize');
$maxSize =  intval($upload_max_size); //MB

$id = intval($_GET["id"]);

if(isset($_POST)) { 

  $Image = $_POST['F_Image']; 
  $Name = $_POST['F_Name']; 

  if(isset($_FILES["F_Image"]) and $_FILES["F_Image"]["tmp_name"] != ""){
    $uploadFile = uploadFile($_FILES["F_Image"],['image/png'=>'png','image/jpeg'=>'jpg'],"/uploads","floor_",$maxSize);
    if(!isset($uploadFile)){
      exit(json_encode(["result"=> 0,"text"=>"ระบบมีปัญหากับการอัพโหลดไฟล์ในขณะนี้"]));
    }
    if($uploadFile["result"] === 0){
      exit(json_encode(["result"=> 0,"text"=>$uploadFile["text"]]));
    }
    else{
      $select = "SELECT * FROM floorplan WHERE F_ID = $id";
      @unlink('../'.$select['F_Image']);
      $Image = $uploadFile["fileName"];
      $Name = $uploadFile["fileName"];
    }
  }

  $update = "UPDATE floorplan SET F_Image ='$Image', F_Name='$Name' WHERE F_ID = $id";
  if ($conn->query($update) === TRUE) {

  echo "<script type='text/javascript'>alert('เเก้ไขข้อมูลเเผนผังชั้นเรียบร้อยเเล้ว');
  window.location = '../Floorplan_Admin.php';
  </script>";
  } else {
  echo "<script type='text/javascript'>alert('ไม่สามารถเเก้ไขข้อมูลเเผนผังชั้นได้');
  window.location = '../Floorplan_Admin.php';
  </script>";
  }
}
?>
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