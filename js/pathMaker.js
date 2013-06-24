var map = false;
var nowLatLng = {}

function locationError(error){
}

function locationSuccess(position){
    var coords = position.coords;
    var latlng = new google.maps.LatLng(
        coords.latitude,
        coords.longitude
    );
    var myOptions = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    nowLatLng = [coords.latitude, coords.longitude];
    if (map === false)
    {
        map = new google.maps.Map(
            document.getElementById("map-canvas"),myOptions
        );
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            clickable: false,
            flat: true,
        });
    }else
    {
        map.setCenter(latlng);
        marker.setPosition(latlng);
    }

}

function initialize(){
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(locationSuccess, locationError,{
            enableHighAcuracy: true,
            timeout: 5000,
            maximumAge: 3000
        });
    }else{
        alert("Your browser does not support Geolocation!");
    }
}
google.maps.event.addDomListener(window, 'load', initialize);


function setQuestionHere()
{
    var question = $("#question")[0].value
    var answer = $("#answer")[0].value
    if (question == "" || answer == "")
    {
        alert("question can not be blank");
    }

    $.post("ajaxServer.php",{todo: "makepath", username: nowPathMaker , data:{question: question, answer: answer, lat: nowLatLng[0], lng: nowLatLng[1]}},function(result){
        var latlng = new google.maps.LatLng(
            nowLatLng[0],
            nowLatLng[1]
        );
        var targetMarker = new google.maps.Circle({
            center:latlng,
            radius:100,
            strokeColor:"#0000FF",
            strokeOpacity:0.8,
            strokeWeight:2,
            fillColor:"#0000FF",
            fillOpacity:0.4
        });
        targetMarker.setMap(map);
    });
}