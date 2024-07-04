<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dictionary App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    <style>
        body {
            background-color: #f8f9fa; 
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
            border-radius: 10px;
        }
        .result {
            margin-top: 20px;
            padding: 20px;
            background-color: #f1f8ff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        .error-message {
            color: #dc3545; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Dictionary App</h2>
        
        <form method="get">
            <div class="form-group">
                <label for="word">Enter a word:</label>
                <input type="text" id="word" name="word" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        
        <div class="result">
            <?php
            if(isset($_GET['word'])) {
                $word = urlencode($_GET['word']);
                $api_key = 'your_merriam_webster_api_key'; // Replace with your Merriam-Webster API key

                // Make request to Merriam-Webster API
                $url = "https://www.dictionaryapi.com/api/v3/references/collegiate/json/{$word}?key={$api_key}";

                $response = file_get_contents($url);

                if ($response) {
                    $data = json_decode($response, true);

                    if (isset($data[0]['meta']['id'])) {
                        echo "<h3>Definition of '{$word}':</h3>";
                        echo "<p>{$data[0]['shortdef'][0]}</p>";
                    } else {
                        echo "<p class='error-message'>Sorry, the definition of '{$word}' is not found.</p>";
                    }
                } else {
                    echo "<p class='error-message'>Failed to retrieve definition. Please try again later.</p>";
                }
            } else {
                echo "<p class='text-muted'>Please enter a word in the search box above.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
