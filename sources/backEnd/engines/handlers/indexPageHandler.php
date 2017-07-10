<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/engines/controllers/phpPathController.php";

    //Debug Connection to indexPageHandler.php
    function ft_checkIndexPageHandler() {

        echo 'indexPageHandler.php is accessible<br>';
    }
?>