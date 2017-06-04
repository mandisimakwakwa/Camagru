<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Handle HTTP Requests
$getHTTPJSON = file_get_contents("php://input");
$decodedHTTPJSON = json_decode($getHTTPJSON, true);

//Decode Encoded HTTPJSON and SET SESSIONS
ft_decodeHTTPJSON($decodedHTTPJSON);

//Get Encoded HTTPJSON and Decode it
function ft_decodeHTTPJSON($decodedHTTPJSON)
{

    //Set Email Session
    $httpEmail = $decodedHTTPJSON['httpEmail'];

    //Set Password Session
    $httpPassword = $decodedHTTPJSON['httpPassword'];

    //Set Session State
    $httpSessionState = $decodedHTTPJSON['SessionState'];
}

//Get Filename
function ft_getFileName($filePathInfo)
{

    return basename($filePathInfo, ".php");
}

//Debug Connection to phpRequestHandler.php
function ft_checkPHPRequestHandler()
{

    echo 'phpRequestHandler.php is accessible<br>';
    }