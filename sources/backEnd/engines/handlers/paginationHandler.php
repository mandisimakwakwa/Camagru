<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/engines/controllers/phpPathController.php";

//Session Start
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

//Use Camagru DB
ft_useCamagru($dbConn, $dbConnName);

//Session Set Error Log
$_SESSION['errorLog'] = "Error Gallery Setup Failed.";

// $decodedHTTPJSON['SessionState'] == "IMG"
if ($decodedHTTPJSON['SessionState']) {

    //Set Up Gallery Variables
} else {

    echo $_SESSION['errorLog'];
}
?>