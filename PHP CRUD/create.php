<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create Product</title>
    <style>
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center">Add Product</h2>
                
                <form method="post" enctype="multipart/form-data">

                <?php
                include('connection.php');

                if(isset($_POST['addproduct'])){
                    $pname = $_POST['name'];
                    $pprice = $_POST['price'];
                    $filename = $_FILES["image"]['name'];
                    $file_tmp_name = $_FILES['image']['tmp_name'];
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                    $destination = 'images/' . $filename;

                    
                    if($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
                        
                        if(move_uploaded_file($file_tmp_name, $destination)) {
                            
                            $checkproduct = $pdo->prepare("SELECT COUNT(*) FROM products WHERE name = :pname");
                            $checkproduct->bindParam(":pname", $pname);
                            $checkproduct->execute();
                            $count = $checkproduct->fetchColumn();

                            if($count > 0) {
                                echo "<script>alert('Product already exists');</script>";
                            } else {
                                
                                $query = $pdo->prepare("INSERT INTO products (name, price, image) VALUES (:pname, :pprice, :pimg)");
                                $query->bindParam(":pname", $pname);
                                $query->bindParam(":pprice", $pprice);
                                $query->bindParam(":pimg", $filename);
                                $query->execute();
                                echo "<script>alert('Product added successfully');
                                location.assign('read.php');
                                </script>";
                            }
                        } else {
                            echo "<script>alert('Failed to upload image');</script>";
                        }
                    } else {
                        echo "<script>alert('Invalid file format. Only JPG, JPEG, PNG files are allowed.');</script>";
                    }
                }
                ?>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" required class="form-control" onchange="previewImage(event)">
                        <img id="imagePreview" class="preview-image" src="#" alt="Image Preview">
                    </div>
                    <button type="submit" name="addproduct" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.style.display = 'block'; 
                output.src = reader.result;
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
</body>
</html>
