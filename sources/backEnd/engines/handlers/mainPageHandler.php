<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/engines/controllers/phpPathController.php";

    //Debug Connection to mainPageHandler.php
    function ft_checkMainPageHandler() {

        echo 'mainPageHandler.php is accessible<br>';
    }
?>