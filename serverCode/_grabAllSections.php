<?php
    session_start();

    require "_connect.php";

    $cID = $_SESSION["cID"];

    $query = "SELECT secID, secName FROM SECTION WHERE cID = '$cID'";

    $result = $mysqli->query($query);
    
    $output = [
                "value" => [],
                "text" => []
              ];

    while($row = $result->fetch_assoc()){
        $secID = $row["secID"];
        $secName = $row["secName"];
            
        array_push($output["value"], $secID);
        array_push($output["text"], $secName);
    }

    $encOutput = json_encode($output);

    echo $encOutput;

?>