<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" 
        crossorigin="anonymous" 
    />
    <!-- Compiled and minified CSS -->
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    >

    <link rel="stylesheet" href="css/style.css">
    
    <title>Weather Forecast App</title>
</head>
<body>
<!-- Header -->
<header>
<i class="fas fa-cloud-sun-rain"></i>
    <h2>Weather Forecast</h2>
</header>
<!-- //Header -->

<!-- Input Form -->
<div id="inputForm" class="container">
    <label for="city">City Name</label>
    <input type="text" name="city" id="city" placeholder="Enter City Name...">
    <button id="getData" class="btn btn-primary blue">Forecast</button>
</div>
<!-- //Input Form -->

<!-- Show Result -->
<div id="showData" class="container">
    <h4 class="center blue white-text" id="showCity"></h3>
    <div class="row" id="result"></div>
</div>
<!-- //Show Result -->



<script 
    src="https://code.jquery.com/jquery-3.5.1.min.js" 
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" 
    crossorigin="anonymous">
</script>
    <!-- Compiled and minified JavaScript -->
<script 
src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
</script>
<script src="js/script.js"></script>
</body>
</html>



