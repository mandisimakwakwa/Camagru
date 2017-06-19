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


        //Create gallery Table if Not Exist
        ft_createGalleryTable($dbConn);

        //Image Data to DB
        ft_imageDBUpload($dbConn, $username, $pictureFilename, $imageContent);
    } elseif ($decodedHTTPJSON['SessionState'] == "LAYER") {

    } else {

        echo $_SESSION['errorLog'];
    }

    /*function ft_base64toPNG($imageRawData) {

        $imageData = base64_decode($imageRawData);
        $imageDataExec = imagecreatefromstring($imageData);
//        imagepng($imageDataExec, "$dirToImage/$pictureFilename.png");
        return $imageRawData;
    }*/

    function ft_imageMerge() {

        //Image Merge Layer to DB
    }