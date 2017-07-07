/*Get Current Page Event Info*/

function ft_sendHTTPPicRequest(httpRequestAction, httpPostActionParams, getFormParams) {

    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open(httpRequestAction, "../../../backEnd/engines/imageHandler.php" + getFormParams, true);
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

        //Go's
    }
}

function ft_snapButton() {

    var cam = document.getElementById('camViewID');
    var canvas = document.getElementById('photoViewID');
    var context = canvas.getContext('2d');
     var data = canvas.toDataURL('image/png');

    if (data) {

        context.drawImage(cam, 0, 0, 300, 450);
        canvas.setAttribute('src', data);
    } else {

        ft_clearPhoto(canvas, context, data);
    }
}

/*Get Current Page Event Info*/

function ft_saveButton() {

    //Post Image Variables
    var params = {'SessionState' : "GALLERY"};

    ft_sendHTTPPicRequest("POST", params, "");
}

function ft_clearPhoto(canvas, context, data) {

    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    canvas.setAttribute('src', data);
}

function ft_mergeLayer(imageLayerContainer) {

    var layerImageFilename = imageLayerContainer.id;
    var canvas = document.getElementById('photoViewID');
    var data = canvas.toDataURL('image/png');
    var baseEncodedData = data.replace("data:image/png;base64,", "");
    var params = {'baseImage' : baseEncodedData, 'layerImageFilename' : layerImageFilename, 'SessionState' : "LAYER"};

    ft_sendHTTPPicRequest("POST", params, "");
}

function ft_buttonReloader(saveButtonState) {

    var saveButtonOn = "<button id='saveButtonOnID'>Save</button>";
    var saveButtonOff = "<button id='saveButtonOffID'>Save Off</button>";
    var saveButtonToggle = saveButtonState;

    if (saveButtonToggle == "On") {

        document.write(saveButtonOn);
    } else {

        document.write(saveButtonOff);
    }
}

function ft_uploadButton() {

    alert("You Pressed the Upload Button");
}

/*Display Gallery Thumbnails*/

function ft_thumbnailDisplay(itemCount, imageData) {

    var image = "data:image/png;base64,"+imageData;
    var imageTag = "<img src='"+image+"'/>";
    return imageTag;
}

function ft_prev(currentPage) {

    if (currentPage > 1) {

        var prevPage = currentPage - 1;
    } else {

        var prevPage = 1;
    }

    window.location = "?page="+prevPage;
}

function ft_next(currentPage) {

    if (currentPage) {

        var nextPage = currentPage + 1;
    } else {

        var nextPage = 1;
    }

    window.location = "?page="+nextPage;
}

//refresh page with window.location.reload();