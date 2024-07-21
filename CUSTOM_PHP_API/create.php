<?php

include('connection.php');

if (isset($_POST['create'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $image = $_POST['image'];

    $sql = "INSERT INTO users (name, email, phone, image) VALUES ('$name', '$email', '$phone', '$image')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
    <style>
        .img-preview {
            height: 200px;
            object-fit: cover;
            display: none;
        }
    </style>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Add New User</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="text" class="form-control" id="image" name="image" required oninput="showImagePreview()">
            </div>
            <div class="form-group">
                <img id="imgPreview" class="img-thumbnail img-preview" alt="Image Preview">
            </div>
            <button type="submit" name="create" class="btn btn-primary">Add User</button>
        </form>
    </div>
</body>
    <script>
        function showImagePreview() {
            const imageUrl = document.getElementById('image').value;
            const imgPreview = document.getElementById('imgPreview');
            if (imageUrl) {
                imgPreview.src = imageUrl;
                imgPreview.style.display = 'block';
            } else {
                imgPreview.style.display = 'none';
            }
        }
    </script>
</html>
