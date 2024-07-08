<?php
session_start();

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

if (isset($_POST['increment'])) {
    $_SESSION['counter']++;
}

if (isset($_POST['decrement'])) {
    if ($_SESSION['counter'] > 0) {
        $_SESSION['counter']--;
    }
}

if (isset($_POST['reset'])) {
    $_SESSION['counter'] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Counter Example</title>
<style>
    body {
        background-color: #f8f9fa;
        background-image: linear-gradient(45deg, #93a5cf 0%, #e4efe9 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0; 
        font-family: Arial, sans-serif;
    }

    .card {
        width: 400px;
        border: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        background-color: #ffffff;
        border-radius: 8px;
        text-align: center;
    }

    .card-header {
        background-color: #007bff;
        color: white;
        text-align: center;
        padding: 10px;
        border-radius: 8px 8px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-primary:focus {
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-danger:focus {
        box-shadow: 0 0 0 0.2rem rgba(225, 83, 97, 0.5);
    }
</style>
</head>
<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="card-title">PHP Counter Example</h2>
            </div>
            <div class="card-body">
                <h3>Current Count: <?php echo $_SESSION['counter']; ?></h3>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <button type="submit" class="btn btn-primary" name="increment">Increment</button>
                    <button type="submit" class="btn btn-primary ml-2" name="decrement">Decrement</button>
                    <button type="submit" class="btn btn-danger ml-2" name="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
