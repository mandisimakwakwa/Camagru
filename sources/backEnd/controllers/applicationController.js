/*Get Current Page Event Info*/

function ft_sendHTTPPicRequest(httpRequestAction, httpPostActionParams, getFormParams) {

    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open(httpRequestAction, "../../../backEnd/engines/imageHandler.php" + getFormParams, true);
    // xhttpRequest.setRequestHeader("Content-type", "application/json");
    xhttpRequest.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {

            var response = xhttpRequest.response;
            return response;
        }
    };

    if (getFormParams !== "")
        xhttpRequest.send();
    else
        xhttpRequest.send(JSON.stringify(httpPostActionParams));
}

function ft_camDisplay() {

    cam = document.getElementById('camViewID');
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    if (navigator.getUserMedia) {

        navigator.getUserMedia({video: true}, ft_handleVideo, ft_videoError);
    }

    function ft_handleVideo(stream) {

        cam.src = window.URL.createObjectURL(stream);
    }
    
    function ft_videoError(e) {

        //Go
    }
}

function ft_snapButton() {

    var cam = document.getElementById('camViewID');
    var canvas = document.getElementById('photoViewID');
    var context = canvas.getContext('2d');
    var camViewHeight = cam.videoHeight;
    var camViewWidth = cam.videoWidth;
    var data = canvas.toDataURL('image/png');

    console.log(camViewWidth, camViewHeight);
    if (camViewWidth && camViewHeight) {

        canvas.width = camViewWidth;
        canvas.height = camViewHeight;

        context.drawImage(cam, 10, 110.5, canvas.width/1.65, canvas.height/1.65);
        canvas.setAttribute('src', data);
    } else {

        ft_clearPhoto(canvas, context, data);
    }
}

function ft_clearPhoto(canvas, context, data) {

    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    canvas.setAttribute('src', data);
}

function ft_saveButton() {

    var canvas = document.getElementById('photoViewID');
    var context = canvas.getContext('2d');
    var data = canvas.toDataURL('image/png');
    var baseEncodedData = data.replace("data:image/png;base64,", "");

    var params = {'httpImageContainer' : baseEncodedData, 'SessionState' : "IMG"};
    console.log(baseEncodedData);
    ft_sendHTTPPicRequest("POST", params, "");
}

function ft_uploadButton() {

    alert("You Pressed the Upload Button");
}

function ft_mergeButton() {

    alert("You Pressed the Merge Button");
}