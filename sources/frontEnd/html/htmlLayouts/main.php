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