<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <title>Marksheet</title>
</head>
<style>
    body {
        background-color: rgb(197, 225, 249);
    }

    div {
        width: 100%;
        padding: 50px;
    }

    div h1 {
        text-align: center;
        color: blue;
    }

    div form input {
        margin-top: 20px;
        width: 180px;
        height: 35px;
        border: 1px solid grey;
        outline: none;
        border-radius: 5px;
    }

    div form button {
        width: 80px;
        height: 35px;
        border-radius: 10px;
        background-color: rgb(16, 16, 232);
        color: white;
        border: none;
        outline: none;
    }
    table{
        margin-top: 20px;
       
    }
    table th{
        border: 1px solid black;
        width:110px;
        background-color: royalblue;
        color:white;
    }
    table td{
        border:1px solid black;
        background-color: #fff;
        color:royalblue;
    }
</style>

<body>
    <div>
        <h1>Student Marksheet!</h1>

        <form method="post">
            <input type="text" name="std_name" placeholder="Enter your name inside">
            <input type="number" name="Sub1" min=1 max=100 placeholder="English Marks">
            <input type="number" name="Sub2" min=1 max=100 placeholder="Science Marks">
            <input type="number" name="Sub3" min=1 max=100 placeholder="Maths Marks">
            <input type="number" name="Sub4" min=1 max=100 placeholder="Urdu Marks">
            <input type="number" name="Sub5" min=1 max=100 placeholder="Pakstudies Marks">
            <button type="submit" name="Result">Submit</button>
        </form>

        <?php
    if(isset($_POST['Result'])){
        $Std_name=$_POST['std_name'];
        $Eng=$_POST['Sub1'];
        $Sci=$_POST['Sub2'];
        $Math=$_POST['Sub3'];
        $Urdu=$_POST['Sub4'];
        $Pkstd=$_POST['Sub5'];
        $Obt_marks=number_format($Eng)+number_format($Sci)+number_format($Math)+number_format($Urdu)+number_format($Pkstd);
        $Total_marks=500;
        $Percentage=$Obt_marks/$Total_marks*100;
        $Grade="";

        if($Percentage >=90){
            $Grade="A*";
        }
        elseif($Percentage >=80){
            $Grade="A";
        }
        elseif($Percentage >=70){
            $Grade="B";
        }
        elseif($Percentage >=60){
            $Grade="C";
        }
        elseif($Percentage >=50){
            $Grade="D";
        }
        elseif($Percentage >=40){
            $Grade="E";
        }
        else {
            $Grade="F";
        }
        

    ?>

    <table border="1">
        <tr>
            <th>Student_Name</th>
            <th>English</th>
            <th>Science</th>
            <th>Maths</th>
            <th>Urdu</th>
            <th>PakStudies</th>
            <th>Obt_Marks</th>
            <th>Total_Marks</th>
            <th>Percentage(%)</th>
            <th>Grade</th>
        </tr>
        <tr>
            <td><?php echo ($Std_name)?></td>
            <td><?php echo ($Eng)?></td>
            <td><?php echo ($Sci)?></td>
            <td><?php echo ($Math)?></td>
            <td><?php echo ($Urdu)?></td>
            <td><?php echo ($Pkstd)?></td>
            <td><?php echo ($Obt_marks)?></td>
            <td><?php echo ($Total_marks)?></td>
            <td><?php echo($Percentage)?></td>
            <td><?php echo($Grade)?></td>
        </tr>
    </table>
    <?php
    }
    ?>
    </div>

</body>

</html>