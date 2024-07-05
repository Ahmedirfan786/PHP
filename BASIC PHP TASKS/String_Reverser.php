<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>String Reverser</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
    body {
        background: linear-gradient(to right, violet, #6c63ff);
        color: #fff;
        padding: 20px;
    }
    .container {
        max-width: 500px;
        background: rgba(255, 255, 255, 0.2);
        padding: 20px;
        border-radius: 10px;
        margin-top: 50px;
    }
    .form-group label {
        font-weight: bold;
    }
    .btn {
        background-color: #6c63ff;
        border-color: #6c63ff;
    }
    .btn:hover {
        background: linear-gradient(to right, violet, #6c63ff);
        border-color: white;
    }
</style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">String Reverser</h2>

    <form method="post" action="">
        <div class="form-group">
            <label for="inputString">Enter a string:</label>
            <input type="text" class="form-control" id="inputString" name="inputString" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Reverse</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {

        $inputString = $_POST['inputString'];

        $reversedString = strrev($inputString);

        echo "<div class='mt-4 alert alert-primary' role='alert'>";
        echo "<strong>Original String:</strong> $inputString<br>";
        echo "</div>";
        echo "<div class='mt-4 alert alert-success' role='alert'>";
        echo "<strong>Reversed String:</strong> $reversedString";
        echo "</div>";

    }
    ?>
</div>

</body>
</html>
