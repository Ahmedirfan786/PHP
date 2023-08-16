<?php
session_start();
include("connection.php");

// sign up
if(isset($_POST['sign_up'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query=$pdo->prepare('Insert into user(name,email,password) Values(:pname,:pemail,:ppassword)');
    $query->bindParam("pname",$name);
    $query->bindParam("pemail",$email);
    $query->bindParam("ppassword",$password);
    $query->execute();

    echo "<script>alert('Successfully submitted');
    location.assign('signin.php');
    </script>";
}
// sign in
if(isset($_POST['sign_in'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query=$pdo->prepare('select * from user where email=:pemail && password=:ppass');
    $query->bindParam("pemail",$email);
    $query->bindParam("ppass",$password);
    $query->execute();
    $final = $query->fetch(PDO::FETCH_ASSOC);
    if($final){
        $_SESSION['uemail']=$final['email'];
        echo"<script>
        alert('logged in successfully');
        location.assign('index.php');
        </script>";
    }

   
}

// add category 

if(isset($_POST['cat_add'])){
    $cname = $_POST['cat_name'];
    $filename = $_FILES["cat_file"]['name'];
    $file_tmp_name = $_FILES['cat_file']['tmp_name'];
    $filesize = $_FILES['cat_file']['size'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $destination = 'img/' . $filename;
    
    if ($extension == "jpg" || $extension == "png" || $extension == "jpeg") {
        if (move_uploaded_file($file_tmp_name, $destination)) {
            
            // Check if the category already exists
            $existing_query = $pdo->prepare("SELECT id FROM category WHERE name = :cname");
            $existing_query->bindParam(":cname", $cname);
            $existing_query->execute();
            
            if ($existing_query->rowCount() > 0) {
                echo "
                <script>
                alert('Category already exists.');
                </script>
                ";
            } else {
                // Category does not exist, insert it
                $insert_query = $pdo->prepare("INSERT INTO category (name, image) VALUES (:pname, :pimg)");
                $insert_query->bindParam(":pname", $cname);
                $insert_query->bindParam(":pimg", $filename);
                $insert_query->execute();
                
                echo "
                <script>
                alert('Category added successfully.');
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('Something went wrong while uploading the file.');
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('Invalid file extension. Only jpg, jpeg, and png files are allowed.');
        </script>
        ";
    }
}
?>