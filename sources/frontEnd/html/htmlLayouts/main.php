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
              href="../../css/main.css"
              type="text/css"
        >

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

        <!--Calling mainController.js-->
        <script src="../../../backEnd/engines/controllers/mainController.js"
                type="text/javascript"
        ></script>

        <!--Calling ajaxController.js-->
        <script src="../../../backEnd/engines/controllers/ajaxController.js"
                type="text/javascript"
        ></script>
    </head>

    <body>

        <?php

        include $mainHeaderTemplate;
        include $mainSectionMainTemplate;
        include $mainSectionAsideTemplate;
        include $mainFooterTemplate;
        ?>
    </body>
</html>