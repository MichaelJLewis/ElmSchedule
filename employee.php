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
                <div id='container'>
                    $head
                    $menu
                    <h1>Employees</h1>
                    <form action='addEmployee.php' method='get'>
                    </form>
                    <input type='button' id='btnAddEmployee' value='New Employee'>
                    <input type='button' id='btnBatchAddEmployee' value='Add Employee CSV'>
                    <input type='button' id='btnOpenSection' value='New Section'>
                    <input type='button' id='btnEditSection' value='Edit Sections'>
                    
                    
                    <div id='error'>
                    </div>
                    
                    <div id='divBrowseCsv'>
                        <p>*Rename your columns to: section for the employee's section ex:Server or Kitchen, fName for first name, lName for last name, email for emails, number for cell phone numbers, and wage for wages*</p>
                        <form action='serverCode/_parseCSV.php' method='POST'>
                        <input id='fileCSV'name='csv' type='file' accept='.csv'>
                        </form>
                        <input type='button' id='btnSubmitBatch' value='Submit CSV'>
                    </div>
                    
                    <div id='divEditSec'>
                    </div>
                    
                    <div id='divAddSection'>
                        <input type='textbox' id='txtSection'>
                        <select class='userDrop'></select>
                        <input type='button' id='btnAddSection'>
                    </div>
                    <div id='employeeContainer'>
                    </div>
                </div>
			</body>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='clientCode/script.js'></script>
		</html>";

 
echo $doc;

?>