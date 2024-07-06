<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fibonacci Series Generator</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <div class="m-3">
    <h1>Fibonacci Series Generator</h1>
    <form method="POST">
      <div class="form-group">
        <label for="start">Start Index:</label>
        <input type="number" class="form-control" id="start" name="start" required>
      </div>
      <div class="form-group">
        <label for="end">End Index:</label>
        <input type="number" class="form-control" id="end" name="end" required>
      </div>
      <button type="submit" name="generate" class="btn btn-info mb-3">Generate Fibonacci Sequence</button>
    </form>
    <div>
      <?php
      if (isset($_POST['generate'])) {
          $start = $_POST['start'];
          $end = $_POST['end'];

          if ($start <= 0 || $end <= 0 || $end < $start) {
              echo '<div class="alert alert-danger" role="alert">
                      Please enter valid start and end indices (both must be positive integers and end should be greater than start).
                    </div>';
          } else {
              $first = 0;
              $second = 1;

              echo "<h3>Fibonacci sequence from $start to $end:</h3>";

              $count = 0;
              while ($count < $end) {
                  if ($count >= $start - 1) {
                      echo "$first";
                      if ($count < $end - 1) {
                          echo ", ";
                      }
                  }
                  $next = $first + $second;
                  $first = $second;
                  $second = $next;
                  $count++;
              }
          }
      }
      ?>
    </div>
  </div>

  
</body>
</html>
