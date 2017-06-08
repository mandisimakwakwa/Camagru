<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/controllers/relativePathController.php';

//Session Start
session_start();

//Validator function to check for injections
function ft_validator($userInputSample) {

    $userInputSample = trim($userInputSample);
    $userInputSample = stripslashes($userInputSample);
    $userInputSample = htmlspecialchars($userInputSample);
    return $userInputSample;
}

//Decode Param Array From Server into ASSOC Array then JSON
function ft_jsonDecodeNice($json, $assoc = TRUE) {

    $json = str_replace(array("\n", "\r"), "\\n", $json);
    $json = preg_replace('/([{,]+)(\s*)([^"]+?)\s*:/', '$1"$3":', $json);
    $json = preg_replace('/(,)\s*}$/', '}', $json);
    return json_decode($json, $assoc);
}

function ft_register($dbConn, $httpEmail, $httpUsername, $httpPassword) {

    $dbQuery = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->bindParam(':email', $httpEmail);
    $preparedStatement->bindParam(':username', $httpUsername);
    $preparedStatement->bindParam(':password', $httpPassword);
    $preparedStatement->execute();
}

//Debug Connection to camagruDTO.php
function ft_checkCamagruDTO() {

    echo 'camagruDTO.php is accessible<br>';
}