<?php

    session_start();
    
    require "_connect.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $output = "";
    $wrong = false;
    
    $loginQuery = "SELECT userPassword, userFirst, userLast, USER.cID, cName FROM USER JOIN COMPANY ON USER.cID = COMPANY.cID WHERE userName = '$username' ";

    $result = $mysqli->query($loginQuery);

    if($result->num_rows < 0){
        $wrong = true;
    }else{
        $row = $result->fetch_assoc();
        if(!password_verify($password, $row["userPassword"])){
            $wrong = true;
        }
    }

    if($wrong){
        $output = "* Wrong Username or Password.";
    }else{
        $_SESSION["username"] = $username;
        $_SESSION["userFirst"] = $row["userFirst"];
        $_SESSION["userLast"] = $row["userLast"];
        $_SESSION["cID"] = $row["cID"];
        $_SESSION["cName"] = $row["cName"];
    }

    echo $output;
?>