<?php
include('Connection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
            </tr>
            <?php
        }
        ?>

</tbody>

    </table>
</body>
</html>