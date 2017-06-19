<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Session Start
session_start();

//Read Pics From DB and Convert to Thumbnails
?>

<aside class="sectionAsideClass">

    <div>

        <button id="logoutButtonID"
                onclick="ft_logout()">Logout</button>
    </div>
    <div>Gallery</div>
    <div class="buttonContainer">
        <button>Prev</button>
        <button>Next</button>
    </div>
</aside>
