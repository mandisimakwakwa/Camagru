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
            <div class="buttonContainer">

                <button id="snapPicIDButton"
                        onclick="ft_snapButton()">
                    Snap
                </button>
                <!--<button id="mergePicIDButton"
                        onclick="ft_mergeButton()">
                    Merge Pic
                </button>-->
                <!--<button id="uploadPicIDButton"
                        onclick="ft_uploadButton()">
                    Upload
                </button>-->
                <!--<button id="savePicIDButton"
                        onclick="ft_saveButton()">
                    Save to Gallery
                </button>-->
            </div>

            <div>

                <div>

                    <br>
                    <img src="../../../../resources/merge/1.png"
                         id="1.png"
                         onclick="ft_mergeLayer(this);"
                         height="80"
                         width="80"
                    >
                    <img src="../../../../resources/merge/2.png"
                         onclick="ft_mergeLayer(this);"
                         id="2.png"
                         height="80"
                         width="80"
                    >
                    <img src="../../../../resources/merge/3.png"
                         id="3.png"
                         onclick="ft_mergeLayer(this);"
                         height="80"
                         width="80"
                    >
                    <img src="../../../../resources/merge/4.png"
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
