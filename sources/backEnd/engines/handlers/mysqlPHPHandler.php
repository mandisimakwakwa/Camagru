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

    //Register User to DB
    function ft_register($dbConn, $httpEmail, $httpUsername, $httpPassword) {

        //Send Confirmation Email
        /*$email = "kt2jh@uscaves.com";
        $subject = ucfirst($httpUsername)." Validation";
        $message = "<a href='#'>Click Here</a> to Validate";
        $message = wordwrap($message, 70, "\r\n");
        $retMail = mail($email, $subject, $message);

        //Confirmation Email Return
        if ($retMail) {

            echo "email sent";
        } else {

//            echo "email failed";
        }*/

        $dbQuery = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':email', $httpEmail);
        $preparedStatement->bindParam(':username', $httpUsername);
        $preparedStatement->bindParam(':password', $httpPassword);
        $preparedStatement->execute();
    }

    //Get User Email from DB
    function ft_getUserDBEmail($dbConn, $httpRegisterEmail, $httpRegisterPassword) {

        $dbQuery = "SELECT email FROM users WHERE email=:email AND password=:password";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':email', $httpRegisterEmail);
        $preparedStatement->bindParam(':password', $httpRegisterPassword);
        $preparedStatement->execute();

        $queryResult = $preparedStatement->fetch();
        $dbEmail = $queryResult[0];

        return $dbEmail;
    }

    //Get User Username from DB
    function ft_getUserDBUsername($dbConn, $httpRegisterEmail, $httpRegisterPassword) {

        $dbQuery = "SELECT username FROM users WHERE email=:email AND password=:password";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':email', $httpRegisterEmail);
        $preparedStatement->bindParam(':password', $httpRegisterPassword);
        $preparedStatement->execute();

        $queryResult = $preparedStatement->fetch();
        $dbUsername = ucfirst(strtolower($queryResult[0]));

        return $dbUsername;
    }

    //Get User Password from DB
    function ft_getUserDBPassword($dbConn, $httpRegisterEmail, $httpRegisterPassword) {

        $dbQuery = "SELECT password FROM users WHERE email=:email AND password=:password";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':email', $httpRegisterEmail);
        $preparedStatement->bindParam(':password', $httpRegisterPassword);
        $preparedStatement->execute();

        $queryResult = $preparedStatement->fetch();
        $dbPassword = $queryResult[0];

        return $dbPassword;
    }

?>