<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Session Start
session_start();


//DB Connection Variables
$dbConnDSN = $_SESSION['dbConnDSN'];
$dbConnUser = $_SESSION['dbConnUser'];
$dbConnPassword = $_SESSION['dbConnPassword'];
$dbConnName = $_SESSION['dbConnName'];

//Establish Network Connection
$dbConn = ft_getConnection($dbConnDSN, $dbConnUser, $dbConnPassword);
ft_useCamagru($dbConn,$dbConnName);

//Session Set Error Log
$_SESSION['errorLog'] = "Error DB Conn Failed user images not Retrieved";

//Global Variables
    //Read Pics From DB and Convert to Thumbnails
    $sumOfImageArrayContents = ft_getUserImageSum($dbConn);

    //Pagination
    $itemsPerPageLimiter = 5;
    $sumOfPages = $sumOfImageArrayContents/$itemsPerPageLimiter;
?>

<aside class="sectionAsideClass">

    <div>

        <button id="logoutButtonID"
                onclick="ft_logout()">Logout</button>
    </div>
    <div>
        <?php
        ?>
    </div>
    <div class="buttonContainer">
        <button>Prev</button>
        <button>Next</button>
    </div>
</aside>
