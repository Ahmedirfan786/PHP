<?php

include('Connection.php');
$reponse = array();
if($con){
    $sql="Select * from users";
    $result=mysqli_query($con,$sql);

    if($result){
        header('Content-Type: JSON');
        $i=0;

        while($row=mysqli_fetch_assoc($result)){
            $reponse[$i]['id']=$row['id'];
            $reponse[$i]['name']=$row['name'];
            $reponse[$i]['email']=$row['email'];
            $reponse[$i]['phone']=$row['phone'];
            $reponse[$i]['image']=$row['image'];
            $i++;
        }
        echo json_encode($reponse,JSON_PRETTY_PRINT);
    }
}

?>