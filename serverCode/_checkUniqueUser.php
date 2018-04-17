<?php
    
    require "_connect.php";

    $username = $_GET["username"];
    $query = "SELECT userName FROM USER WHERE userName = '$username'";

    $result = $mysqli->query($query);

    if($result->num_rows > 0){
        $output = true;
    }else{
        $output = false;
    }
    
    echo $output;
?>