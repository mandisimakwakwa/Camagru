<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Session Start
session_start();

//Global Variables
    $pictureFilename = time();
    $username = $_SESSION['userDBUsername'];
    $pictureFilename = $pictureFilename.$username;
    $pictureFilename = hash("sha256", $pictureFilename);

    //Handle HTTP Requests
    $getHTTPJSON = file_get_contents("php://input");
    $decodedHTTPJSON = json_decode($getHTTPJSON, true);

    //DB Connection Variables
    $dbConnDSN = $_SESSION['dbConnDSN'];
    $dbConnUser = $_SESSION['dbConnUser'];
    $dbConnPassword = $_SESSION['dbConnPassword'];
    $dbConnName = $_SESSION['dbConnName'];

    //Establish Network Connection
    $dbConn = ft_getConnection($dbConnDSN, $dbConnUser, $dbConnPassword);

    //Use Camagru DB
    ft_useCamagru($dbConn, $dbConnName);

    //Session Set Error Log
    $_SESSION['errorLog'] = "Error Gallery Setup Failed.";

    if ($decodedHTTPJSON['SessionState'] == "IMG") {

        //Set Up Gallery Variables
        $username = $_SESSION['userDBUsername'];
        $imageContent = $decodedHTTPJSON['httpImageContainer'];

        //Image Data to DB
        ft_imageDBUpload($dbConn, $username, $pictureFilename, $imageContent);
    } elseif ($decodedHTTPJSON['SessionState'] == "LAYER") {

        $imageLayerFilename = $decodedHTTPJSON['layerImageFilename'];
        $imageLayerContent = imagecreatefromstring(base64_decode(ft_base64FromPNG($imageLayerFilename)));
        $imageBaseContent = imagecreatefromstring(base64_decode($decodedHTTPJSON['baseImage']));

        $imageContent = ft_imageMerge($imageBaseContent, $imageLayerContent);
        ft_imageDBUpload($dbConn, $username, $pictureFilename, $imageContent);
    } else {

        echo $_SESSION['errorLog'];
    }

    /*function ft_base64toPNG($imageRawData) {

        $imageData = base64_decode($imageRawData);
        $imageDataExec = imagecreatefromstring($imageData);
//        imagepng($imageDataExec, "$dirToImage/$pictureFilename.png");
        return $imageRawData;
    }*/

    function ft_base64FromPNG($imageLayerFilename) {

        $path = "../../../resources/merge/$imageLayerFilename";
        $image = file_get_contents($path);
        $imageData = base64_encode($image);

        return $imageData;
    }

    function ft_imageMerge($imageBaseContent, $imageLayerContent) {

        //Image Merge Stored String Images
        imagealphablending($imageBaseContent, false);
        imagesavealpha($imageBaseContent, true);
        imagealphablending($imageLayerContent, true);
        imagesavealpha($imageLayerContent, true);

        imagecopymerge($imageBaseContent, $imageLayerContent, 0, 0, 0, 0, 350, 350, 100);

        // Output and free from memory
        header('Content-Type: image/png');

        ob_start();
        imagepng($imageBaseContent);
        $image = ob_get_clean();

        //Global Variables
        $imageContent = base64_encode($image);

        echo 'data:image/png;base64,'.base64_encode($image);

        if ($image) {

            return $imageContent;
        } else {

            echo $_SESSION['errorLog'];
        }
        imagedestroy($imageBaseContent);
        imagedestroy($imageLayerContent);
    }