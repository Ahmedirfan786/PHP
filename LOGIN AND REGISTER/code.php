<?php
include('connection.php');
?>

<!-- Register Code -->
<?php
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query=$pdo->prepare('Insert into users(name,email,password) values(:uname,:uemail,:upassword)');
    $query->bindParam("uname",$name);
    $query->bindParam("uemail",$email);
    $query->bindParam("upassword",$password);
    $query->execute();

    echo "<script>alert('Account Created Successfully');
    location.assign('login.php');
    </script>";
}
?>

<!-- Login Code -->
<?php
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $query=$pdo->prepare('select * from users where email=:uemail && password=:upassword');
    $query->bindParam("uemail",$email);
    $query->bindParam("upassword",$password);
    $query->execute();
    $verified = $query->fetch(PDO::FETCH_ASSOC);
    if($verified){
        echo"<script>
        alert('logged in successfully');
        location.assign('index.php');
        </script>";
    }
}
?>