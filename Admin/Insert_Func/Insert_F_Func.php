<?php
require_once("../../_config.php");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["F_Image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["F_Image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["F_Image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["F_Image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["F_Image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

/*
$upload_max_size = ini_get('upload_max_filesize');
$maxSize =  intval($upload_max_size); //MB

$data = [
  "F_Name" => $_POST["F_Name"],
];

if(isset($_FILES["F_Image"]) and $_FILES["F_Image"]["tmp_name"] != ""){
  $uploadFile = uploadFile($_FILES["F_Image"],['image/png'=>'png','image/jpeg'=>'jpg'],"/uploads","floor_",$maxSize);
  if(!isset($uploadFile)){
    exit(json_encode(["result"=> 0,"text"=>"ระบบมีปัญหากับการอัพโหลดไฟล์ในขณะนี้"]));
  }
  if($uploadFile["result"] === 0){
    exit(json_encode(["result"=> 0,"text"=>$uploadFile["text"]]));
  }
  else{
    $data["F_Image"] = $uploadFile["fileName"];
  }
}
*/

  $insert = "INSERT INTO floorplan (F_Image, F_Name)
  VALUES ('".$_POST["F_Image"]."', '".$_POST["F_Name"]."')";
  if ($conn->query($insert) === TRUE) {
  /*echo "<script type='text/javascript'>alert('เพิ่มข้อมูลเเผนผังชั้นเรียบร้อยเเล้ว');
  window.location = '../Floorplan_Admin.php' ;
  </script>";
  */
  } else {  
  echo "<script type='text/javascript'>alert('ไม่สามารถเพิ่มข้อมูลเเผนผังชั้นได้');
  window.location = '../Floorplan_Admin.php';
  </script>";
  }

?>