<?php

//Setup Sever Root Constant
$currentPWD = getcwd();
$currentPWDtoRoot = substr($currentPWD, 0, strpos($currentPWD, "sources"));
define("ServerRoot", "$currentPWDtoRoot", true);

//Config Controllers
//Remeber It's With Reference to Localhost Access Path
require_once ServerRoot . "sources/backEnd/config/database.php";
require_once ServerRoot . "sources/backEnd/config/setup.php";
require_once ServerRoot . "sources/backEnd/camagruDAO.php";
require_once ServerRoot . "sources/backEnd/camagruDTO.php";
require_once ServerRoot . "sources/backEnd/engines/paginationHandler.php";
require_once ServerRoot . "sources/backEnd/engines/galleryHandler.php";

//HTML Template Controllers
$headerTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/indexHeader.php";
$sectionMain = ServerRoot . "sources/frontEnd/html/htmlTemplates/indexSectionMain.php";
$sectionAside = ServerRoot . "sources/frontEnd/html/htmlTemplates/mainSectionAside.php";
$footerTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/indexFooter.php";