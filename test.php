<?php
/**
 * Open weather API.
 * 
 * PHP version 7
 * 
 * @category   Web_App.
 * @package    CEDCOSS
 * @subpackage Test_Page
 * @author     Shashikant Bharti <surya.indian321@gmail.com>
 * @copyright  2020 CEDCOSS 
 * @license    CEDCOSS 
 * @version    GIT: <1.0>
 * @link       http://127.0.0.1/training/openweather
 */

if (isset($_REQUEST['city'])) {
    $city = ucfirst($_REQUEST['city']);
} else {
    header('location: 404.php');
}

date_default_timezone_set("Asia/Kolkata");
echo date('G');

$url = "https://api.openweathermap.org/data/2.5/onecall?lat=33.441792&lon=-94.037689&exclude=hourly,minutely&appid=52a4978e7f58a9b54193ada03d48bbe5&cnt=6";

// Init the curl.
$ch = curl_init();

// Disable SSL Certificate.
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Will return the response, If false it prints the response.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the url.
curl_setopt($ch, CURLOPT_URL, $url);

// Execute curl.
$result = curl_exec($ch);

echo '<pre>';

print_r(json_decode($result));

?>