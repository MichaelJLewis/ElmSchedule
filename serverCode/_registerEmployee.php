<?php

    session_start();

    if(!isset($_POST["txtFirst"])){
        header("Location: ../addEmployee.php");
    }

    require "_connect.php";

    $addColumn = "";
    $addValues = "";

    $first = $_POST["txtFirst"];
    $last = $_POST["txtLast"];
    $email = $_POST["txtEmail"];

    $email = strtolower($email);
    $first = strtolower($first);
    $first = ucfirst($first);
    $last = strtolower($last);
    $last = ucfirst($last);

    if(isset($_POST["txtPhone"])){
        $phone = $_POST["txtPhone"];
        $addColumn .= ", userNumber";
        $addValues .= ", '".$phone."'";
    }

    if(isset($_POST["dropProvider"])){
        $provider = $_POST["dropProvider"];
        $addColumn .= ", userProvider";
        $addValues .= ", '".$provider."'";
    }

    if(isset($_POST["txtWage"])){
        $wage = $_POST["txtWage"];
        $addColumn .= ", userWage";
        $addValues .= ", '".$wage."'";
    }
    
    if(isset($_POST["secDrop"])){
        $secID = $_POST["secDrop"];
        $addColumn .= ", secID";
        $addValues .= ", '".$secID."'";
    }
    
    $cID = $_SESSION["cID"];

    $firstLetter = str_split($first);
    $conName = $firstLetter[0].$last;

    $uniqueUser = "SELECT COUNT(*) as 'num' FROM USER WHERE userName LIKE '%$conName%'";
        
    $result = $mysqli->query($uniqueUser);

    $row = $result->fetch_assoc();
    
    $num = $row["num"] + 1;

    $username = strtolower($conName.$num);

    $insertNewEmployee = "INSERT INTO USER(userName, userPassword, userFirst, userLast, userEmail, cID $addColumn ) VALUES('$username', 'placeholder', '$first', '$last', '$email', '$cID' $addValues)";


    $result = $mysqli->query($insertNewEmployee);
    header("Location: ../employee.php");

?>