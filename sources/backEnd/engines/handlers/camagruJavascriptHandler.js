//Close Modal Button
function ft_closeModalButton() {

    var closeModal = document.getElementById('indexRegistrationModalID');

    closeModal.style.display = "none";
}

function ft_submitButton(sourcePage) {

    if (sourcePage == "index") {

        ft_sendRegHTTPRequest();
    }
}

/*Redirect to Main.php*/
function ft_redirectController() {

    window.location.href = "/sources/frontEnd/html/htmlLayouts/main.php";
}
