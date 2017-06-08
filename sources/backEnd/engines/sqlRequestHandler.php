<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Create USE DB query
function ft_useCamagru($dbConn, $dbName)
{

    $dbQuery = "USE $dbName";

    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->execute();
}

//Create Camagru if it doesn't exist query
function ft_createDB($dbConn, $db_name) {

    $dbQuery = "CREATE DATABASE IF NOT EXISTS $db_name";

    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->execute();
}

//Create users Table query
function ft_createUsersTable($dbConn) {

    $dbQuery = "CREATE TABLE IF NOT EXISTS users (
                email VARCHAR(72) NOT NULL,
                username VARCHAR(30),
                password VARCHAR(66),
                userID INT(8) AUTO_INCREMENT,
                PRIMARY KEY (userID),
                UNIQUE (email, userName));";

    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->execute();
    ft_autoIncrementSet($dbConn);
}

//Set Auto Increment Start Value
function ft_autoIncrementSet($dbConn) {

    $dbQuery  = "ALTER TABLE users AUTO_INCREMENT=1250";

    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->execute();
}

//Create gallery table query
function ft_createGalleryTableQuery($db_name)
{

    $dbQuery = "CREATE TABLE IF NOT EXISTS gallery (
                imageID INT(8) NOT NULL AUTO_INCREMENT	,
                imageTitle VARCHAR(66),
                userID INT(8) NOT NULL,
                imageStatus BOOLEAN,
                creationDate TIMESTAMP,
                PRIMARY KEY (imageID));";
    return $dbQuery;
}

//Create Social Network Features table query
function ft_createSNFTableQuery($db_name)
{

    $dbQuery = "CREATE TABLE IF NOT EXISTS socialNetworks (
                        imageID INT(8) NOT NULL AUTO_INCREMENT,
                        comment_text VARCHAR(500),
                        userID INT(8) NOT NULL,
                        upvoteDate TIMESTAMP ,
                        PRIMARY KEY (imageID));";
    return $dbQuery;
}

//Debug Connection to sqlRequestHandler.php
function ft_checksqlRequestHandler()
{

    echo 'sqlRequestHandler.php is accessible<br>';
}