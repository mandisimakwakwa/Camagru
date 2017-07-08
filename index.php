<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/controllers/phpPathController.php';

//Session Start
session_start();

//Populate Check Page Type Session
$_SESSION['checkPageName'] = ft_getFileName($_SERVER['PHP_SELF']);

//Global Page Variables
$checkPageName = $_SESSION['checkPageName'];



//ft_debugController();
?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Camagru</title>

    <!--Calling indexPage.css-->
    <link rel="stylesheet"
          href="sources/frontEnd/css/indexPage.css"
          type="text/css"
    >

    <!--Calling main.css-->
    <link rel="stylesheet"
          href="sources/frontEnd/css/main.css"
          type="text/css"
    >

    <!--Calling htmlRequestHandler-->
    <script src="sources/backEnd/engines/controllers/indexController.js"
            type="text/javascript"
    ></script>
</head>
<body>

<!--Wrapper Div-->
<div class="bodyWrapperDebugDiv">

    <?php

    //Calling Header Div
    include $headerTemplate;

    if ($checkPageName == "index") {

        //Calling Section Main Div
        include $sectionMain;
    } elseif ($checkPageName == "main") {

        //Calling Section Main and Aside Div
        include $sectionMain;
        include $sectionAside;
    }

    //Calling Footer Div
    include $footerTemplate;
    ?>
</div>
</body>
</html>
