<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infinite Loop</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <div class="m-3">
    <h1>❌Dont Touch This Button❌</h1>
    <form method="POST">
      <button type="submit" name="startloop" class="btn btn-danger mb-3">💀Warning💀</button>
    </form>
    <div>
      <?php
      if (isset($_POST['startloop'])) {
          $b = 1;
          while (true) {
              echo $b . '<br>';
              $b++;
              ob_flush();  
              flush();
              sleep(0.000000000000001);
            }
      }
      ?>
    </div>
  </div>

  
</body>
</html>
