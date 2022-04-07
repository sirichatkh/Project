<?php
$conn=mysqli_connect("localhost","root","","collegeofcomputing_tour");

  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }
  
function url($path = ""){
  return rtrim(url,"/")."/".ltrim($path,"/");
}
function checkLogin(){
  if(!isset($_SESSION["U_ID"])){
    session_destroy();
    header("location: ".url("admin/signin.php?2"));
  }
}

if (isset($_POST['login_btn'])) {
  login();
}

function Login(){
  global $conn, $Email, $errors;

  $Email = e($_POST['U_Email']);
  $Password = e($_POST['U_Password']);

  if (empty($U_Email)) {
    array_push($errors, "Username is required");
  }
  if (empty($U_Password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {

    $query = "SELECT * FROM user WHERE U_Email='$Email' AND U_Password='$Password' LIMIT 1";
    $results = mysqli_query($conn, $query);

    if (mysqli_num_rows($results) == 1) { 

        $_SESSION['success']  = "You are now logged in";
        header('location: Admin/Floorplan_Admin.php');		  
      }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
function dateFormat($time){
  return date("d/m/Y H:i",strtotime($time));
}
function active($currect_page){
  $actual = basename($_SERVER['PHP_SELF']);
  echo (($currect_page == $actual) or ($currect_page == "index.php" and $actual == "") or (is_array($currect_page) and in_array($actual, $currect_page)))  ? "active" : $actual;
}
function uploadFile($file,$type = NULL,$folder,$prefix = "",$maxSize = 10){
  $filepath = $file['tmp_name'];
  $fileSize = filesize($filepath);
  $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
  $filetype = finfo_file($fileinfo, $filepath);

  if ($fileSize === 0) {
    return(["result"=>0,"text"=>"The file is empty."]);
  }
  if(!in_array($filetype, array_keys($type))) {
    return(["result"=>0,"text"=>"ไม่รองรับไฟล์นามสกุล ".pathinfo($file['name'], PATHINFO_EXTENSION)]);
  }
  if($fileSize > ($maxSize*1024*1024)){ // 3 MB (1 byte * 1024 * 1024 * 3 (for 3 MB))
    return(["result"=>0,"text"=>"รองรับขนาดไฟล์ไม่เกิน $maxSize MB"]);
  }
  $extension = $type[$filetype];
  $fileName = $prefix.date("ymd")."".md5(rand().time()).".".$extension;
  $newFilePath = trim($folder,"/")."/".$fileName;
  $targetFile = __DIR__."/".$newFilePath;
  if (!copy($filepath, $targetFile )){ 
    return(["result"=>0,"text"=>"Can't move file"]);
  }
  unlink($filepath);
  return(["result"=>1,"text"=>"File uploaded successfully","fileName"=>$newFilePath]);
}