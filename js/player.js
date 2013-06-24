var targetLatLng = {};
var gameStatus = "stop";
var map = false;
var nowLatLng = {}
var selfMarker;
var targetMarker;

function Rad(d){
    return d * Math.PI / 180.0;
}
function GetDistance(lat1,lng1,lat2,lng2){

    var radLat1 = Rad(lat1);
    var radLat2 = Rad(lat2);
    var a = radLat1 - radLat2;
    var  b = Rad(lng1) - Rad(lng2);
    var s = 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(a/2),2) +
        Math.cos(radLat1)*Math.cos(radLat2)*Math.pow(Math.sin(b/2),2)));
    s = s *6378.137 ;
    s = Math.round(s * 10000) / 10;
    return s;
}

function checkPosition()
{
    if (GetDistance(targetLatLng[0], targetLatLng[1], nowLatLng[0], nowLatLng[1]) < 100)
    {
        $("#popupButton")[0].className = "ui-btn ui-shadow ui-btn-corner-all ui-btn-inline ui-btn-up-c";
    }
}

function getNextPosition(isNext)
{
    $.post("ajaxServer.php", {todo: 'getPath', username: username, isNext: isNext}, function(result){
        if (result == "End")
        {
            alert ("you reached the finishing!!");
            nowStatus = "finished";
            targetLatLng = [0, 0];
        }
        else
        {
            result = eval('(' + result + ')');
            targetLatLng = [result.lat, result.lng];
            var latlng = new google.maps.LatLng(
                result.lat,
                result.lng
            );
            targetMarker.setCenter(latlng);
            $("#question").text(result.question);
        }
        $("#popupButton")[0].className = "ui-disabled ui-btn ui-shadow ui-btn-corner-all ui-btn-inline ui-btn-up-c"
        checkPosition();
    })
}

function checkAnswer()
{
    var answer = $("#answer")[0].value;
    $.post("ajaxServer.php", {todo: 'checkAnswer', username: username, answer: answer}, function(result){
        if (result == "true")
        {
            getNextPosition("true");
        }else
        {
            alert('wrong answer');
        }
    });
}


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
        selfMarker = new google.maps.Marker({
            position: latlng,
            map: map,
            clickable: false,
            flat: false,
        });
        targetMarker = new google.maps.Circle({
            center:latlng,
            radius:100,
            strokeColor:"#0000FF",
            strokeOpacity:0.8,
            strokeWeight:2,
            fillColor:"#0000FF",
            fillOpacity:0.4
        });
        targetMarker.setMap(map);
        getNextPosition("false");
    }else
    {
        map.setCenter(latlng);
        selfMarker.setCenter(latlng);
        checkPosition();
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