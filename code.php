<?php
/**
 * Open weather API.
 * 
 * PHP version 7
 * 
 * @category  Web_App.
 * @package   CEDCOSS
 * @author    Shashikant Bharti <surya.indian321@gmail.com>
 * @copyright 2020 CEDCOSS 
 * @license   CEDCOSS 
 * @version   GIT: <1.0>
 * @link      http://127.0.0.1/training/openweather
 */

$city = ucfirst($_REQUEST['city']);
// $city = "lucknow";
$url = "api.openweathermap.org/data/2.5/weather?q=$city&APPID=52a4978e7f58a9b54193ada03d48bbe5";

$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL, $url);
// Execute
$result=curl_exec($ch);
// Will dump a beauty json
$lon = json_decode($result)->coord->lon;
$lat = json_decode($result)->coord->lat;


$url = "https://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lon&exclude=hourly,minutely&appid=52a4978e7f58a9b54193ada03d48bbe5&units=metric";

curl_setopt($ch, CURLOPT_URL, $url);
// Execute
$result=curl_exec($ch);
$result = json_decode($result);


date_default_timezone_set("Asia/Kolkata");
$data = $result->daily;

foreach ($data as $d) {
    $myData[] = array(
        "day"=>Date('l', $d->dt), 
        "pressure"=>$d->pressure, 
        "humidity"=>$d->humidity, 
        "wind_speed"=>$d->wind_speed, 
        "wind_deg"=>$d->wind_deg, 
        "sunrise"=>Date('h:i', $d->sunrise),
        "sunset"=>Date('h:i', $d->sunset),
        "weather"=>$d->weather[0]->main,
        "weather_desc"=>$d->weather[0]->description,
        "temp_day"=>$d->temp->day,
        "temp_night"=>$d->temp->night,
        "temp_morn"=>$d->temp->morn,
        "temp_eve"=>$d->temp->eve,
        "temp_min"=>$d->temp->min,
        "temp_max"=>$d->temp->max,
        "feels_like_day"=>$d->feels_like->day,
        "feels_like_night"=>$d->feels_like->night,
        "feels_like_morn"=>$d->feels_like->morn,
        "feels_like_eve"=>$d->feels_like->eve
    );
}
echo json_encode($myData);

?>