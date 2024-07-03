<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    <style>
        body {
            background: linear-gradient(to right, #00c6ff, #0072ff);
            color: #fff;
            text-align: center;
        }
        .weather-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="weather-container">
                    <h1 class="mb-4">Weather App</h1>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label for="country">Enter Country Name:</label>
                            <input type="text" id="country" name="country" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </form>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $country = $_POST['country'];
                        $apiKey = 'YOUR_API_KEY'; // Replace with your OpenWeatherMap API key
                        $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$country}&appid={$apiKey}&units=metric";
                        
                        $response = file_get_contents($apiUrl);
                        $weatherData = json_decode($response, true);

                        if ($weatherData && $weatherData['cod'] == 200) {
                            $city = $weatherData['name'];
                            $temp = $weatherData['main']['temp'];
                            $weather = $weatherData['weather'][0]['description'];

                            echo "<div class='mt-4'>";
                            echo "<h2>Weather in {$city}</h2>";
                            echo "<p><strong>Temperature:</strong> {$temp} &deg;C</p>";
                            echo "<p><strong>Weather:</strong> {$weather}</p>";
                            echo "</div>";
                        } else {
                            echo "<p class='mt-4'>City not found. Please try again.</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
