<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        border:1px solid blue;
        padding: 10px;
        background-color: #F1C93B;
    }
    table tr td{
        border:1px solid white;
        width:150px;
        height:10px;
        padding: 10px;
        font-size:20px;
        font-weight:bold;
    }
</style>
<body>
    <table>
        <tbody>
            <?php
            $myarr=[
                ["Ahmed",21,"Front-end Developer"],
                ["Bilal",24,"Back-end Developer"],
                ["M.Maaz",23,"FullStack Web Developer"],
                ["Sameer",26,"FullStack App Developer"],
                ["Haris",22,"Database Engineer"],
                ["Sheryar",28,"Devops Engineer"],
                ["Imran",30,"Graphics Designer"]
            ];

            for($i=0;$i<count($myarr);$i++){
                ?>
                <tr>
                    <?php
                    for($n=0;$n<count($myarr[$i]);$n++){
                        if($i%2==0){
                        ?>
                        
                        <td style="background-color: royalblue;color:white;"><?php echo $myarr[$i][$n];?></td>
                        <?php
                        }
                        else{
                            ?>
                            <td style="background-color: yellow;"><?php echo $myarr[$i][$n];?></td>
 <?php
                        };
                        ?>

                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>