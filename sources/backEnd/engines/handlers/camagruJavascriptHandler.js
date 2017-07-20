//Enable all Onload JS Functions
function ft_defaultOnloadEnabler() {

    ft_camDisplay();
}

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

function ft_responseHandler(response, switchNode) {

    if (response) {

        var jsonResponse = JSON.parse(response);

        switch (switchNode) {

            case "login":

                ft_loginCase(jsonResponse);
                break;
            case "imageSave":

                ft_imageSaveCase(jsonResponse);
                break;
            case "imageUpload":

                ft_imageUploadCase(jsonResponse);
                break;
        }
    } else {

        alert("Hi");
    }
}

    function ft_loginCase(jsonResponse) {

        var confirmLogin = jsonResponse.confirmLogin;

        if (confirmLogin == "1") {

            var destPage = "main";

            ft_redirectController(destPage);
        }
    }

    function ft_imageSaveCase(jsonResponse) {

        var imageSave = jsonResponse.imageSave;

        // console.log(imageSave);
    }

    function ft_imageUploadCase(jsonResponse) {

        var imageUpload = jsonResponse.imageUpload;
        var canvas = document.getElementById("canvasViewID");
        var context = canvas.getContext('2d');

        if (imageUpload) {

            ft_clearPhoto(canvas, context, imageUpload);
            alert(imageUpload);
        }
    }

    function ft_errorLogCase(jsonResponse) {

        var errorLog = jsonResponse.errorLog;

        alert(errorLog);
    }

    /*Redirect to Main.php*/
    function ft_redirectController(destPage) {

        switch (destPage) {

            case "main":

                window.location.href = "sources/frontEnd/html/htmlLayouts/main.php";
                break;
            case "index":

                window.location.href = "../../../../index.php";
                break;
        }
    }

    function ft_logoutButton() {

        var destPage = "index";

        ft_redirectController(destPage);
    }