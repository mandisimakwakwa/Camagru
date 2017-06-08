<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

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
$dbQuery = ft_createDBQuery($dbConnName);
$preparedStatement = $dbConn->prepare($dbQuery);
$preparedStatement->execute();

//Check Session State
if ($decodedHTTPJSON['SessionState'] == 'LOGIN') {

    //Set Sessions
    $_SESSION['httpLoginEmail'] = ft_validator($decodedHTTPJSON['httpLoginEmail']);
    $_SESSION['httpLoginPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpLoginPassword']));

    //Debug Login Session State
//    echo "Login Session State Works";
} elseif ($decodedHTTPJSON['SessionState'] == 'REGISTER') {

    //Set Sessions
    $_SESSION['httpRegisterEmail'] = ft_validator($decodedHTTPJSON['httpRegisterEmail']);
    $_SESSION['httpRegisterUsername'] = ft_validator($decodedHTTPJSON['httpRegisterUsername']);
    $_SESSION['httpRegisterPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpRegisterPassword']));
    $_SESSION['httpRegisterConfirmPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpRegisterConfirmPassword']));

    //Debug Register Session State
//    echo "Register Session State Works";
} else {

    //Debug NULL Session State
//    echo "Session State is NULL";
}

ft_sessionDebug($_SESSION);

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