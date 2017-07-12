<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/engines/controllers/phpPathController.php';
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Camagru</title>

        <!--Calling index.css-->
        <link rel="stylesheet"
              href="sources/frontEnd/css/index.css"
              type="text/css"
        >

        <!--Calling camagru.css-->
        <link rel="stylesheet"
              href="sources/frontEnd/css/camagru.css"
              type="text/css"
        >

        <!--Calling cssDebugger.css-->
        <link rel="stylesheet"
              href="resources/debuggers/cssDebugger.css"
              type="text/css"
        >

        <!--Calling indexController.js-->
        <script src="sources/backEnd/engines/controllers/indexController.js"
                type="text/javascript"
        ></script>

        <!--Calling ajaxController.js-->
        <script src="sources/backEnd/engines/controllers/ajaxController.js"
                type="text/javascript"
        ></script>

        <!--Calling camagruJavascriptHandler.js-->
        <script src="sources/backEnd/engines/handlers/camagruJavascriptHandler.js"
                type="text/javascript"
        ></script>

        <!--Calling jsDebugger.js-->
        <script src="resources/debuggers/jsDebugger.js"
                type="text/javascript"
        ></script>
    </head>

    <body class="indexBodyWrapperDivClass">

        <div class="indexSectionDivClass">

            <?php

            //Calling HTML Elements
            include $indexHeaderTemplate;
            include $indexSectionMainTemplate;
            include $indexFooterTemplate;
            ?>
        </div>
    </body>
</html>