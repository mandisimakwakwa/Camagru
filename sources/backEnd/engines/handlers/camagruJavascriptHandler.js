//Close Modal Button
function ft_closeModalButton() {

    var closeModalReg = document.getElementById('indexRegistrationModalID');
    var closeModalLogin = document.getElementById('indexLoginModalID');

    closeModalReg.style.display = "none";
    closeModalLogin.style.display = "none";
}

function ft_submitButton(sourcePage) {

    if (sourcePage == "login") {

        ft_sendLoginHTTPRequest();
    } else if (sourcePage == "register") {

        ft_sendRegHTTPRequest();
    }
}

function ft_responseHandler(response) {


    //Confirm Login
    var confirmLogin = response[0];

    if (confirmLogin == "1") {

        ft_redirectController();
    } else {

        alert(response.substring(1));
    }
}

/*Redirect to Main.php*/
function ft_redirectController() {

    window.location.href = "sources/frontEnd/html/htmlLayouts/main.php";
}
