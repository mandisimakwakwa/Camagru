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
        imagecopymerge($imageBaseContent, $imageLayerContent, 0, 0, 0, 0, 350, 350, 100);

        // Output and free from memory
        header('Content-Type: image/png');
        ob_start();
        imagepng($imageBaseContent);
        $image = ob_get_clean();

        //Global Variables
        $imageContent = base64_encode($imageBaseContent);

        if ($image) {

            echo 'data:image/png;base64,'.$imageContent;
        } else {

            echo $_SESSION['errorLog'];
        }
        imagedestroy($imageBaseContent);
        imagedestroy($imageLayerContent);
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