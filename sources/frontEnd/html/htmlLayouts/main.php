<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Session Start
session_start();

//Initialize Check Page Type Session
$_SESSION['checkPageName'] = ft_getFileName($_SERVER['PHP_SELF']);

//Global Page Variables
$checkPageName = $_SESSION['checkPageName'];
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Camagru</title>

    <!--Calling mainPage.css-->
    <link rel="stylesheet"
          href="../../css/mainPage.css"
          type="text/css"
    >

    <!--Calling main.css-->
    <link rel="stylesheet"
          href="../../css/main.css"
          type="text/css"
    >

    <!--Calling htmlRequestHandler-->
    <script src="../../../backEnd/engines/htmlRequestHandler.js"
            type="text/javascript"
    ></script>

    <!--Calling applicationController-->
    <script src="../../../backEnd/controllers/applicationController.js"
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
                    ?>

                    <div class="sectionClass">
                        <?php

                            //Calling Section Main and Aside Div
                            include $sectionMain;
                            include $sectionAside;
                        ?>
                    </div>
                    <?php
                }

                //Calling Footer Div
                include $footerTemplate;
            ?>
        </div>
    </body>
</html>

