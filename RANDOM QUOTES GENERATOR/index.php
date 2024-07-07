<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quote Generator</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            text-align: center;
            padding: 50px;
            color: #c90076;
        }
        .quote {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        .quote p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
            color: black;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: violet;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #c54bb9;
        }
    </style>
<body>
    <h1>Random Quote Generator</h1>
    
    <div class="quote" id="quoteContainer">
        <?php
        
        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://api.quotable.io/random",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => [
            "Accept: application/json"
          ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo '<p>Error fetching quote. Please try again later.</p>';
        } else {
          $data = json_decode($response, true);
          echo '<p>"' . $data['content'] . '"</p>';
          echo '<p>- ' . $data['author'] . '</p>';
        }
        ?>
    </div>

    <button id="newQuoteBtn">Get New Quote</button>

    <script>
        document.getElementById('newQuoteBtn').addEventListener('click', function() {
            fetch('index.php')
                .then(response => response.text())
                .then(html => {
                    var parser = new DOMParser();
                    var doc = parser.parseFromString(html, 'text/html');
                    var newQuote = doc.querySelector('.quote').innerHTML;
                    document.getElementById('quoteContainer').innerHTML = newQuote;
                })
                .catch(error => console.error('Error fetching new quote:', error));
        });
    </script>
</body>
</html>
