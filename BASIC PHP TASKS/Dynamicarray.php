<?php
session_start();

if (!isset($_SESSION['elements'])) {
    $_SESSION['elements'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  
    $new_element = $_POST["element"];

    if (!empty($new_element)) {
        $_SESSION['elements'][] = $new_element;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Array Example</title>
</head>
<style>
     body {
            font-family: Arial, sans-serif;
            background-color: pink;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-right: 10px;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            flex: 1;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: violet;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #c54bb9;
        }
        .elements {
            background: linear-gradient(to bottom, #ffffff, #f2f2f2);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
</style>
<body>
    <h2>Dynamic Array Example</h2>

    <form method="POST">
        <label for="element">Enter Element:</label>
        <input type="text" id="element" name="element" required>
        <button type="submit" name="submit">Add Element</button>
    </form>

    <?php
    if (!empty($_SESSION['elements'])) {
        echo "<h3>Current Elements in Array:</h3>";
        echo "<ul>";
        foreach ($_SESSION['elements'] as $element) {
            echo "<li>$element</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
