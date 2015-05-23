function getLocation() {
	document.getElementById("geolocation").src="images/icons/loading.gif";
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);

    } else {
        document.getElementById("status").innerHTML="Geolocation is not supported by this browser.";
    }

}
function showPosition(position){
	    geo_lat = document.getElementById("latitude");
        geo_long = document.getElementById("longitude");
        geo_lat.value = position.coords.latitude;
        geo_long.value = position.coords.longitude;
        document.search.submit();

}
 function showError(error) {
    var msg = "";
    switch(error.code) {
        case error.PERMISSION_DENIED:
            msg = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            msg = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            msg = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            msg = "An unknown error occurred."
            break;
    }
    document.getElementById("status").innerHTML = msg;
}