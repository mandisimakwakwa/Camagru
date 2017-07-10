<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/engines/controllers/phpPathController.php';

    //Debug Connection to setup.php
    function ft_checkSetupLinking() {

        echo 'setup.php is accessible<br>';
    }
?>