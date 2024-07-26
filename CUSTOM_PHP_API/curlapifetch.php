<?php

$api_url = 'http://localhost/PHPrepo/PHP/CUSTOM_pHP_API/api.php';

$curl = curl_init($api_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

curl_close($curl);

$data = json_decode($response, true);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Cards</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            width: 18rem;
            margin: 1rem;
        }
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
    </style>
<body>
    <div class="container mt-5">
        <div class="card-container">
            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $item) : ?>
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($item['email']); ?></p>
                            <p class="card-text"><?php echo htmlspecialchars($item['phone']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No data found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
