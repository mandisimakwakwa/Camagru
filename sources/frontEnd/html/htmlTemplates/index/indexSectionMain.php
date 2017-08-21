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
    $sumOfImageArrayContents = ft_getImageSum($dbConn);
    $userImageContainer = ft_getImages($dbConn);

    //Pagination
    $currentPage = strlen($_GET['page'])>0?$_GET['page']:1;
    $itemCounter = 0 + ($currentPage * 5) - 5;
    $itemsPerPageLimiter = 5 + $itemCounter;
    $sumOfPages = $sumOfImageArrayContents / $itemsPerPageLimiter;
?>

<main>

    <div class="indexMainSubDivAClass">

        <div    id="indexGalleryModalID"
                class="modalClass">

            <div class="modalContentClass">

                <div id="galleryTitleDivID">

                    <span class="galleryHtmlEntitiesClass opacityAnimationClass pulseAnimationClass">&#91;</span>

                    <?php echo "Gallery";?>

                    <span class="galleryHtmlEntitiesClass opacityAnimationClass pulseAnimationClass">&#93;</span>
                </div>

                <div id="galleryContentsID">

                    <div>

                        <?php

                        while ($itemCounter < $itemsPerPageLimiter) {
                            $imageData = $userImageContainer[$itemCounter];
                            ?>
                            <div class="commentsDivClass">

                                <?php
                                if ($imageData) {
                                    ?>

                                    <img id="<?php echo $itemCounter + 1; ?>"
                                         height="80"
                                         width="125"
                                         src="data:image/png;base64,<?php echo $imageData; ?>"
                                    />

                                    <?php
                                } else {
                                    ?>

                                    <img id="<?php echo $itemCounter + 1; ?>"
                                         height="80"
                                         width="125"
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
        </div>
        <button class="indexGalleryButtonClass"
                onclick="ft_indexGalleryButton()"
        >

            <span>Gallery</span>
        </button>
    </div>

    <div class="indexMainSubDivBClass">


        <button class="indexLoginButtonClass"
                onclick="ft_indexLoginButton()">

            <span>Login</span>
        </button>

        <button class="indexRegisterButtonClass"
                onclick="ft_indexRegisterButton()"
        >

            <span>Register</span>
        </button>
    </div>

    <div id="indexRegistrationModalID"
         class="modalClass">

        <div class="modalContentClass">

            <div class="indexRegistrationFormTitleDivClass">

                <div class="indexSeparatorDivClass"></div>

                <h1>Registration</h1>

                <div class="indexSeparatorDivClass">

                    <button class="closeButtonClass"
                            onclick="ft_closeModalButton()">

                        <div>X</div>
                    </button>
                </div>
            </div>

            <form id="registrationFormID"
                  class="indexRegisterFormClass"
                  method="post"
            >

                <div class="indexRegistrationFormFieldClass">

                    <div class="indexRegistrationFormRowOneClass"
                    >

                        <div class="indexRegistrationFormFieldDivClass">

                            <h3 class="regFormTitleClass"><b>Email</b></h3>

                            <input type="text"
                                   placeholder="Please Enter Email"
                                   id="registerEmailInput"
                            />
                        </div>

                        <div class="indexRegistrationFormFieldDivClass">

                            <h3 class="regFormTitleClass"><b>Username</b></h3>

                            <input type="text"
                                   placeholder="Please Enter Username"
                                   id="registerUsernameInput"
                            />
                        </div>
                        <div class="indexRegistrationFormFieldDivClass">

                            <h3 class="regFormTitleClass"><b>Password</b></h3>

                            <input type="password"
                                   placeholder="Please Enter Password"
                                   id="registerPasswordInput"
                                   required/>
                        </div>
                    </div>
                    <div class="indexRegistrationFormRowTwoClass">

                        <div class="indexRegistrationFormFieldDivClass">
                        </div>

                        <div class="indexRegistrationFormFieldDivClass">

                            <h3 class="regFormTitleClass"><b>Confirm Password</b></h3>

                            <input type="password"
                                   placeholder="Please Confirm Password"
                                   id="registerConfirmPasswordInput"
                                   required/>
                        </div>

                        <div class="indexRegistrationFormFieldDivClass">
                        </div>
                    </div>
                </div>

                <div class="indexRegistrationFormButtonDivClass"
                >

                    <button class="submitButtonClass"
                            onclick="ft_indexRegisterSubmitButton()"
                    >
                        Submit
                    </button>
                    <button class="cancelButtonClass"
                            onclick="ft_closeModalButton()"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="indexLoginModalID"
         class="modalClass">

        <div class="modalContentClass">

            <div class="indexLoginFormTitleDivClass">

                <div class="indexSeparatorDivClass"></div>

                <h1>Login</h1>

                <div class="indexSeparatorDivClass">

                    <button class="closeButtonClass"
                            onclick="ft_closeModalButton()">

                        <div>X</div>
                    </button>
                </div>
            </div>

            <form id="loginFormID"
                  class="indexLoginFormClass"
                  method="post">

                <div class="indexLoginFormFieldClass">

                    <div class="indexLoginFormRowOneClass">

                        <div class="indexLoginFormFieldDivClass">

                            <h3 class="loginFormTitleClass"><b>Email</b></h3>

                            <input type="text"
                                   placeholder="Please Enter Email"
                                   id="loginEmailInput"
                            />
                        </div>

                        <div class="indexLoginFormFieldDivClass">

                            <h3 class="loginFormTitleClass"><b>Password</b></h3>

                            <input type="password"
                                   placeholder="Please Enter Password"
                                   id="loginPasswordInput"
                                   required/>
                        </div>
                    </div>
                </div>

                <div class="indexLoginFormButtonDivClass">

                    <button class="submitButtonClass"
                            onclick="ft_indexLoginSubmitButton()"
                    >
                        Submit
                    </button>

                    <button class="cancelButtonClass"
                            onclick="ft_closeModalButton()"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>