<?php
    $username = $_SESSION['username'];
    $userFirst = $_SESSION['userFirst'];
    $userLast = $_SESSION['userLast'];
    $cName = $_SESSION['cName'];
    $fullName= $userFirst . " " . $userLast . " " . "<b>" . $cName . "</b>";
    $cID = $_SESSION['cID'];
    $img = "";
    $imgTypes = ["png", "jpeg", "jpg"];

    foreach($imgTypes as $type){
        if (getimagesize("logo/$cID.".$type) !== false) {
            $img = "<img id='logo' src='logo/$cID.$type'>";
            break 1;
        }
    }
    

    $head = "<header>
                <div id='topRight'>
                    $fullName 
                        <br>
                    <a href='serverCode/logout.php'>logout</a>
                </div>
                    
                <div id='topLeft'>
                        <h1>Elm Scheduling</h1>
                </div>
            </header>";

?>