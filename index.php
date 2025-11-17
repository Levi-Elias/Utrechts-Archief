<?php
$name = $_GET['name'] ?? 'Guest';
$message = "Welcome to Utrecht's Archive, " . htmlspecialchars($name) . "!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utrechts Archief</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }
        h1 { color: #333; }
        input { padding: 10px; font-size: 16px; }
        button { padding: 10px 20px; background: #667eea; color: white; border: none; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📚 Utrechts Archief</h1>
        <p><?php echo $message; ?></p>
        <form method="GET">
            <input type="text" name="name" placeholder="Enter your name">
            <button type="submit">Explore</button>
        </form>
    </div>
</body>
</html>