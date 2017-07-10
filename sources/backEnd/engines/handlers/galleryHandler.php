<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/engines/controllers/phpPathController.php";

    //Debug Connection to galleryHandler.php
    function ft_checkGalleryHandler() {

        echo 'galleryHandler.php is accessible<br>';
    }
?>