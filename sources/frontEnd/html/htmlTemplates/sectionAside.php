<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . "sources/backEnd/controllers/relativePathController.php";

//Session Start
session_start();


//DB Connection Variables
$dbConnDSN = $_SESSION['dbConnDSN'];
$dbConnUser = $_SESSION['dbConnUser'];
$dbConnPassword = $_SESSION['dbConnPassword'];
$dbConnName = $_SESSION['dbConnName'];

//Establish Network Connection
$dbConn = ft_getConnection($dbConnDSN, $dbConnUser, $dbConnPassword);
ft_useCamagru($dbConn,$dbConnName);

//Session Set Error Log
$_SESSION['errorLog'] = "Error DB Conn Failed user images not Retrieved";

//Global Variables
    //Read Pics From DB and Convert to Thumbnails
    $sumOfImageArrayContents = ft_getUserImageSum($dbConn);
    $userImageContainer = ft_getUserImages($dbConn);

    //Pagination
    $itemCounter = 0;
    $itemsPerPageLimiter = 5;
    $sumOfPages = $sumOfImageArrayContents/$itemsPerPageLimiter;
?>

<aside class="sectionAsideClass">

    <div>

        <button id="logoutButtonID"
                onclick="ft_logout()">Logout</button>
    </div>
    <div class="thumbnailClass">

        <h2>Gallery</h2>

        <div>
            <?php
                while ($itemCounter < $itemsPerPageLimiter) {
                    ?>
                        <div>

                            <canvas id="<?php echo $itemCounter+1;?>"
                                    height="50"
                                    width="50"
                            ></canvas>
                            <br>
                            <script type="text/javascript">

                                ft_thumbnailDisplay(<?php echo $itemCounter+1;?>)
                            </script>
                        </div>
                    <?php
                    $itemCounter += 1;
                    echo $itemCounter;
                }
            ?>
        </div>
    </div>
    <div class="buttonContainer">

        <button id="prevButtonID"
                onclick="ft_prev()"
        >

            Prev
        </button>

        <button id="nextButtonID"
                onclick="ft_next()"
        >

            Next
        </button>
    </div>
</aside>
