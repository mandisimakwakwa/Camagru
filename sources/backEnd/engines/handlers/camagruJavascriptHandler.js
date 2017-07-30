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
            case "imageMerge":

                ft_imageMergeCase(jsonResponse);
                break;
            case "imageUpload":

                ft_imageUploadCase(jsonResponse);
                break;
        }
    } else {

        alert("No Responses Recieved!");
    }
}

    function ft_loginCase(jsonResponse) {

        var confirmLogin = jsonResponse.confirmLogin;

        if (confirmLogin == "1") {

            var destPage = "main";

            ft_redirectController(destPage);
        } else {

            alert("Login Failed. Please Check Email and Password!");
        }
    }

    function ft_imageSaveCase(jsonResponse) {

        var imageSave = jsonResponse.imageSave;

        // console.log(imageSave);
    }

    function ft_imageMergeCase(jsonResponse) {

        var canvas = document.getElementById('canvasViewID');
        var context = canvas.getContext("2d");
        var image = new Image();

        var imageRaw = jsonResponse.imageMerge;
        var imageData = "data:image/png;base64,"+imageRaw;

        image.onload = function () {

            context.drawImage(image, 50, 25, 150, 130);
        };

        image.src = imageData;
    }

    function ft_imageUploadCase(jsonResponse) {

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