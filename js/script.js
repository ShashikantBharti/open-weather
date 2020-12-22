$(document).ready(function(){
    $('.modal').modal();
    $('#getData').on('click', function(e){
        e.preventDefault();
        let city = $('#city').val();
        $('#showCity').text(city);
        data = {city: city}
        $.ajax({
            url: "code.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: showData,
        });
   })
});
 
function showData(res) {
    if(res == '') {
        console.log(res);
    }
    console.log(res);
    let html = ``;
    let today = new Date();
    let hour = today.getHours();
    console.log(hour);
    $.each(res, function(index, item) {
        html += `
        <div class="col m4">
        <div class="card blue">
            <div class="card-content white-text">
                <span class="card-title"> ${item.day} </span>
                <p><strong>${item.weather}</strong> <span class="right">(${item.weather_desc})<span></p>`;

        if (hour > 3 && hour <= 9) {
            html +=`<h3><i class="fas fa-cloud-sun"></i> <span>Morning</span></h3>
                    <h1 class="center">${item.temp_morn} <sup>o</sup>C</h1>
                `;
        } else if (hour > 9 && hour <= 15) {
            html +=`<h3><i class="fas fa-cloud-sun"></i> <span>Day</span></h3>
                    <h1 class="center">${item.temp_day} <sup>o</sup>C</h1>
                `;
        } else if(hour > 15 && hour <= 21) {
            html +=`<h3><i class="fas fa-cloud-sun"></i> <span>Evening</span></h3>
                    <h1 class="center">${item.temp_eve} <sup>o</sup>C</h1>
                `;
        } else {
            html +=`<h3><i class="fas fa-cloud-sun"></i> <span>Night</span></h3>
                    <h1 class="center">${item.temp_night} <sup>o</sup>C</h1>
                `;
        }

        html +=`<h5>Events</h5>
                <h6>Sunrise: <span>${item.sunrise} AM</span></h6>
                <h6>Sunset: <span>${item.sunset} PM</span></h6>
                <h5>Temprature <sup>o</sup>C</h5>
                <h6>Maximum: <span>${item.temp_max} <sup>o</sup>C</span></h6>
                <h6>Minimum: <span>${item.temp_min} <sup>o</sup>C</span></h6>
                <h6>Morning: <span>${item.temp_morn} <sup>o</sup>C</span></h6>
                <h6>Evening: <span>${item.temp_eve} <sup>o</sup>C</span></h6>
                <h6>Day: <span>${item.temp_day} <sup>o</sup>C</span></h6>
                <h6>Night: <span>${item.temp_night} <sup>o</sup>C</span></h6>
                <h5>Feels Like <sup>o</sup>C</h5>
                <h6>Morning: <span>${item.feels_like_morn} <sup>o</sup>C</span></h6>
                <h6>Evening: <span>${item.feels_like_eve} <sup>o</sup>C</span></h6>
                <h6>Day: <span>${item.feels_like_day} <sup>o</sup>C</span></h6>
                <h6>Night: <span>${item.feels_like_night} <sup>o</sup>C</span></h6>
                <h5>Others</h5>
                <h6>Pressure: <span>${item.pressure} mBar</span></h6>
                <h6>Wind: <span>${item.wind_speed} m/s</span></h6>
                <h6>Wind Direction: <span>${item.wind_deg} Deg</span></h6>
                <h6>Humidity: <span>${item.humidity} %</span></h6>
            </div>
        </div>
    </div>
    `;
        console.log(item);
    });
    $('#result').html(html);
}

