<main>

    <div class="indexMainSubDivAClass">

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

        <div id="indexLoginModalID"></div>

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

                <h1>Registration Form</h1>

                <div class="indexSeparatorDivClass">

                    <button class="closeButtonClass"
                            onclick="ft_closeModalButton()">

                        <div>X</div>
                    </button>
                </div>
            </div>

            <form id="registrationFormID"
                  class="indexRegisterFormClass"
                  method="post""
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
                  method="post""
            >

            <div class="indexLoginFormFieldClass">

                <div class="indexLoginFormRowOneClass"
                >

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

            <div class="indexLoginFormButtonDivClass"
            >

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