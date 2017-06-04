//Reveals Login Modal
function ft_showLoginModal() {

    var loginFormObj = document.getElementById('loginFormDiv');

    //Give Visibility Styling
    loginFormObj.style.display = "flex";
}

//Reveals Registration Modal
function ft_showRegistrationModal() {

    var registrationFormObj = document.getElementById('registrationFormDiv');

    //Give Visibility Styling
    registrationFormObj.style.display = "flex";
}

//Removes Modal From UI when Clicking Exit Button
function ft_closeLoginModal() {

    var loginFormObj = document.getElementById('loginFormDiv');

    //Give Invisibility Styling
    loginFormObj.style.display = "";
}

function ft_closeRegisterModal() {

    var registrationFormObj = document.getElementById('registrationFormDiv');

    registrationFormObj.style.display = "";
}

/*Get Current Page Event Info*/

function ft_sendHTTPRequest(httpRequestAction, httpPostActionParams, getFormParams) {

    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open(httpRequestAction, "sources/backEnd/engines/phpRequestHandler.php" + getFormParams, true);
    // xhttpRequest.setRequestHeader("Content-type", "application/json");
    xhttpRequest.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {
            console.log(xhttpRequest.response);
            // var response = JSON.parse(xhttpRequest.responseText);
            return xhttpRequest.response;
        }
    };

    if (getFormParams !== "")
        xhttpRequest.send();
    else
        xhttpRequest.send(JSON.stringify(httpPostActionParams));
}

/*Get Login Form Info*/

function ft_validateUserLoginHttpSend() {

    //Get Data From Login Form Client-Side
    httpEmail = document.forms["loginForm"]["loginEmailInput"].value;

    //Security Hash Password Implementation will be Applied Later in PHP
    httpPassword = document.forms["loginForm"]["loginPasswordInput"].value;

    //Session State is Login
    var params = {'httpLoginEmail' : httpEmail, 'httpLoginPassword' : httpPassword, 'SessionState' : "LOGIN"};
    console.log(ft_sendHTTPRequest("POST", params, ""));
}

/*Get Registration Info*/

function ft_validateUserRegistrationHttpSend() {

    //Get Email Form Client-Side
    httpEmail = document.forms['registrationForm']['registerEmailInput'].value;

    //Get Username Form Client-Side
    httpUsername = document.forms['registrationForm']['registerUsernameInput'].value;

    //Get Password Form Client-Side
        //To be hashed From Front-End in Future
    httpPassword = document.forms['registrationForm']['registerPasswordInput'].value;

    //Get Confirm Password Form Client-Side
    httpConfirmPassword = document.forms['registrationForm']['registerConfirmPasswordInput'].value;

    //Session State is Register
    var params = {'httpRegisterEmail' : httpEmail, 'httpRegisterUsername' : httpUsername, 'httpRegisterPassword' : httpPassword, 'httpRegisterConfirmPassword' : httpConfirmPassword, 'SessionState' : "REGISTER"};
    console.log(ft_sendHTTPRequest("POST", params, ""));
}