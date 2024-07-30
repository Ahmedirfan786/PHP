<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Iframe Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>
    body{
        background-color:#F8EDED;
    }
    iframe {
        width: 100%;
        height: 100vh;
    }
    h1{
        color:violet;
    }
    h2{
        color:pink;
    }
    .button{
        background-color:pink;
        color:white;
        border:1px solid silver;
    }
</style>

<body class="container-fluid mt-5">
    <h1 class="mb-4">Enter a Website URL</h1>


    <!-- PHP CODE IS HERE -->
    <?php
        if (isset($_POST['submit'])) {
        $websiteUrl = $_POST['website_url'];
    } else {
    $websiteUrl = '';
    }
    ?>


    <form method="post" action="" class="form-inline mb-4">
        <input type="text" name="website_url" class="form-control mr-2" placeholder="Enter website URL" required>
        <button type="submit" name="submit" class="btn button">Generate Iframe</button>
    </form>

    <?php
   ?>
    <h2 class="mb-3">Generated Iframe</h2>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe src="<?= $websiteUrl ?>" class="embed-responsive-item" allowfullscreen></iframe>
    </div>
    <?php
   ?>

</html>