<?php

//Global Variables
    //Handle HTTP Requests
    $getHTTPJSON = file_get_contents("php://input");
    $decodedHTTPJSON = json_decode($getHTTPJSON, true);

    if ($decodedHTTPJSON['SessionState'] == "IMG") {

        //Save Image Data to File
        ft_base64toPNG($decodedHTTPJSON['httpImageContainer']);
    }

    function ft_base64toPNG($imageData) {
    }