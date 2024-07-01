<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>View Products</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">OUR PRODUCTS</h1>
                <button class="btn btn-info"><a class="text-white" href="read.php">Read📚</a></button>

                
                <div class="row mt-5">

                    <?php
                    include('connection.php');

                    $stmt = $pdo->query("SELECT * FROM products");
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($products as $product) {
                        $image_path = 'images/' . $product['image'];
                    ?>

                    <div class="col-lg-3 mt-3">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $image_path; ?>" class="card-img-top img-fluid"
                                alt="<?php echo $product['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <p class="card-text">Price: $<?php echo $product['price']; ?></p>
                                <a href="#" class="btn btn-primary">Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>
</body>

</html>
