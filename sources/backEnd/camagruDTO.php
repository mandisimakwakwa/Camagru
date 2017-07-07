<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/controllers/relativePathController.php';

//Session Start
session_start();

//Validator function to check for injections
function ft_validator($userInputSample)
{

    $userInputSample = trim($userInputSample);
    $userInputSample = stripslashes($userInputSample);
    $userInputSample = htmlspecialchars($userInputSample);
    return $userInputSample;
}

//Decode Param Array From Server into ASSOC Array then JSON
function ft_jsonDecodeNice($json, $assoc = TRUE)
{

    $json = str_replace(array("\n", "\r"), "\\n", $json);
    $json = preg_replace('/([{,]+)(\s*)([^"]+?)\s*:/', '$1"$3":', $json);
    $json = preg_replace('/(,)\s*}$/', '}', $json);
    return json_decode($json, $assoc);
}

//Query Execute Function
function ft_queryExecute($dbConn, $dbQuery) {

    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->execute();
}

//Image Data into DB
function ft_imageDBUpload($dbConn, $dbUsername, $imageID, $imageContent) {

    $dbQuery = "INSERT INTO gallery (imageID, imageContent, username) VALUES (:imageID, :imageContent, :username)";

    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->bindParam(':imageID', $imageID);
    $preparedStatement->bindParam(':imageContent', $imageContent);
    $preparedStatement->bindParam(':username', $dbUsername);
    $preparedStatement->execute();
}

//Get The Sum Total of Images in Gallery
function   ft_getUserImageSum($dbConn){

    $username = $_SESSION['userDBUsername'];

    $dbQuery = "SELECT imageContent FROM gallery WHERE username=:username";

    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->bindParam(':username', $username);
    $preparedStatement->execute();

    $queryResult = $preparedStatement->fetchAll(PDO::FETCH_COLUMN);
    return count($queryResult);
}

//Get The Content of Images in Gallery
function   ft_getUserImages($dbConn){

    $username = $_SESSION['userDBUsername'];

    $dbQuery = "SELECT imageContent FROM gallery WHERE username=:username ORDER BY insertTime DESC";

    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->bindParam(':username', $username);
    $preparedStatement->execute();

    $queryResult = $preparedStatement->fetchAll(PDO::FETCH_COLUMN);
    return $queryResult;
}

//Debug Connection to camagruDTO.php
function ft_checkCamagruDTO()
{

    echo 'camagruDTO.php is accessible<br>';
}