<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/engines/controllers/phpPathController.php';

    //Debug Controller
    function ft_debugController() {

        ft_checkDatabaseLinking();
        ft_checkSetupLinking();
        ft_checkCamagruDAO();
        ft_checkCamagruDTO();
        ft_checkIndexPageHandler();
        ft_checkMainPageHandler();
        ft_checkGalleryHandler();
        ft_checkPaginationHandler();
    }

//    ft_debugController();

    //Debug Sessions
    function ft_arrayDebugger($array) {

        print_r($array);
    }
?>