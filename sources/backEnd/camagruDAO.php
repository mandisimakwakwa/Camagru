<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/controllers/relativePathController.php';

//Register User to DB
function ft_register($dbConn, $httpEmail, $httpUsername, $httpPassword) {

    $dbQuery = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";

    $preparedStatement = $dbConn->prepare($dbQuery);
    $preparedStatement->bindParam(':email', $httpEmail);
    $preparedStatement->bindParam(':username', $httpUsername);
    $preparedStatement->bindParam(':password', $httpPassword);
    $preparedStatement->execute();
}

//Debug Connection to camagruDAO.php
function ft_checkCamagruDAO() {

    echo 'camagruDAO.php is accessible<br>';
}