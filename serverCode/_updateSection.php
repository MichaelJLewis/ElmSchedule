<?php

    session_start();

    require "_connect.php";

    $cID = $_SESSION["cID"];

    $secName = $_POST["secName"];
    $secID  =  $_POST["secID"];

    $updateQuery = "UPDATE SECTION SET secName = '$secName' WHERE secID = '$secID' AND cID = '$cID'";

    $mysqli->query($updateQuery);

?>