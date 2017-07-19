<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/engines/controllers/phpPathController.php";

    //Session Creator
    session_start();

    //Global Variables
    //Handle HTTP Requests
    $getHTTPJSON = file_get_contents("php://input");
    $decodedHTTPJSON = json_decode($getHTTPJSON, true);

    //Session Set Error Log
    $_SESSION['errorLog'] = "Error Something Went Wrong With the Image.";

    $sessionState = $decodedHTTPJSON['sessionState'];

    switch ($sessionState) {

        case "LAYER" :

            ft_sessionStateLayer($decodedHTTPJSON);
            break;
        /*default :

            ft_sessionStateError();
            break;*/
    }

    //Debug Connection to galleryHandler.php
    function ft_checkGalleryHandler() {

        echo 'galleryHandler.php is accessible<br>';
    }
?>