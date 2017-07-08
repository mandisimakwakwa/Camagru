/*Get Current Page Event Info*/

function ft_sendHTTPRequest(httpRequestAction, httpPostActionParams, getFormParams) {

    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open(httpRequestAction, "sources/backEnd/engines/galleryHandler.php" + getFormParams, true);
    // xhttpRequest.setRequestHeader("Content-type", "application/json");
    xhttpRequest.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {

            var response = xhttpRequest.response;
            var confirmLogin = response[0];

            console.log(response[0]);
            console.log(xhttpRequest.response);
            if (confirmLogin == "1") {

                ft_redirectMainController();
            } else {

                alert(response.substring(1));
            }
            return response;
        }
    };

    if (getFormParams !== "")
        xhttpRequest.send();
    else
        xhttpRequest.send(JSON.stringify(httpPostActionParams));
}

/*Get Current Page Event Info*/

function ft_sendHTTPPicRequest(httpRequestAction, httpPostActionParams, getFormParams) {

    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open(httpRequestAction, "../../../backEnd/engines/indexPageHandler.php" + getFormParams, true);
    // xhttpRequest.setRequestHeader("Content-type", "application/json");
    xhttpRequest.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {

            var response = xhttpRequest.response;
            var canvas = document.getElementById('photoViewID');
            var context = canvas.getContext('2d');
            var image = new Image();
            image.src = response;

            if (response) {

                //Draw image from encoded base64
                context.drawImage(image, 200, 200);
            } else {

                ft_clearPhoto(canvas, context, data);
            }
        }
    };

    if (getFormParams !== "")
        xhttpRequest.send();
    else
        xhttpRequest.send(JSON.stringify(httpPostActionParams));
}