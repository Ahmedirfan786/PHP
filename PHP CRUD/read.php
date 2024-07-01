<?php
include('connection.php');


$query = $pdo->query("SELECT * FROM products");
$products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Read Products</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="text-center mt-3 mb-4">Product List</h2>
                
                        <button class="btn btn-info mb-3"><a href="create.php" class="text-white">Add Product</a></button>
                        <button class="btn btn-success mb-3"><a href="view.php" class="text-white">View Products</a></button>
                
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['price']; ?></td>
                                <td>
                                    <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td>
                                    <a href="update.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="delete.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
