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

    //JSON Prep
    function ft_sendJSON($sourceContent, $switchNode) {

        switch ($switchNode) {

            case "login" :

                $jsonObj = ft_prepLoginJSON($sourceContent);
                break;
            case "mergeImage" :

                $jsonObj = ft_prepMergeJSON($sourceContent);
                break;
            case "errorLog" :

                $jsonObj = ft_sendErrorJSON($sourceContent);
                break;
            default:
                break;
        }

        $jsonEncode = json_encode($jsonObj, JSON_PRETTY_PRINT);

        echo $jsonEncode;
    }

    function ft_sendErrorJSON($sourceContent) {

        $confirmErrorJSONIndex = "errorLog";
        $jsonObj = array($confirmErrorJSONIndex => $sourceContent);

        return $jsonObj;
    }

    function ft_prepLoginJSON($sourceContent) {

        $confirmLoginJSONIndex = "confirmLogin";
        $jsonObj = array($confirmLoginJSONIndex => $sourceContent);

        return $jsonObj;
    }

    function ft_prepMergeJSON($sourceContent) {

        $imageContentJSONIndex = "imageMerge";
        $jsonObj = array($imageContentJSONIndex => $sourceContent);

        return $jsonObj;
    }

    function ft_sessionStateRegister($dbConn, $decodedHTTPJSON) {

        //Set Sessions
        $_SESSION['httpRegisterEmail'] = ft_validator($decodedHTTPJSON['httpRegisterEmail']);
        $_SESSION['httpRegisterUsername'] = ft_validator($decodedHTTPJSON['httpRegisterUsername']);
        $_SESSION['httpRegisterPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpRegisterPassword']));
        $_SESSION['httpRegisterConfirmPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpRegisterConfirmPassword']));
        $_SESSION['confirmLogin'] = "1";

        //Session Set Error Log
        $_SESSION['errorLog'] = "Error Registration Failed.";

        //Register User
        //Create users Table & Set Auto Increment
        ft_createUsersTable($dbConn);

        //Store User In DB
        $httpRegisterEmail = $_SESSION['httpRegisterEmail'];
        $httpRegisterUsername = $_SESSION['httpRegisterUsername'];
        $httpRegisterPassword = $_SESSION['httpRegisterPassword'];

        //Assign User HTTP values to DB
        ft_register($dbConn, $httpRegisterEmail, $httpRegisterUsername, $httpRegisterPassword);

        //Set DB Sessions
        $_SESSION['userDBEmail'] = ft_getUserDBEmail($dbConn, $httpRegisterEmail, $httpRegisterPassword);
        $_SESSION['userDBUsername'] = ft_getUserDBUsername($dbConn, $httpRegisterEmail, $httpRegisterPassword);
        $_SESSION['userDBPassword'] = ft_getUserDBPassword($dbConn, $httpRegisterEmail, $httpRegisterPassword);

        //Validate User
        if (($httpRegisterEmail == $_SESSION['userDBEmail']) && ($httpRegisterPassword == $_SESSION['userDBPassword'])) {

            $switchNode = "login";
            $confirmLoginJSONValue = $_SESSION['confirmLogin'];

            ft_sendJSON($confirmLoginJSONValue, $switchNode);
        } else {

            $switchNode = "errorLog";

            ft_sendJSON($_SESSION['errorLog'], $switchNode);
        }
    }

    function ft_sessionStateLogin($dbConn, $decodedHTTPJSON) {

        //Set Sessions
        $_SESSION['httpLoginEmail'] = ft_validator($decodedHTTPJSON['httpLoginEmail']);
        $_SESSION['httpLoginPassword'] = hash("sha256", ft_validator($decodedHTTPJSON['httpLoginPassword']));
        $_SESSION['confirmLogin'] = "1";

        //Retrieve User From DB
        $httpLoginEmail = $_SESSION['httpLoginEmail'];
        $httpLoginPassword = $_SESSION['httpLoginPassword'];

        //Session Set Error Log
        $_SESSION['errorLog'] = "Error Login and Password Don't Match";

        //Set DB Sessions
        $_SESSION['userDBEmail'] = ft_getUserDBEmail($dbConn, $httpLoginEmail, $httpLoginPassword);
        $_SESSION['userDBPassword'] = ft_getUserDBPassword($dbConn, $httpLoginEmail, $httpLoginPassword);

        if (($_SESSION['userDBEmail'] == $httpLoginEmail) && ($_SESSION['userDBPassword'] == $httpLoginPassword)) {

            $confirmLoginJSONValue = $_SESSION['confirmLogin'];
            $switchNode = "login";

            //Send Client-Side Response
            ft_sendJSON($confirmLoginJSONValue, $switchNode);
        } else {

            $switchNode = "errorLog";

            ft_sendJSON($_SESSION['errorLog'], $switchNode);
        }
    }

    //Debug Connection to camagruDTO.php
    function ft_checkCamagruDTO() {

        echo 'camagruDTO.php is accessible<br>';
    }
?>