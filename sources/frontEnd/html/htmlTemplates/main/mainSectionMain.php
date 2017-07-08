<?php

//Session Start
session_start();

//DB Connection Variables
$dbConnDSN = $_SESSION['dbConnDSN'];
$dbConnUser = $_SESSION['dbConnUser'];
$dbConnPassword = $_SESSION['dbConnPassword'];
$dbConnName = $_SESSION['dbConnName'];

//Establish Network Connection
$dbConn = ft_getConnection($dbConnDSN, $dbConnUser, $dbConnPassword);
ft_useCamagru($dbConn, $dbConnName);

//Create gallery Table if Not Exist
ft_createGalleryTable($dbConn);

//Initialize Check Page Type Session
$_SESSION['checkPageName'] = ft_getFileName($_SERVER['PHP_SELF']);

//Global Variables
//Read Pics From DB and Convert to Thumbnails
$sumOfImageArrayContents = ft_getImageSum($dbConn);
$userImageContainer = ft_getAllImages($dbConn);

//Pagination
$currentPage = strlen($_GET['page'])>0?$_GET['page']:1;
$itemCounter = 0 + ($currentPage * 5) - 5;
$itemsPerPageLimiter = 5 + $itemCounter;
$sumOfPages = $sumOfImageArrayContents / $itemsPerPageLimiter;

//Global Page Variables
$checkPageName = $_SESSION['checkPageName'];
?>

<main class="sectionMainClass">

    <?php

        if ($checkPageName == 'main') {
            ?>

            <div class="camContainerClass">

                <video id="camViewID"
                       height="250"
                       autoplay>
                </video>
                <script language="JavaScript"
                        type="text/javascript"
                >
                    ft_camDisplay();
                </script>
                <canvas id="photoViewID"
                        height="250">
                </canvas>
            </div>
            <div class="buttonContainer"
                 id="buttonContainerID">

                <button id="snapPicIDButton"
                        onclick="ft_snapButton()">
                    Snap
                </button>
                <script language="JavaScript"
                        type="text/javascript">

                    ft_buttonReloader("On");
                </script>
            </div>

            <div>

                <div>

                    <br>
                    <img src="../../../../../resources/merges/1.png"
                         id="1.png"
                         onclick="ft_mergeLayer(this);"
                         height="80"
                         width="80"
                    >
                    <img src="../../../../../resources/merges/2.png"
                         onclick="ft_mergeLayer(this);"
                         id="2.png"
                         height="80"
                         width="80"
                    >
                    <img src="../../../../../resources/merges/3.png"
                         id="3.png"
                         onclick="ft_mergeLayer(this);"
                         height="80"
                         width="80"
                    >
                    <img src="../../../../../resources/merges/4.png"
                         id="4.png"
                         onclick="ft_mergeLayer(this);"
                         height="80"
                         width="80"
                    >
                    <hr>
                </div>
            </div>
            <?php
        } elseif ($checkPageName == 'index') {
            ?>

            <!--Login Form Div-->
            <div id="loginFormDiv"
                 class="modal"
            >

                                    <span class="close"
                                          onclick="ft_closeLoginModal()"
                                    >
                                        &times;
                                    </span>

                <form class="modal-content"
                      id="loginForm"
                      method="post"
                >
                    <h1>Login</h1>
                    <br><br>

                    <input type="text"
                           placeholder="Please Enter Email"
                           id="loginEmailInput">

                    <input type="password"
                           placeholder="Please Enter Password"
                           id="loginPasswordInput"
                           required>

                    <br><br>

                    <div id="loginFormButtonsDivContainer">

                        <button id="loginSubmitButton"
                                onclick="ft_validateUserLoginHttpSend()">
                            Login
                        </button>

                        <button id="cancelSubmitButton"
                                onclick="ft_closeLoginModal()"
                        >

                            Cancel
                        </button>
                    </div>
                </form>
            </div>

            <!--Login Button-->
            <button onclick="ft_showLoginModal()"
            >

                Login
            </button>

            <!--Gallery Div-->
            <div id="galleryDiv"
                 class="modal"
            >

                <span class="close"
                      onclick="ft_closeGalleryModal()"
                >
                                        &times;
                </span>

                <div class="modal-content">
                    <?php
                        while ($itemCounter < $itemsPerPageLimiter) {

                            $imageData = $userImageContainer[$itemCounter];
                            ?>
                            <div>

                                <?php

                                if ($imageData) {

                                    ?>

                                    <img id="<?php echo $itemCounter + 1; ?>"
                                         height="50"
                                         width="50"
                                         src="data:image/png;base64,<?php echo $imageData; ?>"
                                    />

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

                <div class="buttonContainer">

                    <button id="prevButtonID"
                            onclick="ft_prev(<?php echo $currentPage;?>)"
                    >

                        Prev

                    </button>

                    <button id="currentPageID"><?php echo $currentPage;?></button>

                    <button id="nextButtonID"
                            onclick="ft_next(<?php echo $currentPage;?>)"
                    >

                        Next
                    </button>
                </div>
            </div>

            <!--Gallery Display Button-->
            <button onclick="ft_showGalleryModal()"
            >

                Gallery
            </button>

            <!--Register Form Div-->
            <div id="registrationFormDiv"
                 class="modal"
            >

                            <span class="close"
                                  onclick="ft_closeRegisterModal()"
                            >
                                        &times;
                                    </span>

                <form class="modal-content"
                      id="registrationForm"
                      method="post"
                >
                    <h1>Register</h1>
                    <br><br>

                    <input type="text"
                           placeholder="Please Enter Email"
                           id="registerEmailInput"
                    >

                    <input type="text"
                           placeholder="Please Enter Username"
                           id="registerUsernameInput"
                    >

                    <input type="password"
                           placeholder="Please Enter Password"
                           id="registerPasswordInput"
                           required>

                    <input type="password"
                           placeholder="Please Confirm Password"
                           id="registerConfirmPasswordInput"
                           required>
                    <br><br>

                    <div id="registrationFormButtonsDivContainer">

                        <button id="registrationSubmitButton"
                                onclick="ft_validateUserRegistrationHttpSend()"
                        >
                            Submit
                        </button>

                        <button id="cancelSubmitButton"
                                onclick="ft_closeRegisterModal()"
                        >

                            Cancel
                        </button>
                    </div>
                </form>
            </div>

            <!--Registration Button-->
            <button onclick="ft_showRegistrationModal()"
            >

                Register
            </button>
            <?php
        }
    ?>
</main>
