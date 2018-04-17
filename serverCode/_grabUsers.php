<?php
    session_start();

    require "_connect.php";
    
    $cID = $_SESSION["cID"];

    $secID = $_POST["secID"];

    $query = "SELECT userName, userFirst, userLast FROM USER WHERE secID = '$secID'";

    $result = $mysqli->query($query);

    $output = [];
    $output["value"] = [];
    $output["text"] = [];
    while($row = $result->fetch_assoc()){
        $userName = $row["userName"];
        $userFirst = $row["userFirst"];
        $userLast = $row["userLast"];
        
        $fullName = $userFirst . " " . $userLast;
            
        array_push($output["value"], $secID);
        array_push($output["text"], $fullName);
    }

    $encOutput = json_encode($output);

    echo $encOutput
?>