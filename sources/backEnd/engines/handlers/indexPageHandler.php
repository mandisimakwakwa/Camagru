<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/engines/controllers/phpPathController.php";

//Global Variables
    //Handle HTTP Requests
    $getHTTPJSON = file_get_contents("php://input");
    $decodedHTTPJSON = json_decode($getHTTPJSON, true);

    if ($decodedHTTPJSON['SessionState'] == 'REGISTER') {

        $to = "y8ztf@uscaves.com";
        $subject = "My subject";
        $txt = "Hello world!";
        $headers = "From: mandisi.makwakwa@gmail.com";

        echo mail($to,$subject,$txt,$headers);
    }
    //Debug Connection to indexPageHandler.php
    function ft_checkIndexPageHandler() {

        echo 'indexPageHandler.php is accessible<br>';
    }
?>