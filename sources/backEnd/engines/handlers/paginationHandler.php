<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/engines/controllers/phpPathController.php";

    //Debug Connection to paginationHandler.php
    function ft_checkPaginationHandler() {

        echo 'paginationHandler.php is accessible<br>';
    }
?>