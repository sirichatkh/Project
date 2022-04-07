<?php
session_start();
date_default_timezone_set('Asia/Bangkok');

define("title", 'College of Computing Tour');
define("url", 'http://localhost/Project_M/');
define("host", 'localhost');
define("user", 'root');
define("pass", '');
define("dbname", 'collegeofcomputing_tour');
define("debug", 1);

require_once("_function.php");

if(isset($_SESSION["user_id"])){
  
  $user = "SELECT * FROM users WHERE id = $_SESSION LIMIT 1";
  if($user){
    $user_id = $user[0]["U_ID"];
    $user = $user[0];
  }
  else{
    session_destroy();
    header("location: ".url("login.php"));
  }
}