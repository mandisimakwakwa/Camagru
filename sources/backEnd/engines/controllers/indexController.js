//Reveals Login Modal
function ft_showLoginModal() {

    var loginFormObj = document.getElementById('loginFormDiv');

    //Give Visibility Styling
    loginFormObj.style.display = "flex";
}

//Removes Modal From UI when Clicking Exit Button
function ft_closeLoginModal() {

    var loginFormObj = document.getElementById('loginFormDiv');

    //Give Invisibility Styling
    loginFormObj.style.display = "";
}

//Send Form Content to Server-Side
function ft_validateUserLoginHttpSend() {

    //Get Data From Login Form Client-Side
    httpLoginEmail = document.forms["loginForm"]["loginEmailInput"].value;

    //Security Hash Password Implementation will be Applied Later in PHP
    httpLoginPassword = document.forms["loginForm"]["loginPasswordInput"].value;

    //Session State is Login
    var params = {'httpLoginEmail' : httpLoginEmail, 'httpLoginPassword' : httpLoginPassword, 'SessionState' : "LOGIN"};
    console.log(ft_sendHTTPRequest("POST", params, ""));
}

/*Get Logout Session State*/

function ft_logout() {


    var params = {'SessionState' : "LOGOUT"};

    //Call Send HTTP Request Function Parse Login as session state.
    console.log(ft_sendLogoutHTTPRequest("POST", params, ""));
}

/*Redirect to Main.php*/
function ft_redirectMainController() {

    window.location.href = "../../../frontEnd/html/htmlLayouts/main.php";
}

/*Redirect to Index.php*/
function ft_redirectIndexController() {

    window.location.href = "../../../../index.php";
}