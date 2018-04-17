<?php
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
                    <div id='error'>
                    </div>
                    <form action='serverCode/_registerCompanyAdmin.php' method='POST' enctype='multipart/form-data'>
                    <h2>Company Information</h2>
                        <h3>Company Name:</h3>
                            <input id='txtComName' name='txtComName' type='text'>*
                        <h3>Company Logo:</h3>
                            <input id='fLogo' name='fLogo' type='file' accept='.jpg, .png, .jpeg'>
                    <h2>User Information</h2>
                        <h3>User Name:</h3>
                            <input id='txtUsername' name='txtUsername' type='textbox'>*
                        <h3>Password:</h3>
                            <input id='txtPassword' name='txtPassword' type='password'>*
                        <h3>Confirm Password:</h3>
                            <input id='txtConfirmPassword' name='txtConfirmPassword' type='password'>*
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
                    </form>
                        <input type='button' id='btnRegister' value='Register'>
                        
                    <!--<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
                        <input type='hidden' name='cmd' value='_s-xclick'>
                        <input type='hidden' name='hosted_button_id' value='YNS853UZNTAWC'>
                        <input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
                        <img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
                    </form>-->


                </div>
			</body>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='clientCode/script.js'></script>
		</html>";

    echo $doc;

?>