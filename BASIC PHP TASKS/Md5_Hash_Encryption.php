<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MD5 Hash Encryption Example</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
    body {
        background: linear-gradient(to right, #834d9b, #d04ed6);
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
        background-color: #534aa2;
        border-color: #534aa2;
    }
</style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">MD5 Hash Encryption</h2>

    <form method="post" action="">
        <div class="form-group">
            <label for="plaintext">Enter text to encrypt:</label>
            <input type="text" class="form-control" id="plaintext" name="plaintext" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">Encrypt</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
       
        $plaintext = $_POST['plaintext'];

        $encrypted_text = md5($plaintext);

        echo "<div class='mt-4 alert alert-success' role='alert'>";
        echo "<strong>Encrypted Text:</strong> $encrypted_text";
        echo "</div>";
    }
    ?>
</div>


</body>
</html>
