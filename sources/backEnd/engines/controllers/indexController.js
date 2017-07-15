function ft_indexGalleryButton() {

    alert("Gallery Button has been Pressed");
}

function ft_indexLoginButton() {

    var modal = document.getElementById('indexLoginModalID');

    modal.style.display = "flex";
}

function ft_indexRegisterButton() {

    var modal = document.getElementById('indexRegistrationModalID');

    modal.style.display = "flex";
}

function ft_sendRegHTTPRequest() {

     //Get Email From Register Form Client-Side
     var httpRegisterEmail = document.forms['registrationFormID']['registerEmailInput'].value;

     //Get Username Form Client-Side
     var httpRegisterUsername = document.forms['registrationFormID']['registerUsernameInput'].value;

     //Get Password Form Client-Side

    //To be hashed From Front-End in Future
     var httpRegisterPassword = document.forms['registrationFormID']['registerPasswordInput'].value;

     //Get Confirm Password Form Client-Side
     var httpRegisterConfirmPassword = document.forms['registrationFormID']['registerConfirmPasswordInput'].value;

     //Session State is Register
     var params = {'httpRegisterEmail' : httpRegisterEmail, 'httpRegisterUsername' : httpRegisterUsername, 'httpRegisterPassword' : httpRegisterPassword, 'httpRegisterConfirmPassword' : httpRegisterConfirmPassword, 'SessionState' : "REGISTER"};

     var handler = "sources/backEnd/engines/handlers/indexPageHandler.php";

     console.log(ft_sendHTTPRequest("POST", params, "", handler));
}

function ft_sendLoginHTTPRequest() {

    //Get Email From Register Form Client-Side
    var httpLoginEmail = document.forms['loginFormID']['loginEmailInput'].value;

    //Get Password Form Client-Side
    var httpLoginPassword = document.forms['loginFormID']['loginPasswordInput'].value;

    //Session State is Register
    var params = {'httpLoginEmail' : httpLoginEmail, 'httpLoginPassword' : httpLoginPassword, 'SessionState' : "LOGIN"};

    var handler = "sources/backEnd/engines/handlers/indexPageHandler.php"

    console.log(ft_sendHTTPRequest("POST", params, "", handler));
}

function ft_indexLoginSubmitButton() {

    var sourcePage = "login";

    ft_submitButton(sourcePage);
}

function ft_indexRegisterSubmitButton() {

    var sourcePage = "register";

    ft_submitButton(sourcePage);
}

function ft_indexLogoutButton() {

    alert("Logout Button has been Pressed");
}