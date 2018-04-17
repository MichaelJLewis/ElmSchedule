<?php

    session_start();

    require "_connect.php";

    
    $cID = $_SESSION["cID"];
    $secName = $_POST["secName"];
    
    $insertSectionName = "INSERT INTO SECTION(secName, cID) VALUES('$secName','$cID')";
    
    $result = $mysqli->query($insertSectionName);
    
    $secID = $mysqli->insert_id;

    if(isset($_POST["manager"])){
        $admin = $_POST["manager"];
        
        $insertAdmin = "INSERT INTO ADMIN(secID, cID, userName)VALUES('$secID', '$cID', '$admin')";
    
        $result = $mysqli->query($insertAdmin);
    
        $adminID = $mysqli->insert_id;
        
        $insertSecAdm = "INSERT INTO SECTION_ADMIN(secID, adminID)VALUES('$secID', '$adminID')";
        
        $mysqli->query($insertSecAdm);
    }
?>