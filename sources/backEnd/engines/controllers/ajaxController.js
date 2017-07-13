function ft_sendHTTPRequest(httpRequestAction, httpPostActionParams, getFormParams, handler) {

    var xhttpRequest = new XMLHttpRequest();

    xhttpRequest.open(httpRequestAction, handler + getFormParams, true);

    xhttpRequest.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {

            var response = xhttpRequest.response;

            console.log(response);
            return response;
        }
    };

    if (getFormParams !== "")
        xhttpRequest.send();
    else
        xhttpRequest.send(JSON.stringify(httpPostActionParams));
}
