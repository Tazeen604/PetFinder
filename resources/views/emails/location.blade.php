<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        p {
            margin: 10px 0;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Device Location</h2>
        <p>Message: Please Click here to get pet location </p>
        <a href="https://www.google.com/maps?q={{ $locationData['latitude'] }},{{ $locationData['longitude'] }}">Please Click here to get pet location</a>
        <!-- Other location details -->
    </div>
</body>
</html>
