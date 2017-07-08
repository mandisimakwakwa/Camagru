<?php

//Session Start
session_start();

//Populate Check Page Type Session
$_SESSION['checkPageName'] = ft_getFileName($_SERVER['PHP_SELF']);

//Global Page Variables
$checkPageName = $_SESSION['checkPageName'];
?>

<header class="headerClass">

    <h1>
        <?php

            //Check index/main page name
            if ($checkPageName == 'main') {

                echo "Welcome to Camagru: ";
                echo $_SESSION['userDBUsername'];
            } elseif  ($checkPageName == 'index') {

                echo "Welcome to Camagru";
            }
        ?>
    </h1>
</header>
