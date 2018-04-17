<?php

session_start();

if(isset($_SESSION["username"])){
    header("Location: main.php");
}

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
                    <div id='loginError'>
                    </div>
                    <form action='main.php' method='POST'>
                        <input id='txtUsername' type='textbox'>
                        <input id='txtPassword' type='password'>
                        <span>Don't have an account?</span><a href='registerAdmin.php'> Register</a>
                    </form>
                    <input id='btnLogin' type='button' value='Login'>
                </div>
			</body>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='clientCode/script.js'></script>
		</html>";

 
echo $doc;