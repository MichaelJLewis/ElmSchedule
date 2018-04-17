<?php

    session_start();

    require "_connect.php";

    $secID = $_POST["secID"];

    $cID = $_SESSION["cID"];
    
    $update = "UPDATE USER SET secID = '0' WHERE secID = '$secID' AND cID = $cID";

    $delete = "DELETE FROM SECTION WHERE secID = '$secID'";
    
    $mysqli->query($update);
    $mysqli->query($delete);

    echo mysqli_error($mysqli);
?>