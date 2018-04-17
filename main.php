<?php

session_start();

if(!isset($_SESSION["username"])){
    
    header("Location: index.php");
}

    require "phpDisplay/header.php";
    require "phpDisplay/menu.php";

    $username = $_SESSION['username'];
    $userFirst = $_SESSION['userFirst'];
    $userLast = $_SESSION['userLast'];
    $cName = $_SESSION['cName'];
    $message = $userFirst . " " . $userLast . " " . "<b>" . $cName . "</b>";
    $cID = $_SESSION['cID'];

$doc = "<!DOCTYPE html>
        <html>
			<head>
                <meta name='viewport' content='width=device-width'>
				<title>Landlord Ratings</title>
                <link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css'>
                <link rel='stylesheet' href='style.css'>
			</head>
			<body>
                
                $head
                
                <div id='container'>
                    $menu
                    
                    <div id='weekSchedule'>
                    
                    </div>
                </div>
			</body>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='clientCode/script.js'></script>
		</html>";

 
echo $doc;