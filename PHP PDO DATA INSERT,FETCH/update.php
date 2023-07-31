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
</style>


<body>
<?php
if(isset($_GET['id'])){
    $sid=$_GET['id'];
    $query = $pdo->prepare("SELECT * FROM marksheet WHERE id = :pid");
$query->bindParam(":pid", $sid);
$query->execute();
$obj = $query->fetch(PDO::FETCH_ASSOC);?>

    <!-- Update Form container starts-->

<div class="container mt-2" id="formcontainer">
    <form method="POST">
        <div class="row">
            <h4 class="col-lg-12 mt-1">Update Form</h4>
        </div>
                <div class="mb-3 col-lg-10">
  <label for="exampleFormControlInput1" class="form-label">student name</label>
  <input type="name" class="form-control" name="name" required value="<?php echo $obj['name']?>">
</div>

<div class="row">
<div class="mb-3 col-lg-6">
  <label for="exampleFormControlInput1" class="form-label">english</label>
  <input type="number" min="0" max="100" class="form-control" name="english" required value="<?php echo $obj['english']?>">
</div>

<div class="mb-3 col-lg-6 ">
  <label for="exampleFormControlInput1" class="form-label">science</label>
  <input type="number" min="0" max="100" class="form-control" name="science" required value="<?php echo $obj['science']?>">
</div>


</div>

<div class="row">
<div class="mb-3 col-lg-6">
  <label for="exampleFormControlInput1" class="form-label">math</label>
  <input type="number" min="0" max="100" class="form-control" name="math" required value="<?php echo $obj['math']?>">
</div>

<div class="mb-3 col-lg-6">
  <label for="exampleFormControlInput1" class="form-label">urdu</label>
  <input type="number" min="0" max="100" class="form-control" name="urdu" required value="<?php echo $obj['urdu']?>">
</div>



</div>

<div class="row">
<div class="mb-3 col-lg-6">
  <label for="exampleFormControlInput1" class="form-label">pakstudies</label>
  <input type="number" min="0" max="100" class="form-control" name="pakstudies" required value="<?php echo $obj['pakstudies']?>">
</div>

<div class="col-lg-6 formbtn">
<button type="submit" class="btn btn-primary" name="update">update</button>
</div>
</div>
                </form>
</div>


<!-- Update Form container ends -->
    <?php
}
?>
    <?php
if(isset($_POST['update'])){
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

        $query = $pdo->prepare("UPDATE marksheet SET name=:pname, english=:penglish, science=:pscience, math=:pmath, urdu=:purdu, pakstudies=:ppakstudies, obt_marks=:pobt_marks, percentage=:ppercentage, grade=:pgrade, remarks=:premarks WHERE id=:pid");

        $query->bindParam(":pname", $name);
        $query->bindParam(":penglish", $english);
        $query->bindParam(":pscience", $science);
        $query->bindParam(":pmath", $math);
        $query->bindParam(":purdu", $urdu);
        $query->bindParam(":ppakstudies", $pakstudies);
        $query->bindParam(":pobt_marks", $obt_marks);
        $query->bindParam(":ppercentage", $percentage);
        $query->bindParam(":pgrade", $grade);
        $query->bindParam(":premarks", $remarks);
        $query->bindParam(":pid", $sid);
        
        $query->execute();

        echo "<script>alert('Updated Succesfully')</script>";
}
?>
</body>


</html>