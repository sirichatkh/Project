<?php
    $conn=mysqli_connect("localhost","root","","witthayawiphat");

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }
    if (isset($_GET['del'])) {}
    $id = $_GET['del'];
    $query = "DELETE FROM gallery WHERE G_ID='$id'"; 
    $result = mysqli_query($conn,$query) or die ( mysqli_error());
    header("Location: ../Gallery_Admin.php"); 
?>