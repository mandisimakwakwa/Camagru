<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Create USE DB query
function ft_useCamagru($dbConn, $dbConnName) {

    $dbQuery = "USE $dbConnName";
    ft_queryExecute($dbConn, $dbQuery);
}

//Create Camagru if it doesn't exist query
function ft_createDB($dbConn, $dbConnName) {

    $dbQuery = "CREATE DATABASE IF NOT EXISTS $dbConnName";
    ft_queryExecute($dbConn, $dbQuery);

}

//Create users Table query
function ft_createUsersTable($dbConn) {

    $dbQuery = "CREATE TABLE IF NOT EXISTS users (
                email VARCHAR(72) NOT NULL,
                password VARCHAR(66),
                username VARCHAR(30),
                userID INT(8) AUTO_INCREMENT,
                PRIMARY KEY (userID),
                UNIQUE (email, username));";
    ft_queryExecute($dbConn, $dbQuery);
    ft_autoIncrementSet($dbConn);
}

function ft_autoIncrementSet($dbConn) {

    $dbQuery  = "ALTER TABLE users AUTO_INCREMENT=1250";
    ft_queryExecute($dbConn, $dbQuery);
}

//Create gallery table query
function ft_createGalleryTable($dbConn)
{

    $dbQuery = "CREATE TABLE IF NOT EXISTS gallery (
                imageID VARCHAR(66),
                imageContent VARCHAR(50000000),
                username VARCHAR(30),
                insertTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (imageID));";
    ft_queryExecute($dbConn, $dbQuery);
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