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

        //50: width, 25: height ; 200: width, 100: height
        context.drawImage(cam, 50, 25, 150, 130);
        canvas.setAttribute('src', data);
    } else {

        ft_clearPhoto(canvas, context, data);
    }
}

function ft_saveToGalleryButton() {

    var canvas = document.getElementById("canvasViewID");
    var data = canvas.toDataURL('image/png');
    var baseEncodedData = data.replace("data:image/png;base64,",  "");

    var params = {'baseImageSave' : baseEncodedData, 'SessionState' : "IMAGESAVE"};

    var handler = "../../../../sources/backEnd/engines/handlers/galleryHandler.php";

    var switchNode = "imageSave";

    ft_sendHTTPRequest("POST", params, "", handler, switchNode);
}

function ft_uploadToGalleryButton() {

    var uploadDiv = document.getElementById('uploadFormModalID');

    uploadDiv.style.display = "flex";
}

function ft_uploadSubmitButton(sourceContent) {

    //Get Email From Register Form Client-Side
    var httpUploadImageContent = sourceContent;

    //Session State is Register
    var params = {'httpUploadImageContent' : httpUploadImageContent, 'SessionState' : "UPLOAD"};

    var handler = "../../../../sources/backEnd/engines/handlers/galleryHandler.php";

    var switchNode = "imageUpload";

    ft_sendHTTPRequest("POST", params, "", handler, switchNode);
}

function ft_uploadImageContent(sourceContent) {

    var uploadRawImage = sourceContent;
    var fileContentReader = new FileReader();

    fileContentReader.readAsBinaryString(uploadRawImage[0]);
    fileContentReader.onload = function (e) {

        var uploadImageData = btoa(e.target.result);

        ft_uploadSubmitButton(uploadImageData);
    }
}

function ft_clearPhoto(canvas, context, data) {

    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    canvas.setAttribute('src', data);
}

//Send Gallery image and Merges image to Server-Side
function ft_mergeLayer(imageLayerContainer) {

    ft_enableSaveButton();

    var layerImageFilename = imageLayerContainer.id;
    var canvas = document.getElementById('canvasViewID');
    var data = canvas.toDataURL('image/png');
    var baseEncodedData = data.replace("data:image/png;base64,", "");
    var params = {'baseImage' : baseEncodedData, 'layerImageFilename' : layerImageFilename, 'SessionState' : "LAYER"};

    var handler = "../../../../sources/backEnd/engines/handlers/galleryHandler.php";

    var switchNode = "imageMerge";


    ft_sendHTTPRequest("POST", params, "", handler, switchNode);
}

function ft_enableSaveButton() {

    var saveButton = document.getElementById("saveButtonID");

    saveButton.style.background = "linear-gradient(to bottom right, dodgerblue, deepskyblue)";
    saveButton.style.pointerEvents = "auto";
}

function ft_closeUploadForm() {

    var uploadFormDiv = document.getElementById("uploadFormModalID");

    uploadFormDiv.style.display = "none";
}

function ft_comments(imageID) {

    var commentsDiv = document.getElementById("commentsContainerDivID");

    commentsDiv.style.display = "flex";
}

function ft_deleteImageButton(imageID) {

    //Get Email From Register Form Client-Side
    var httpImageID = imageID;

    //Session State is Register
    var params = {'imageID' : httpImageID, 'SessionState' : "DELETE"};

    var handler = "../../../../sources/backEnd/engines/handlers/galleryHandler.php";

    var switchNode = "imageDelete";

    ft_sendHTTPRequest("POST", params, "", handler, switchNode);
}