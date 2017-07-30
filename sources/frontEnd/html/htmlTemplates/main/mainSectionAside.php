<?php

//Setup Relative Root
$projectRoot = substr(getcwd(), 0, strpos(getcwd(), "sources"));
require $projectRoot . 'sources/backEnd/engines/controllers/phpPathController.php';

    //Session Start
    session_start();

        //DB Connection Variables
        $dbConnDSN = $_SESSION['dbConnDSN'];
        $dbConnUser = $_SESSION['dbConnUser'];
        $dbConnPassword = $_SESSION['dbConnPassword'];
        $dbConnName = $_SESSION['dbConnName'];

        //Establish Network Connection
        $dbConn = ft_getConnection($dbConnDSN, $dbConnUser, $dbConnPassword);

    //Use Camagru DB
    ft_useCamagru($dbConn, $dbConnName);

    //Create users Table & Set Auto Increment
    ft_createUsersTable($dbConn);

    //Create gallery table query
    ft_createGalleryTable($dbConn);

    //Session Set Error Log
    $_SESSION['errorLog'] = "Error DB Conn Failed user images not Retrieved";

    //Global Variables
        $username = $_SESSION['userDBUsername'];

        //Read Pics From DB and Convert to Thumbnails
        $sumOfImageArrayContents = ft_getUserImageSum($dbConn);
        $userImageContainer = ft_getUserImages($dbConn);

        //Pagination
        $currentPage = strlen($_GET['page'])>0?$_GET['page']:1;
        $itemCounter = 0 + ($currentPage * 5) - 5;
        $itemsPerPageLimiter = 5 + $itemCounter;
        $sumOfPages = $sumOfImageArrayContents / $itemsPerPageLimiter;
?>

<aside>

    <div class="sectionAsideClass">

        <div id="galleryTitleDivID">

            <span class="galleryHtmlEntitiesClass">&#91;</span>

                <?php echo $username;?>

            <span class="galleryHtmlEntitiesClass">&#93;</span>
        </div>
        <div id="galleryContentsID">

            <div>

                <?php

                    while ($itemCounter < $itemsPerPageLimiter) {
                        $imageData = $userImageContainer[$itemCounter];
                        ?>
                        <div class="commentDivClass">

                            <?php
                            if ($imageData) {
                                ?>

                                <img id="<?php echo $itemCounter + 1; ?>"
                                     height="50"
                                     width="50"
                                     src="data:image/png;base64,<?php echo $imageData; ?>"
                                />

                                <button class="commentDivButtonClass"
                                        onclick="ft_commentsButton(<?php echo $itemCounter + 1; ?>)">

                                    Comments
                                </button>

                                <?php
                            } else {
                                ?>

                                <img id="<?php echo $itemCounter + 1; ?>"
                                     height="50"
                                     width="50"
                                     src="#"
                                />

                                <?php
                            }
                            ?>
                            <br>
                        </div>
                        <?php
                        $itemCounter += 1;
                    }
                ?>
            </div>
        </div>
        <div class="buttonContainerClass">

            <button class="paginationButtonClass"
                    id="prevButtonID"
                    onclick="ft_prev(<?php echo $currentPage;?>)"
            >

                &lt;
            </button>

            <span id="currentPageID">

                <?php echo $currentPage;?>
            </span>

            <button class="paginationButtonClass"
                    id="nextButtonID"
                    onclick="ft_next(<?php echo $currentPage;?>)"
            >

                &gt;
            </button>
        </div>
    </div>
</aside>