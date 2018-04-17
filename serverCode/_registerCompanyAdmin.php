<?php

    if(!isset($_POST["txtUsername"])){
        header("Location: ../index.php");
    }

    require "_connect.php";

    $error = "";

    function throwException(){
        global $error;
        if ($error !== ""){
            throw new Exception($error);
        }
    }
    
    function mysqlInsertQuery($query){
        global $mysqli, $error;
        
        $result = $mysqli->query($query);
        $error .= mysqli_error($mysqli);
        
        throwException();
        
        return $result;
    }

    function mysqlGetCompanyID($query){
        global $mysqli, $error;
        
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();
        $error .= mysqli_error($mysqli);
        
        throwException();
        
        return $row["cID"];
    }

try{
    
    $companyName = $_POST["txtComName"];
    $username = $_POST["txtUsername"];
    $password = $_POST["txtPassword"];
    $first = $_POST["txtFirst"];
    $last = $_POST["txtLast"];
    $email = $_POST["txtEmail"];
    
    $addColumn = "";
    $addValues = "";
    
    $companyName = strtolower($companyName);
    $companyName = ucwords($companyName);
    $username = strtolower($username);
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

    $companyInsertQuery = "INSERT INTO COMPANY(cName, cAdmin) 
                        VALUES('$companyName', '$username')";

    $getCompanyIDQuery = "SELECT cID FROM COMPANY WHERE cAdmin = '$username'";
    
    mysqlInsertQuery($companyInsertQuery, $mysqli);

    $companyID = mysqlGetCompanyID($getCompanyIDQuery, $mysqli);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $userInsertQuery = "INSERT INTO USER(userName, userPassword, userFirst, userLast, userEmail, secID, cID $addColumn) VALUES('$username', '$hashedPassword', '$first', '$last', '$email', '1', '$companyID' $addValues)";
    
    $sectionInsertQuery = "INSERT INTO SECTION(secName, cID) VALUES('Manager', '$companyID')";

    mysqlInsertQuery($userInsertQuery, $mysqli);

    if(isset($_FILES["fLogo"])){
        
        $uploadCheck = getimagesize($_FILES["fLogo"]["tmp_name"]);

        if($uploadCheck !== false){
            if($_FILES["fLogo"]["size"] < 3000000){
                $upload_dir = "../logo/";
                $temp = explode(".", $_FILES["fLogo"]["name"]);
                $newFileName = $companyID . "." . end($temp);
                move_uploaded_file($_FILES["fLogo"]["tmp_name"], $upload_dir . $newFileName);
            }
        }
    }
    
    header("Location: ../subscribe.php");


}
catch (Exception $e){
    echo $e->getMessage();
    echo "<a href='../index.php'> Go Home</a>";
}

?>
    