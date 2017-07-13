function ft_indexGalleryButton() {

    alert("Gallery Button has been Pressed");
}

function ft_indexLoginButton() {

    alert("Login Button has been Pressed");
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

function ft_indexSubmitButton() {

    var sourcePage = "index";

    ft_submitButton(sourcePage);
}

function ft_indexLogoutButton() {

    alert("Logout Button has been Pressed");
}