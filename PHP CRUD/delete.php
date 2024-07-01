<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Confirm Delete Product</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center">Confirm Delete Product</h2>

                <?php
                include('connection.php');

                if(isset($_GET['id'])) {
                    $product_id = $_GET['id'];

                    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
                    $stmt->bindParam(':id', $product_id);
                    $stmt->execute();
                    $product = $stmt->fetch(PDO::FETCH_ASSOC);

                    if($product) {
                        $image_path = 'images/' . $product['image'];
                        ?>

                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php echo $image_path; ?>" class="img-fluid" alt="Product Image">
                            </div>
                            <div class="col-md-6">
                                <h3>Product Details</h3>
                                <p><strong>ID:</strong> <?php echo $product['id']; ?></p>
                                <p><strong>Name:</strong> <?php echo $product['name']; ?></p>
                                <p><strong>Price:</strong> <?php echo $product['price']; ?></p>

                                <form method="post">
                                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                    <button type="submit" name="confirm_delete" class="btn btn-danger">Confirm Delete</button>
                                    <a href="read.php" class="btn btn-secondary">Cancel</a>
                                </form>

                                <?php
                                if(isset($_POST['confirm_delete'])) {
                                    $product_id = $_POST['id'];

                                    if(file_exists($image_path)) {
                                        unlink($image_path); 
                                    }

                                    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
                                    $stmt->bindParam(':id', $product_id);

                                    if($stmt->execute()) {
                                        echo "<script>alert('Product deleted successfully');</script>";
                                        echo "<script>location.assign('read.php');</script>";
                                    } else {
                                        echo "<script>alert('Failed to delete product');</script>";
                                    }
                                }
                                ?>
                                
                            </div>
                        </div>

                        <?php
                    } else {
                        echo "<p class='text-center'>Product not found.</p>";
                    }
                } else {
                    echo "<p class='text-center'>Product ID not provided.</p>";
                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
