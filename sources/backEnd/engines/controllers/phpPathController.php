<?php

//Setup Sever Root Constant
$currentPWD = getcwd();
$currentPWDtoRoot = substr($currentPWD, 0, strpos($currentPWD, "sources"));
define("ServerRoot", "$currentPWDtoRoot", true);

//Config Controllers
//Remeber It's With Reference to Localhost Access Path
require_once ServerRoot . "resources/debuggers/phpDebugger.php";
require_once ServerRoot . "sources/backEnd/config/database.php";
require_once ServerRoot . "sources/backEnd/config/setup.php";
require_once ServerRoot . "sources/backEnd/camagruDAO.php";
require_once ServerRoot . "sources/backEnd/camagruDTO.php";
require_once ServerRoot . "sources/backEnd/engines/handlers/indexPageHandler.php";
require_once ServerRoot . "sources/backEnd/engines/handlers/mainPageHandler.php";
require_once ServerRoot . "sources/backEnd/engines/handlers/paginationHandler.php";
require_once ServerRoot . "sources/backEnd/engines/handlers/galleryHandler.php";
//require_once ServerRoot . "sources/backEnd/engines/engines/controllers/phpPathController.php";

//HTML Index Template Controllers
$indexHeaderTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/index/indexHeader.php";
$indexSectionMainTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/index/indexSectionMain.php";
$indexFooterTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/index/indexFooter.php";

//HTML Main Template Controllers
$mainHeaderTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/main/mainHeader.php";
$mainSectionMainTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/main/mainSectionMain.php";
$mainSectionAsideTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/main/mainSectionAside.php";
$mainFooterTemplate = ServerRoot . "sources/frontEnd/html/htmlTemplates/main/mainFooter.php";
?>