<?php

//Global Variables
    $pictureFilename = time();
    $username = $_SESSION['userDBUsername'];
    $pictureFilename = $pictureFilename.$username;
    $pictureFilename = hash("sha256", $pictureFilename);

    //Handle HTTP Requests
    $getHTTPJSON = file_get_contents("php://input");
    $decodedHTTPJSON = json_decode($getHTTPJSON, true);

    if ($decodedHTTPJSON['SessionState'] == "IMG") {

        //Save Image Data to File
        var_dump($decodedHTTPJSON);
        $dirToImage = "../../../resources/gallery";
        if (!is_dir($dirToImage)) {

            @mkdir($dirToImage, "0777");
        }
        ft_base64toPNG($decodedHTTPJSON['httpImageContainer'], $pictureFilename, $dirToImage);
    }

    function ft_base64toPNG($imageRawData, $pictureFilename, $dirToImage) {

        $imageData = base64_decode($imageRawData);
        $imageDataExec = imagecreatefromstring($imageData);
        imagepng($imageDataExec, "$dirToImage/$pictureFilename.png");
    }