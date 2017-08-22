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

        <!--Calling camagru.css-->
        <link rel="stylesheet"
              href="../../css/camagru.css"
              type="text/css"
        >

        <!--Calling cssDebugger.css-->
        <link rel="stylesheet"
              href="../../../../resources/debuggers/cssDebugger.css"
              type="text/css"
        >

        <!--Calling main.css-->
        <link rel="stylesheet"
              href="../../css/main.css"
              type="text/css"
        >

        <!--Calling camagruJavascriptHandler.js-->
        <script src="../../../backEnd/engines/handlers/camagruJavascriptHandler.js"
                type="text/javascript"
        ></script>

        <!--Calling ajaxController.js-->
        <script src="../../../backEnd/engines/controllers/ajaxController.js"
                type="text/javascript"
        ></script>

        <!--Calling jsDebugger.js-->
        <script src="../../../../resources/debuggers/jsDebugger.js"
                type="text/javascript"
        ></script>

        <!--Calling mainController.js-->
        <script src="../../../backEnd/engines/controllers/mainController.js"
                type="text/javascript"
        ></script>
    </head>

    <body onload="ft_defaultOnloadEnabler()">

        <div class="sectionDivClass">

            <?php

                include $mainHeaderTemplate;
                include $mainSectionMainTemplate;
                include $mainSectionAsideTemplate;
                include $mainFooterTemplate;
            ?>
        </div>
    </body>
</html>