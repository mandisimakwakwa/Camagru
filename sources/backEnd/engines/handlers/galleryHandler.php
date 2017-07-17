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
    $_SESSION['errorLog'] = "Error Login and Password Don't Match";

    if ($decodedHTTPJSON['SessionState'] == "LAYER") {

        $imageLayerFilename = $decodedHTTPJSON['layerImageFilename'];
        $imageLayerContent = imagecreatefromstring(ft_base64FromPNG($imageLayerFilename));
        $imageBaseContent = imagecreatefromstring(base64_decode($decodedHTTPJSON['baseImage']));

        ft_imageMerge($imageBaseContent, $imageLayerContent);
    }

    //Debug Connection to galleryHandler.php
    function ft_checkGalleryHandler() {

        echo 'galleryHandler.php is accessible<br>';
    }
?>