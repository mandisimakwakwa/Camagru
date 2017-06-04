<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/controllers/relativePathController.php';

//Debug Connection to camagruDAO.php
function ft_checkCamagruDAO()
{

    echo 'camagruDAO.php is accessible<br>';
}