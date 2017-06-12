<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

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

//Check Session State
if ($decodedHTTPJSON['SessionState'] == 'LOGIN') {

    //Set Sessions
    $_SESSION['httpLoginEmail'] = ft_validator($decodedHTTPJSON['httpLoginEmail']);
    $_SESSION['httpLoginPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpLoginPassword']));

    //Debugger
        //Debug Login Session State
        //echo "Login Session State Works";
        //Debug Session
//        ft_sessionDebug($_SESSION);
} elseif ($decodedHTTPJSON['SessionState'] == 'REGISTER') {

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

    //Debugger
        //Debug Register Session State
        //echo "Register Session State Works";
        ft_sessionDebug($_SESSION);
} else {

    //Debug NULL Session State
//    echo "Session State is NULL";
}

//Debug Session
//ft_sessionDebug($_SESSION);

//Get Filename
function ft_getFileName($filePathInfo) {

    return basename($filePathInfo, ".php");
}

//Debug Sessions
function ft_sessionDebug($session) {

    print_r($session);
}

//Debug Connection to phpRequestHandler.php
function ft_checkPHPRequestHandler() {

    echo 'phpRequestHandler.php is accessible<br>';
}