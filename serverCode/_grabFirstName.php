<?php

    require "_connect.php";

    $username = $_GET["username"];

    $userFirstQuery = "SELECT userFirst FROM USER WHERE userName = '$username'";

    $result = $mysqli->query($userFirstQuery);

    $row = $result->fetch_assoc();
    
    echo $row["userFirst"];
?>