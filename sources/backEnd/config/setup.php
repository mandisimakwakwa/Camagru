<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Global Variables
$dsn = $GLOBALS['DB_DSN'];
$user = $GLOBALS['DB_USER'];
$password = $GLOBALS['DB_PASSWORD'];
$dbNameVariable = $GLOBALS['DB_NAME'];

//Session Creator
session_start();

//HTTP User Name
$_SESSION['httpUsername'] = "";
//HTTP Email
$_SESSION['httpEmail'] = "";
//HTTP Password
$_SESSION['httpPassword'] = "";
//HTTP Recheck Password
$_SESSION['httpReCheckPassword'] = "";
//DB User Name
$_SESSION['db_username'] = "";
//DB Email
$_SESSION['db_email'] = "";
//DB Password
$_SESSION['db_password'] = "";
//DB Pic Likes
$_SESSION['db_picturelikes'] = "";
//Header User Check
$_SESSION['checkPageType'] = "";
//Login Check
$_SESSION['confirmLogin'] = "-1";

//Get Connection
function ft_getConnection($dsn, $user, $password)
{

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