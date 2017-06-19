<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Session Start
session_start();

if ($decodedHTTPJSON['SessionState'] == "LOGOUT") {

    echo $_SESSION["confirmLogin"] = "-1";
    session_destroy();
}