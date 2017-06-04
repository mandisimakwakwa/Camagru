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
require_once ServerRoot . "sources/backEnd/engines/sqlRequestHandler.php";
require_once ServerRoot . "sources/backEnd/engines/phpRequestHandler.php";

//HTML Template Controllers
$headerTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/header.php";
$sectionMain = ServerRoot . "sources/frontEnd/html/htmlTemplates/sectionMain.php";
$sectionAside = ServerRoot . "sources/frontEnd/html/htmlTemplates/sectionAside.php";
$footerTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/footer.php";