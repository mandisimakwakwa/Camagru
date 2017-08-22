<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/engines/controllers/phpPathController.php';

    function ft_imageMerge($imageBaseContent, $imageLayerContent) {

        //Image Merge Stored String Images
        imagealphablending($imageBaseContent, false);
        imagesavealpha($imageBaseContent, true);
        imagealphablending($imageLayerContent, true);
        imagesavealpha($imageLayerContent, true);

        imagecopymerge($imageBaseContent, $imageLayerContent, 0, 0, 0, 0, 100, 100, 75);

        // Output and free from memory
        header('Content-Type: image/png');

        ob_start();
        imagepng($imageLayerContent);

        $image = ob_get_clean();

        //Global Variables
        $imageContent = base64_encode($image);

        if ($imageContent) {

            $switchNode = "imageMerge";

            ft_sendJSON($imageContent, $switchNode);
        } else {

            $switchNode = "errorLog";

            ft_sendJSON($_SESSION['errorLog'], $switchNode);
        }
        imagedestroy($imageBaseContent);
        imagedestroy($imageLayerContent);
    }

    function ft_sessionStateLayer($decodedHTTPJSON) {

        $imageLayerFilename = $decodedHTTPJSON['layerImageFilename'];
        $imageLayerContent = imagecreatefromstring(base64_decode(ft_base64FromPNG($imageLayerFilename)));
        $imageBaseContent = imagecreatefromstring(base64_decode($decodedHTTPJSON['baseImage']));

        ft_imageMerge($imageBaseContent, $imageLayerContent);
    }

    function ft_sessionStateImageSave($dbConn, $decodedHTTPJSON) {

        $username = $_SESSION['userDBUsername'];
        $pictureFilename = time();
        $pictureFilename = $pictureFilename.$username;
        $pictureFilename = hash("sha256", $pictureFilename);
        $imageContent = $decodedHTTPJSON['baseImageSave'];

        //Session Set Error Log
        $_SESSION['errorLog'] = "Error! Image Save Failed.";

        ft_imageDBUpload($dbConn, $username, $pictureFilename, $imageContent);

        if ($imageContent && $username) {

            $switchNode = "imageSave";

            ft_sendJSON($imageContent, $switchNode);
        } else {

            $switchNode = "errorLog";

            ft_sendJSON($_SESSION['errorLog'], $switchNode);
        }
    }

    function ft_sessionStateUpload($dbConn, $decodedHTTPJSON) {

        $username = $_SESSION['userDBUsername'];
        $pictureFilename = time();
        $pictureFilename = $pictureFilename.$username;
        $pictureFilename = hash("sha256", $pictureFilename);
        $imageContent = $decodedHTTPJSON['httpUploadImageContent'];;

//        ft_imageDBUpload($dbConn, $username, $pictureFilename, $imageContent);

        if ($imageContent) {

            $switchNode = "imageUpload";

            ft_sendJSON($imageContent, $switchNode);
        } else {

            $switchNode = "errrorLog";

            ft_sendJSON($_SESSION['errorLog'], $switchNode);
        }
    }

    function ft_sessionStateImageDelete($dbConn, $decodedHTTPJSON) {

        $username = $_SESSION['userDBUsername'];
        $pictureFilename = $decodedHTTPJSON['imageID'];

        ft_deleteImage($dbConn, $pictureFilename);

        if ($pictureFilename) {

            $switchNode = "imageDelete";

            ft_sendJSON($pictureFilename, $switchNode);
        }
    }

    function ft_base64FromPNG($imageLayerFilename) {

        $path = "../../../../resources/merges/$imageLayerFilename";
        $image = file_get_contents($path);
        $imageData = base64_encode($image);

        return $imageData;
    }

//Debug Connection to camagruDAO.php
    function ft_checkCamagruDAO() {

        echo 'camagruDAO.php is accessible<br>';
    }
?>