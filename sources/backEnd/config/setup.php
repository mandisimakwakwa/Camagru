<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Session Creator
session_start();

//Global Variables
    //HTTP Login Sessions
    $_SESSION['httpLoginEmail'];
    $_SESSION['httpLoginPassword'];

    //HTTP Register Sessions
    $_SESSION['httpRegisterEmail'];
    $_SESSION['httpRegisterUsername'];
    $_SESSION['httpRegisterPassword'];
    $_SESSION['httpRegisterConfirmPassword'];

    //DB User Sessions
    $_SESSION['userDBEmail'];
    $_SESSION['userDBUsername'];
    $_SESSION['userDBPassword'];

    //Misc Sessions
    $_SESSION['errorLog'];
    //DB Pic Likes
    $_SESSION['db_picturelikes'];
    //Header User Check
    $_SESSION['checkPageName'];
    //Login Check
    $_SESSION['confirmLogin'] = "-1";

//ft_sessionDebug($_SESSION);

//Get Connection
function ft_getConnection($dsn, $user, $password) {

    //Try Connection
    try {

        $dbConn = new PDO($dsn, $user, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    } catch (PDOException $exception) {

        echo "Connection Failure Due To: " . $exception->getMessage() . PHP_EOL;
    }
}

//Debug Connection to setup.php
function ft_checkSetupLinking()
{

    echo 'setup.php is accessible<br>';
}