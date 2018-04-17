<?php

session_start();

if(!isset($_SESSION["username"])){
    
    header("Location: index.php");
}

    require "phpDisplay/header.php";
    require "phpDisplay/menu.php";


    $doc = "<!DOCTYPE html>
        <html>
			<head>
                <meta name='viewport' content='width=device-width'>
				<title>Elm Schedule</title>
                <link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css'>
                <link rel='stylesheet' href='style.css'>
			</head>
			<body>
                <div id='container'>
                    $head
                    $menu
                    <div id='error'>
                    </div>
                    <form action='serverCode/_registerEmployee.php' method='POST'>
                    <h2>Employee Information</h2>
                        <h3>First Name:</h3>
                            <input id='txtFirst' name='txtFirst' type='textbox'>*
                        <h3>Last Name:</h3>
                            <input id='txtLast' name='txtLast' type='textbox'>*
                        <h3>E-mail:</h3>
                            <input id='txtEmail' name='txtEmail' type='email'>*
                        <h3>Phone:</h3>
                            <input id='txtPhone' name='txtPhone' type='tel'>
                        <h3>Provider:</h3>
                            <select name='dropProvider' id='dropProvider'></select>
                        
                    <h2>Section/Wage</h2>
                        <h3>Section:</h3>
                            <select name='secDrop' id='secDrop'></select>
                        <h3>Wage(hourly Ex: 14.00):</h3>
                            <input id='txtWage' type='text'> 
                    </form>
                        <input type='button' id='btnSubmitEmployee' value='Add'>   <p>A Username and Password will be emailed to this person</p>
                        
                </div>
			</body>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='clientCode/script.js'></script>
		</html>";

    echo $doc;


?>