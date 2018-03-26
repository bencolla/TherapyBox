

$(document).ready(function() {
    getLocation()
});

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        $("#location").html("Geolocation is not supported by this browser");
    }
}
function showPosition(position) {

    var request = new XMLHttpRequest();

    request.open('GET', 'https://api.openweathermap.org/data/2.5/weather?lat='+position.coords.latitude+'&lon='+position.coords.longitude+'&units=metric&appid=d0a10211ea3d36b0a6423a104782130e', true);
    request.onload = function () {

        // Begin accessing JSON data here
        var data = JSON.parse(this.response);

        if (request.status >= 200 && request.status < 400) {
           if(data.weather[0].main == 'Rain'){
               $('#weather-icon').css("background-image", "url(assets/images/rain_icon.png)")
           }
            else if(data.weather[0].main == 'Clouds'){
                $('#weather-icon').css("background-image", "url(assets/images/clouds_icon.png)")
            }
            else if(data.weather[0].main == 'Sunny' || data.weather[0].main == 'Clear'){
                $('#weather-icon').css("background-image", "url(assets/images/sun_icon.png)")
            }
            else{
               $('#weather-icon').html("Sorry, no icon to preview")
           }
            $("#location").html(data.name);
            $("#temperature").html(data.main.temp+' degrees');
        } else {
            console.log('Connection error');
        }
    }

    request.send();

}
