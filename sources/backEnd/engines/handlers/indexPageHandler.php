<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/engines/controllers/phpPathController.php';

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

        case "REGISTER":

            ft_sessionStateRegister($dbConn, $decodedHTTPJSON);
            break;
        case "LOGIN" :

            ft_sessionStateLogin($dbConn, $decodedHTTPJSON);
            break;
        /*default :

            ft_sessionStateError();
            break;*/
    }

    //Debug Connection to indexPageHandler.php
    function ft_checkIndexPageHandler() {

        echo 'indexPageHandler.php is accessible<br>';
    }

    /*
        Email Functionality

        $to = "y8ztf@uscaves.com";
        $subject = "My subject";
        $txt = "I dided it. :)";
        $headers = "From: mandisi.makwakwa@gmail.com";

        echo (mail($to,$subject,$txt,$headers));
    */
?>