<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   
    table tr td{
        border:1px solid black;
        width:60px;
        height:30px;
        padding: 10px;
        font-size:25px;
        font-weight:bold;
    }
</style>
<body>
    <table>
        <tbody>

        <?php
        $num=5;
        for($i=0;$i<10;$i++){
            if($i%2==0){
            ?>
            <tr style="background-color: #A076F9;">
            <td><?php echo ($num);?></td>
            <td><?php echo ("*");?></td>
            <td><?php echo ($i);?></td>
            <td><?php echo ("=");?></td>
            <td><?php echo ($num*$i);?></td>
        </tr>
            <?php
            }
            
            else{
                ?>
                <tr style="background-color: #D7BBF5;">
                <td><?php echo ($num);?></td>
                <td><?php echo ("*");?></td>
                <td><?php echo ($i);?></td>
                <td><?php echo ("=");?></td>
                <td><?php echo ($num*$i);?></td>
            </tr> 
            <?php
            }
        }
        ?>

        </tbody>
    </table>
</body>
</html>