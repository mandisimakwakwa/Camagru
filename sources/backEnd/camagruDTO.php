<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/engines/controllers/phpPathController.php';

    //Validator function to check for injections
    function ft_validator($userInputSample)
    {

        $userInputSample = trim($userInputSample);
        $userInputSample = stripslashes($userInputSample);
        $userInputSample = htmlspecialchars($userInputSample);

        return $userInputSample;
    }

    //Debug Connection to camagruDTO.php
    function ft_checkCamagruDTO() {

        echo 'camagruDTO.php is accessible<br>';
    }
?>