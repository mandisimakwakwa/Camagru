
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

    alert("You Pressed the Snap Button");
}

function ft_saveButton() {

    alert("You Pressed the Save Button");
}

function ft_uploadButton() {

    alert("You Pressed the Upload Button");
}

function ft_mergeButton() {

    alert("You Pressed the Merge Button");
}