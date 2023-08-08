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
        <p>Latitude: {{ $locationData['latitude'] }}</p>
        <p>Longitude: {{ $locationData['longitude'] }}</p>
        <p>Message: {{ $message }}</p>
        <!-- Other location details -->
    </div>
</body>
</html>
