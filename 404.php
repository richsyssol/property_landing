<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            text-align: center;
        }
        .emoji {
            font-size: 5rem;
            position: relative;
            display: inline-block;
            animation: shake 1s infinite alternate;
        }
        .tear {
            position: absolute;
            width: 8px;
            height: 12px;
            background-color: #00aaff;
            border-radius: 50%;
            top: 20px;
            left: 25px;
            animation: fall 1.5s infinite linear;
        }
        @keyframes shake {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(5deg); }
        }
        @keyframes fall {
            0% { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(30px); opacity: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="display-1 fw-bold">404</h1>
        <p class="lead">Oops! Looks like you're lost in space.</p>
        <div class="emoji">😢<div class="tear"></div></div>
        <p class="mt-3">The page you are looking for doesn't exist!</p>
    </div>
</body>
</html>
