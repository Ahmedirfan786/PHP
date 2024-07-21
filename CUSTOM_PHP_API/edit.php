<?php

include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetching user data
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $image = $_POST['image'];

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', image='$image' WHERE id=$id";

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
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
    <style>
        .img-preview {
            height: 200px;
            object-fit: cover;
            display: block; /* Show the image by default */
        }
    </style>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Edit User</h1>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= $user['phone'] ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="text" class="form-control" id="image" name="image" value="<?= $user['image'] ?>" required oninput="showImagePreview()">
            </div>
            <div class="form-group">
                <img id="imgPreview" class="img-thumbnail img-preview" alt="Image Preview" src="<?= $user['image'] ?>">
            </div>
            <button type="submit" name="edit" class="btn btn-warning">Update User</button>
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
