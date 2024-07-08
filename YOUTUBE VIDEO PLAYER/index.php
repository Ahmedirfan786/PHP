<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>YouTube Video Player</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #ccc;
        padding-top: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card-header {
        background-color: #007bff;
        color: white;
        text-align: center;
        padding: 10px;
        border-radius: 8px 8px 0 0;
    }

    .card-body {
        background-color: #ffffff;
        border-radius: 0 0 8px 8px;
    }

    .form-inline {
        justify-content: center;
    }

    .form-control {
        width: 70%;
    }

    
    .error-message {
        color: red;
        font-weight: bold;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">YouTube Video Player</h2>
            </div>
            <div class="card-body">
                <div class="video-container">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $videoLink = $_POST['videoLink'];

                        $urlParts = parse_url($videoLink);
                        parse_str($urlParts['query'], $query);
                        $videoID = $query['v'];

                        if (!empty($videoID)) {
                            echo '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' . $videoID . '" frameborder="0" allowfullscreen></iframe>';
                        } else {
                            echo '<p class="error-message text-center">Please enter a valid YouTube video link.</p>';
                        }
                    }
                    ?>
                </div>
                <form method="post" class="form-inline justify-content-center">
                    <div class="form-group mb-2">
                        <label for="videoLink" class="sr-only">Enter YouTube Video Link:</label>
                        <input type="text" id="videoLink" name="videoLink" class="form-control mr-2" placeholder="Enter YouTube Video Link" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Play Video</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
