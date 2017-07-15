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

    //Session Set Error Log
    $_SESSION['errorLog'] = "Error Login and Password Don't Match";

    //Create DB if Not Exists
    ft_createDB($dbConn, $dbConnName);

    //Use Camagru DB
    ft_useCamagru($dbConn, $dbConnName);

    //Check Session State
    if ($decodedHTTPJSON['SessionState'] == 'REGISTER') {

        //Set Sessions
        $_SESSION['httpRegisterEmail'] = ft_validator($decodedHTTPJSON['httpRegisterEmail']);
        $_SESSION['httpRegisterUsername'] = ft_validator($decodedHTTPJSON['httpRegisterUsername']);
        $_SESSION['httpRegisterPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpRegisterPassword']));
        $_SESSION['httpRegisterConfirmPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpRegisterConfirmPassword']));

        //Register User
            //Create users Table & Set Auto Increment
            ft_createUsersTable($dbConn);


        //Store User In DB
        $httpRegisterEmail = $_SESSION['httpRegisterEmail'];
        $httpRegisterUsername = $_SESSION['httpRegisterUsername'];
        $httpRegisterPassword = $_SESSION['httpRegisterPassword'];

        //Assign User HTTP values to DB
        ft_register($dbConn, $httpRegisterEmail, $httpRegisterUsername, $httpRegisterPassword);

        //Set DB Sessions
        $_SESSION['userDBEmail'] = ft_getUserDBEmail($dbConn, $httpRegisterEmail, $httpRegisterPassword);
        $_SESSION['userDBUsername'] = ft_getUserDBUsername($dbConn, $httpRegisterEmail, $httpRegisterPassword);
        $_SESSION['userDBPassword'] = ft_getUserDBPassword($dbConn, $httpRegisterEmail, $httpRegisterPassword);

        //Validate User
        if (($httpRegisterEmail == $_SESSION['userDBEmail']) && ($httpRegisterPassword == $_SESSION['userDBPassword'])) {

            echo $_SESSION['confirmLogin'] = "1";
        } else {

            echo $_SESSION['confirmLogin'] = "0";
            echo $_SESSION['errorLog'];
        }
    } elseif ($decodedHTTPJSON['SessionState'] == 'LOGIN') {

        //Set Sessions
        $_SESSION['httpLoginEmail'] = ft_validator($decodedHTTPJSON['httpLoginEmail']);
        $_SESSION['httpLoginPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpLoginPassword']));
        $_SESSION['confirmLogin'] = "1";

        //Retrieve User From DB
        $httpLoginEmail = $_SESSION['httpLoginEmail'];
        $httpLoginUsername = $_SESSION['httpLoginUsername'];
        $httpLoginPassword = $_SESSION['httpLoginPassword'];

        //Set DB Sessions
        $_SESSION['userDBEmail'] = ft_getUserDBEmail($dbConn, $httpLoginEmail, $httpLoginPassword);
        $_SESSION['userDBUsername'] = ft_getUserDBUsername($dbConn, $httpLoginEmail, $httpLoginPassword);
        $_SESSION['userDBPassword'] = ft_getUserDBPassword($dbConn, $httpLoginEmail, $httpLoginPassword);

        if (($_SESSION['userDBEmail'] == $httpLoginEmail) && ($_SESSION['userDBPassword'] == $httpLoginPassword)) {

            //Send Client-Side Response
            echo $_SESSION['confirmLogin'];
        } else {

            echo $_SESSION['confirmLogin'] = "0";
            echo $_SESSION['errorLog'];
        }
    } else {
        //Debug NULL Session State
    //    echo "Session State is NULL";
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