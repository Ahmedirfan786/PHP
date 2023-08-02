<?php
session_start();
include('Connection.php');

if(isset($_POST['login'])){
    $email=($_POST['email']);
    $password=($_POST['password']);
    $query=$pdo->prepare('Select * From testaccounts where email=:pemail && password=:ppassword');
    $query->bindParam("pemail",$email);
    $query->bindParam("ppassword",$password);
    $query->execute();
    $final=$query->fetch(PDO::FETCH_ASSOC);

    if($final){
        $_SESSION['uemail']=$final['email'];
        echo "<script>
        alert('Logged in successfully');
        location.assign('view.php');
        </script>";
    }
    else{
        echo "<script>
        alert('Email or password doesnt match');
        </script>";
    }
}
?>