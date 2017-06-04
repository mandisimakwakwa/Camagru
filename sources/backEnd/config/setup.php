<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Session Creator
session_start();

//Global Variables
$dbConnDSN = $GLOBALS['DB_DSN'];
$dbConnUser = $GLOBALS['DB_USER'];
$dbConnPassword = $GLOBALS['DB_PASSWORD'];
$dbConnName = $GLOBALS['DB_NAME'];

//HTTP Sessions
    //HTTP Register Email
    $_SESSION['httpRegisterEmail'] = "";
    //HTTP Register Password
    $_SESSION['httpRegisterPassword'] = "";
    //HTTP Register User Name
    $_SESSION['httpRegisterUsername'] = "";
    //HTTP Register Password
    $_SESSION['httpRegisterPassword'] = "";
    //HTTP Register Confrim Password
    $_SESSION['httpRegisterConfirmPassword'] = "";
    //HTTP Login Email
    $_SESSION['httpLoginEmail'] = "";
    //HTTP Login Password
    $_SESSION['httpLoginPassword'] = "";

//DB Sessions
    //DB User Name
    $_SESSION['dbUsername'] = "";
    //DB Email
    $_SESSION['dbEmail'] = "";
    //DB Password
    $_SESSION['dbPassword'] = "";
    //DB Pic Likes
    $_SESSION['dbPicturelikes'] = "";

//DB Connection Sessions
    //DB DSN
    $_SESSION['dbConnDSN'] = $dbConnDSN;
    //DB Username
    $_SESSION['dbConnUser'] = $dbConnUser;
    //DB Password
    $_SESSION['dbConnPassword'] = $dbConnPassword;
    //DB Name
    $_SESSION['dbConnName'] = $dbConnName;

//Header User Check
$_SESSION['checkPageName'] = "";
//Login Check
$_SESSION['confirmLogin'] = "-1";

//Get Connection
function ft_getConnection($dbConnDSN, $dbConnUser, $dbConnPassword) {

    //Try Connection
    try {

        $dbConn = new PDO($dbConnDSN, $dbConnUser, $dbConnPassword);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    } catch (PDOException $exception) {

        echo "Connection Failure Due To: " . $exception->getMessage() . PHP_EOL;
    }
}

//Debug Connection to setup.php
function ft_checkSetupLinking() {

    echo 'setup.php is accessible<br>';
}