<?php
    session_start();

    require "_connect.php";
    
    $cID = $_SESSION["cID"];

    $query = "SELECT userName, userFirst, userLast, userEmail, userNumber, USER.secID, secName FROM USER LEFT JOIN SECTION ON USER.secID = SECTION.secID WHERE USER.cID = '$cID' ORDER BY USER.secID";

    $result = $mysqli->query($query);

    $output = "";
    $lastSection = 500;

    while($row = $result->fetch_assoc()){
        $userName = $row["userName"];
        $userFirst = $row["userFirst"];
        $userLast = $row["userLast"];
        $userEmail = $row["userEmail"];
        $userNumber = $row["userNumber"];
        $secID = $row["secID"];
        $secName = $row["secName"];
        
        $fullName = $userFirst . " " . $userLast;
        
        if($secID == 0 && $lastSection != 0){
            $output .= "<h2 class='sectionHeading'>*Unassigned*</h2>";
        }
        
        if($lastSection != $secID){
            $lastSection = $secID;
            $output .= "<h2 class='sectionHeading'>$secName</h2>";
        }
        
        if (isset($userFirst)){
            $output .= "<div class='employee'><img src='images/person.png'><h3>$fullName</h3>Email: <a href='mailto:$userEmail'>$userEmail</a><br><a href='editUser.php?$userName'>edit</a><br>
            Phone: $userNumber
            </div>";
        }
        
        
    }


    echo $output;

?>