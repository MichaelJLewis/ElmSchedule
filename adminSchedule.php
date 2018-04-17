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
                
                
                <select id='secDrop'>

                </select>
                
                    <div id='scheduleContainer' class='box'>
                        <div id='monday' class='column'>
                            <div class='topBar'>
                                <h3>Monday</h3>
                                <input type='hidden' value='1'>
                                <a class='edit'>edit</a>
                                <select class='userDrop'>

                                </select>
                            </div>
                            <div>
                            </div>
                        </div>

                        <div id='tuesday' class='column'>
                            <div class='topBar'>
                                <h3>Tuesday</h3>
                                <input type='hidden' value='2'>
                                <a class='edit'>edit</a>
                                <select class='userDrop'>

                                </select>
                            </div>
                        </div>

                        <div id='wednesday' class='column'>
                            <div class='topBar'>
                                <h3>Wednesday</h3>
                                <input type='hidden' value='3'>
                                <a class='edit'>edit</a>
                                <select class='userDrop'>

                                </select>
                            </div>
                        </div>

                        <div id='thursday' class='column'>
                            <div class='topBar'>
                                <h3>Thursday</h3>
                                <input type='hidden' value='4'>
                                <a class='edit'>edit</a>
                                <select class='userDrop'>

                                </select>
                            </div>

                        </div>

                        <div id='friday' class='column'>
                            <div class='topBar'>
                                <h3>Friday</h3>
                                <input type='hidden' value='5'>
                                <a class='edit'>edit</a>
                                <select class='userDrop'>

                                </select>
                            </div>

                        </div>

                        <div id='saturday' class='column'>
                            <div class='topBar'>
                                <h3>Saturday</h3>
                                <input type='hidden' value='6'>
                                <a class='edit'>edit</a>
                                <select class='userDrop'>

                                </select>
                            </div>

                        </div>

                        <div id='sunday' class='column'>
                            <div class='topBar'>
                                <h3>Sunday</h3>
                                <input type='hidden' value='7'>
                                <a class='edit'>edit</a>
                                <select class='userDrop'>

                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </body>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <script src='clientCode/script.js'></script>
        </html>";

    echo $doc;

?>
