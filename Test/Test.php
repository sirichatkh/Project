<?php
    mysql_connect("localhost","root","") or die("could not connect");
    mysql_select_db("witthayawiphat") or die("could not find db");
    $output = '';
    //collect
    if(isset($_POST['search'])) {
        $searchq = $_POST['search'];
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        
        $query = mysql_query("SELECT * FROM rooms WHERE R_Number LIKE '%$searchq%' OR R_Name LIKE '%$searchq%'") or die("could not search");
        $count = mysql_num_rows($query);
        if ($count == 0) {
            $output = 'There was no search results!';
        }else{
            while($row = mysql_fetch_array($query)) {
                $R_Image = $row['R_Image'];
                $R_Number = $row['R_Number'];
                $R_Name = $row['R_Name'];
                $R_Description = $row['R_Description'];
                $R_Capacity = $row['R_Capacity'];

                $output .= '<div>'.$R_Image.''.$R_Number.''.$R_Name.'</div>';
                ;}
            }
        }
        ?>   
        <?php print("$output");?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="Test.php">  
        <input type="text" name="search" placeholder="ค้นหา..">
        <input type="submit" value="ค้นหา" /> 
    </form>
</body>
</html>