<?php

    //Create Camagru if it doesn't exist query
    function ft_createDB($dbConn, $dbConnName) {

        $dbQuery = "CREATE DATABASE IF NOT EXISTS $dbConnName";
        ft_queryExecute($dbConn, $dbQuery);
    }

    //Query Execute Function
    function ft_queryExecute($dbConn, $dbQuery) {

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->execute();
    }

    //Create USE DB query
    function ft_useCamagru($dbConn, $dbConnName) {

        $dbQuery = "USE $dbConnName";
        ft_queryExecute($dbConn, $dbQuery);
    }


    //Create users Table query
    function ft_createUsersTable($dbConn) {

        //Regular Spacing Not Implemented Due to nature of query.
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
?>