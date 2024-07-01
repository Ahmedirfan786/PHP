<?php
include('connection.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['update'])) {
        $pname = $_POST['name'];
        $pprice = $_POST['price'];

    
        if(isset($_FILES["image"]) && $_FILES["image"]["name"] != '') {
            $filename = $_FILES["image"]['name'];
            $file_tmp_name = $_FILES['image']['tmp_name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $destination = 'images/' . $filename;

            if($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
                
                if(move_uploaded_file($file_tmp_name, $destination)) {
                    
                    $query = $pdo->prepare("UPDATE products SET name = :pname, price = :pprice, image = :pimg WHERE id = :id");
                    $query->bindParam(":pname", $pname);
                    $query->bindParam(":pprice", $pprice);
                    $query->bindParam(":pimg", $filename);
                    $query->bindParam(":id", $id);
                    $query->execute();
                    echo "<script>alert('Product updated successfully');</script>";
                } else {
                    echo "<script>alert('Failed to upload new image');</script>";
                }
            } else {
                echo "<script>alert('Invalid file format. Only JPG, JPEG, PNG files are allowed.');</script>";
            }
        } else {
            
            $query = $pdo->prepare("UPDATE products SET name = :pname, price = :pprice WHERE id = :id");
            $query->bindParam(":pname", $pname);
            $query->bindParam(":pprice", $pprice);
            $query->bindParam(":id", $id);
            $query->execute();
            echo "<script>alert('Product updated successfully');</script>";
        }
    }
} else {
    
    header("Location: read.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update Product</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center mt-3 mb-4">Edit Product</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Image (Optional)</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="max-width: 200px; max-height: 200px;">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Product</button>
                    <a href="read.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
