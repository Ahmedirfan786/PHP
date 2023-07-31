<?php
include('Connection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<style>
    table{
    width:1200px;
}

</style>
<body>
<div class="container-fluid" id="viewcontainer">

<div class="row">
    <div class="col-lg-12 mt-2">
        <form>
            <button type="button" class="btn btn-outline-warning" name="viewtablebtn" id="viewbtn" ">View Table</button>
            <button type="button" class="btn btn-outline-dark" name="hidetablebtn" id="hidebtn" ">Hide Table</button>
        </form>
    </div>
</div>

<div class="row" id="marksheettable">
    <div class="col-lg-12 mt-3">


<table border="1">
<thead>
    <tr>
        <th>Id</th>
        <th>name</th>
        <th>english</th>
        <th>science</th>
        <th>maths</th>
        <th>urdu</th>
        <th>pakstudies</th>
        <th>obt_marks</th>
        <th>total_marks</th>
        <th>percentage</th>
        <th>grade</th>
        <th>remarks</th>
        <th>edit</th>
        <th>delete</th>
    </tr>
</thead>

<tbody>

<?php
$query= $pdo->query('SELECT * FROM marksheet');
$res=$query->fetchAll(PDO::FETCH_ASSOC);
foreach($res as $data){
    ?>
    <tr>
        <td><?php echo $data['id']?></td>
        <td><?php echo $data['name']?></td>
        <td><?php echo $data['english']?></td>
        <td><?php echo $data['science']?></td>
        <td><?php echo $data['math']?></td>
        <td><?php echo $data['urdu']?></td>
        <td><?php echo $data['pakstudies']?></td>
        <td><?php echo $data['obt_marks']?></td>
        <td><?php echo $data['total_marks']?></td>
        <td><?php echo $data['percentage']?></td>
        <td><?php echo $data['grade']?></td>
        <td><?php echo $data['remarks']?></td>
        <form method="GET">
            <td><button type="button" class="btn btn-success"><a href="update.php?id=<?php echo $data['id']?>" style=color:white;>Edit</a></button></td>
        </form>

        <form method="GET">
            <td><button type="button" class="btn btn-danger"><a href="view.php?id=<?php echo $data['id']?>" style=color:white;>Delete</a></button></td>
        </form>
        
    </tr>
    <?php
}
?>

<?php
if(isset($_GET['id'])){
    $sid=$_GET['id'];
    $query = $pdo->prepare("DELETE FROM marksheet WHERE id = :pid");
$query->bindParam("pid", $sid);
$query->execute();

    echo "<script>alert('Record deleted succesfully');
    location.assign('view.php')</script>";
    
}
?>

</tbody>

</table>

  </div>
         
</div>



<!-- View container ends -->
</body>
<?php

    echo "<script>
   $(document).ready(function(){

    $('#viewbtn').click(function(){
    $('#marksheettable').show();
    });

    $('#hidebtn').click(function(){
    $('#marksheettable').hide();
    });

   });
    </script>";
   

?>
</html>