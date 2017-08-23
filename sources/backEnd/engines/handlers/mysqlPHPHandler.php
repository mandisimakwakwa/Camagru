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
        $email = $httpEmail;
        $subject = ucfirst($httpUsername)." Validation";
        $message = "This is a confirmation email to validate you have successfully registered with Camagru.";
        $message = wordwrap($message, 70, "\r\n");
        $retMail = mail($email, $subject, $message);

        //Confirmation Email Return
        if ($retMail) {

            $dbQuery = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";

            $preparedStatement = $dbConn->prepare($dbQuery);
            $preparedStatement->bindParam(':email', $httpEmail);
            $preparedStatement->bindParam(':username', $httpUsername);
            $preparedStatement->bindParam(':password', $httpPassword);
            $preparedStatement->execute();
        }
    }

    //Get User Email from DB
    function ft_getUserDBEmail($dbConn, $httpEmail, $httpPassword) {

        $dbQuery = "SELECT email FROM users WHERE email=:email AND password=:password";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':email', $httpEmail);
        $preparedStatement->bindParam(':password', $httpPassword);
        $preparedStatement->execute();

        $queryResult = $preparedStatement->fetch();
        $dbEmail = $queryResult[0];

        return $dbEmail;
    }

    //Get User Username from DB
    function ft_getUserDBUsername($dbConn, $httpEmail, $httpPassword) {

        $dbQuery = "SELECT username FROM users WHERE email=:email AND password=:password";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':email', $httpEmail);
        $preparedStatement->bindParam(':password', $httpPassword);
        $preparedStatement->execute();

        $queryResult = $preparedStatement->fetch();
        $dbUsername = ucfirst(strtolower($queryResult[0]));

        return $dbUsername;
    }

    //Get User Password from DB
    function ft_getUserDBPassword($dbConn, $httpEmail, $httpPassword) {

        $dbQuery = "SELECT password FROM users WHERE email=:email AND password=:password";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':email', $httpEmail);
        $preparedStatement->bindParam(':password', $httpPassword);
        $preparedStatement->execute();

        $queryResult = $preparedStatement->fetch();
        $dbPassword = $queryResult[0];

        return $dbPassword;
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

    //Image Data into DB
    function ft_imageDBUpload($dbConn, $dbUsername, $imageID, $imageContent) {

        $dbQuery = "INSERT INTO gallery (imageID, imageContent, username) VALUES (:imageID, :imageContent, :username)";

        $preparedStatement = $dbConn->prepare($dbQuery);

        $preparedStatement->bindParam(':imageID', $imageID);
        $preparedStatement->bindParam(':imageContent', $imageContent);
        $preparedStatement->bindParam(':username', $dbUsername);

        $preparedStatement->execute();
    }

    //Get The Sum Total of User Images in Gallery
    function   ft_getUserImageSum($dbConn){

        $username = $_SESSION['userDBUsername'];

        $dbQuery = "SELECT imageContent FROM gallery WHERE username=:username";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':username', $username);
        $preparedStatement->execute();
        $queryResult = $preparedStatement->fetchAll(PDO::FETCH_COLUMN);

        return count($queryResult);
    }

    //Get The Sum Total of Images in Gallery
    function   ft_getImageSum($dbConn){

        $dbQuery = "SELECT imageContent FROM gallery";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->execute();
        $queryResult = $preparedStatement->fetchAll(PDO::FETCH_COLUMN);

        return count($queryResult);
    }

    //Get The Content of User Images in Gallery
    function   ft_getUserImages($dbConn){

        $username = $_SESSION['userDBUsername'];

        $dbQuery = "SELECT imageContent FROM gallery WHERE username=:username ORDER BY insertTime DESC";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':username', $username);
        $preparedStatement->execute();

        $queryResult = $preparedStatement->fetchAll(PDO::FETCH_COLUMN);
        return $queryResult;
    }

    //Get The Content of User Images ID's in Gallery
    function   ft_getUserImageIDs($dbConn){

        $username = $_SESSION['userDBUsername'];

        $dbQuery = "SELECT imageID FROM gallery WHERE username=:username ORDER BY insertTime DESC";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':username', $username);
        $preparedStatement->execute();

        $queryResult = $preparedStatement->fetchAll(PDO::FETCH_COLUMN);
        return $queryResult;
    }

    //Get The Content of Images in Gallery
    function   ft_getImages($dbConn){

        $dbQuery = "SELECT imageContent FROM gallery ORDER BY insertTime DESC";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->execute();

        $queryResult = $preparedStatement->fetchAll(PDO::FETCH_COLUMN);
        return $queryResult;
    }

    //Delete Image From Gallery Table
    function    ft_deleteImage($dbConn, $pictureFilename) {

        $dbQuery = "DELETE FROM gallery WHERE imageID = :imageID";

        $preparedStatement = $dbConn->prepare($dbQuery);
        $preparedStatement->bindParam(':imageID', $pictureFilename);

        $preparedStatement->execute();
    }
?>