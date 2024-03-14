<?php
    $status = "";
    if(isset($_POST['submit'])){
        $city = $_POST['city'];
        $url = "https://api.openweathermap.org/data/2.5/forecast?q=$city&appid=7c024bb7848f3e48f94d3d6edb552a76&units=metric";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result,true);
        $status = "yes";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Weather App</title>
</head>
<body>
    <h1>Weather Dashboard</h1>
    <div class="container">
      <div class="weather-input">
        <h3>Enter a City Name</h3>
        <form  action="" method="post">
          <input class="city-input" type="text" placeholder="E.g. New York" name="city">
          <input type="submit" class="search-btn" value="Search" name="submit">
        </form>
      </div>
      <?php if($status=="yes"){ ?>
      <div class="weather-data">
        <div class="current-weather">
          <div class="details">
          <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][0]['weather'][0]['icon'] ?>@2x.png" class="weather-icon">
            <h6><?php echo date('d M y',$result['list'][0]['dt']) ?></h6>
            <h2><?php echo $result['city']['name'] ?> </h2>
            <h6> <?php echo date('D',$result['list'][0]['dt']) ?></h6>
            <h6>Temperature: <?php echo round($result['list'][0]['main']['temp']) ?> &#8451;</h6>
            <h6>Feels Like: <?php echo round($result['list'][0]['main']['feels_like']) ?> &#8451;</h6>
            <h6>Wind: <?php echo $result['list'][0]['wind']['speed'] ?> km/h</h6>
            <h6>Humidity: <?php echo $result['list'][0]['main']['humidity'] ?>%</h6>
          </div>
        </div>
        <div class="days-forecast">
          <h2>5-Day Forecast</h2>
          <ul class="weather-cards">
            <li class="card">
            <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][2]['weather'][0]['icon'] ?>@2x.png" class="weather-icon">
              <h3> <?php echo date('d M y',$result['list'][2]['dt']) ?> </h3>
              <h6> <?php echo date('D',$result['list'][2]['dt']) ?></h6>
              <h6>Temp: <?php echo round($result['list'][2]['main']['temp']) ?> &#8451; </h6>
              <h6>Feels Like: <?php echo round($result['list'][2]['main']['feels_like']) ?> &#8451;</h6>
              <h6>Wind: <?php echo $result['list'][2]['wind']['speed'] ?> km/h </h6>
              <h6>Humidity: <?php echo $result['list'][2]['main']['humidity'] ?>% </h6>
            </li>
            <li class="card">
            <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][11]['weather'][0]['icon'] ?>@2x.png" class="weather-icon">
              <h3> <?php echo date('d M y',$result['list'][11]['dt']) ?> </h3>
              <h6> <?php echo date('D',$result['list'][11]['dt']) ?></h6>
              <h6>Temp: <?php echo round($result['list'][11]['main']['temp']) ?> &#8451; </h6>
              <h6>Feels Like: <?php echo round($result['list'][11]['main']['feels_like']) ?> &#8451;</h6>
              <h6>Wind: <?php echo $result['list'][11]['wind']['speed'] ?> km/h </h6>
              <h6>Humidity: <?php echo $result['list'][11]['main']['humidity'] ?>% </h6>
            </li>
            <li class="card">
            <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][19]['weather'][0]['icon'] ?>@2x.png" class="weather-icon">
              <h3> <?php echo date('d M y',$result['list'][19]['dt']) ?> </h3>
              <h6> <?php echo date('D',$result['list'][19]['dt']) ?></h6>
              <h6>Temp: <?php echo round($result['list'][19]['main']['temp']) ?> &#8451; </h6>
              <h6>Feels Like: <?php echo round($result['list'][19]['main']['feels_like']) ?> &#8451;</h6>
              <h6>Wind: <?php echo $result['list'][19]['wind']['speed'] ?> km/h </h6>
              <h6>Humidity: <?php echo $result['list'][19]['main']['humidity'] ?>% </h6>
            </li>
            <li class="card">
            <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][27]['weather'][0]['icon'] ?>@2x.png" class="weather-icon">
              <h3> <?php echo date('d M y',$result['list'][27]['dt']) ?> </h3>
              <h6> <?php echo date('D',$result['list'][27]['dt']) ?></h6>
              <h6>Temp: <?php echo round($result['list'][27]['main']['temp']) ?> &#8451; </h6>
              <h6>Feels Like: <?php echo round($result['list'][27]['main']['feels_like']) ?> &#8451;</h6>
              <h6>Wind: <?php echo $result['list'][27]['wind']['speed'] ?> km/h </h6>
              <h6>Humidity: <?php echo $result['list'][27]['main']['humidity'] ?>% </h6>
            </li>
            <li class="card">
            <img src="https://openweathermap.org/img/wn/<?php echo $result['list'][35]['weather'][0]['icon'] ?>@2x.png" class="weather-icon">
              <h3> <?php echo date('d M y',$result['list'][35]['dt']) ?> </h3>
              <h6> <?php echo date('D',$result['list'][35]['dt']) ?></h6>
              <h6>Temp: <?php echo round($result['list'][35]['main']['temp']) ?> &#8451; </h6>
              <h6>Feels Like: <?php echo round($result['list'][35]['main']['feels_like']) ?> &#8451;</h6>
              <h6>Wind: <?php echo $result['list'][35]['wind']['speed'] ?> km/h </h6>
              <h6>Humidity: <?php echo $result['list'][35]['main']['humidity'] ?>% </h6>
            </li>
          </ul>
        </div>
      </div>
      <?php } ?>
    </div>
</body>
</html>