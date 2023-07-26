<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>

<h1>Country code</h1>
<form method="POST">
<div class="input-group mb-3">
  <input name="code" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<button type="Submit" name="getcode">Submit</button>
</form>
</body>

<?php
if(isset($_POST['getcode'])){
    $code=$_POST['code'];
    $pk="+92";
    $cm=strcmp($pk,$code);
    if($cm == 0){
        ?>
<div>
<table border='1'>
<tr>
<th>Country code</th>
<th>image</th>
<tr>

<tr>
<td><?php echo $pk?></td>
<td><img src='./pakimage.png'></td>
<tr>
</table>
</div>
<?php
    }
    else{
        echo "<div class='alert alert-danger' role='alert'>
        not country code of pakistan
        </div>";
    }
}

?>
</html>