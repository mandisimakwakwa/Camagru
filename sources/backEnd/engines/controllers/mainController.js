function ft_camDisplay() {

    cam = document.getElementById('camViewID');

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    if (navigator.getUserMedia) {

        navigator.getUserMedia({video: true}, ft_handleVideo, ft_videoError);
    }
}

function ft_handleVideo(stream) {

    cam.src = window.URL.createObjectURL(stream);
}

function ft_videoError(e) {

    //Go's
}

function ft_snapButton() {

    var cam = document.getElementById('camViewID');
    var canvas = document.getElementById('canvasViewID');
    var context = canvas.getContext('2d');
    var data = canvas.toDataURL('image/png');

    if (data) {

        context.drawImage(cam, 15, 20, 250, 150);
        canvas.setAttribute('src', data);
    } else {

        ft_clearPhoto(canvas, context, data);
    }
}

function ft_saveToGalleryButton() {

    // //Post Image Variables
    // var params = {'SessionState' : "GALLERY"};
    //
    // ft_sendHTTPPicRequest("POST", params, "");

    alert("You clicked the save to gallery button");
}

function ft_uploadToGalleryButton() {

    alert("You clicked the upload to gallery button");
}

function ft_clearPhoto(canvas, context, data) {

    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    canvas.setAttribute('src', data);
}

//Send Gallery image and Merges image to Server-Side
function ft_mergeLayer(imageLayerContainer) {

    alert("Merge Layer");

   /* var layerImageFilename = imageLayerContainer.id;
    var canvas = document.getElementById('photoViewID');
    var data = canvas.toDataURL('image/png');
    var baseEncodedData = data.replace("data:image/png;base64,", "");
    var params = {'baseImage' : baseEncodedData, 'layerImageFilename' : layerImageFilename, 'SessionState' : "LAYER"};
*/
    // ft_sendHTTPRequest("POST", params, "");
}