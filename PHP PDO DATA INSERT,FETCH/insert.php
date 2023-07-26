<?php
include('connection.php')
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
    <title>Insert into marksheet</title>
</head>
<style>
#formcontainer{
width:700px;
/* border: 2px solid #0d6efd; */
background-color: #fff;
margin: 0 auto;
border-radius:20px;
}

    form label{
    font-size: 20px;
    font-family: cursive;
}
form h4{
    color:#0d6efd;
}
.formbtn{
margin-top: 35px;
}

table{
    width:1200px;
}
</style>
<body>


<!-- Form container starts-->

<div class="container mt-2" id="formcontainer">
    <form method="POST">
        <div class="row">
            <h4 class="col-lg-12 mt-1">Students Result Form</h4>
        </div>
                <div class="mb-3 col-lg-10">
  <label for="exampleFormControlInput1" class="form-label">student name</label>
  <input type="name" class="form-control" name="name" required>
</div>

<div class="row">
<div class="mb-3 col-lg-6">
  <label for="exampleFormControlInput1" class="form-label">english</label>
  <input type="number" min="0" max="100" class="form-control" name="english" required>
</div>

<div class="mb-3 col-lg-6 ">
  <label for="exampleFormControlInput1" class="form-label">science</label>
  <input type="number" min="0" max="100" class="form-control" name="science" required>
</div>


</div>

<div class="row">
<div class="mb-3 col-lg-6">
  <label for="exampleFormControlInput1" class="form-label">math</label>
  <input type="number" min="0" max="100" class="form-control" name="math" required>
</div>

<div class="mb-3 col-lg-6">
  <label for="exampleFormControlInput1" class="form-label">urdu</label>
  <input type="number" min="0" max="100" class="form-control" name="urdu" required>
</div>



</div>

<div class="row">
<div class="mb-3 col-lg-6">
  <label for="exampleFormControlInput1" class="form-label">pakstudies</label>
  <input type="number" min="0" max="100" class="form-control" name="pakstudies">
</div>

<div class="col-lg-6 formbtn">
<button type="submit" class="btn btn-primary" name="insert">Submit</button>
</div>
</div>
                </form>
</div>


<!-- Form container ends -->





    <!-- <?php
    if(isset($_POST['insert'])){
        $name=$_POST['name'];
        $english=$_POST['english'];
        $science=$_POST['science'];
        $math=$_POST['math'];
        $urdu=$_POST['urdu'];
        $pakstudies=$_POST['pakstudies'];
        $obt_marks=$english+$science+$math+$urdu+$pakstudies;
        $total_marks=500;
        $percentage=($obt_marks/$total_marks)*100;
        $grade="";
        $remarks="";

        if($percentage>=90){
            $grade="A*";
            $remarks="Outstanding";
        }
        elseif($percentage>=80){
            $grade="A";
            $remarks="Excellent";
        }
        elseif($percentage>=70){
            $grade="B";
            $remarks="Good";
        }
        elseif($percentage>=60){
            $grade="C";
            $remarks="Not too bad";
        }
        elseif($percentage>=50){
            $grade="D";
            $remarks="Need hardwork";
        }
        elseif($percentage>=45){
            $grade="E";
            $remarks="Need improvment";
        }
        else{
            $grade="F";
            $remarks="Better luck next time ";
        }

        $query=$pdo->prepare('Insert into marksheet(name,english,science,math,urdu,pakstudies,obt_marks,percentage,grade,remarks) values(:pname,:penglish,:pscience,:pmath,:purdu,:ppakstudies,:pobt_marks,:ppercentage,:pgrade,:premarks)');
        $query->BindParam("pname",$name);
        $query->BindParam("penglish",$english);
        $query->BindParam("pscience",$science);
        $query->BindParam("pmath",$math);
        $query->BindParam("purdu",$urdu);
        $query->BindParam("ppakstudies",$pakstudies);
        $query->BindParam("pobt_marks",$obt_marks);
        $query->BindParam("ppercentage",$percentage);
        $query->BindParam("pgrade",$grade);
        $query->BindParam("premarks",$remarks);
        $query->execute();

        echo "<script>alert(\"successsfully sent\")</script>";
    }

    ?> -->





<!-- View container starts -->


<div class="container-fluid" id="viewcontainer">

<div class="row">
    <div class="col-lg-12 mt-5">
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
        <td><button type="button" class="btn btn-success">Edit</button></td>
        <td><button type="button" class="btn btn-danger">Delete</button></td>
        
    </tr>
    <?php
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