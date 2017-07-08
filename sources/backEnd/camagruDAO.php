<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/controllers/phpPathController.php';

//Register User to DB
function ft_register($dbConn, $httpEmail, $httpUsername, $httpPassword) {

    //Send Confirmation Email
    $email = "kt2jh@uscaves.com";
    $subject = ucfirst($httpUsername)." Validation";
//    $message = "<a href='#'>Click Here</a> to Validate";
    $message = "email works";
    $message = wordwrap($message, 70, "\r\n");
    $retMail = mail($email, $subject, $message);

    //Confirmation Email Return
    if ($retMail) {

        echo "email sent";
    } else {

        echo "email failed";
    }

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

//Debug Connection to camagruDAO.php
function ft_checkCamagruDAO() {

    echo 'camagruDAO.php is accessible<br>';
}