<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/engines/controllers/phpPathController.php";

    //Session Creator
    session_start();

    //Global Variables
    //Handle HTTP Requests
    $getHTTPJSON = file_get_contents("php://input");
    $decodedHTTPJSON = json_decode($getHTTPJSON, true);

    //DB Connection Variables
    $dbConnDSN = $_SESSION['dbConnDSN'];
    $dbConnUser = $_SESSION['dbConnUser'];
    $dbConnPassword = $_SESSION['dbConnPassword'];
    $dbConnName = $_SESSION['dbConnName'];

    //Establish Network Connection
    $dbConn = ft_getConnection($dbConnDSN, $dbConnUser, $dbConnPassword);

    //Create DB if Not Exists
    ft_createDB($dbConn, $dbConnName);

    //Use Camagru DB
    ft_useCamagru($dbConn, $dbConnName);

    //Create users Table & Set Auto Increment
    ft_createUsersTable($dbConn);

    //Create gallery table query
    ft_createGalleryTable($dbConn);

    $sessionState = $decodedHTTPJSON['SessionState'];

    switch ($sessionState) {

        /*case "LAYER" :

            ft_sessionStateLayer($decodedHTTPJSON);
            break;*/
        case "IMAGESAVE" :

            ft_sessionStateImageSave($dbConn, $decodedHTTPJSON);
            break;

        case "UPLOAD" :

            ft_sessionStateUpload($dbConn, $decodedHTTPJSON);
            break;
    }

    //Debug Connection to galleryHandler.php
    function ft_checkGalleryHandler() {

        echo 'galleryHandler.php is accessible<br>';
    }
?>