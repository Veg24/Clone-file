<?php
session_start();
if (!isset($_SESSION['username'])) {
    // User is already logged in, redirect to welcome page  
    header("Location: login.php");
}

// Increment login count on each page load (refresh)
if (isset($_SESSION['login_count'])) {
    $_SESSION['login_count']++;
    if ($_SESSION['login_count'] > 100) {
        $_SESSION['login_count'] = 1;
    }
} else {
    $_SESSION['login_count'] = 1;
}
?>
<html>
    <head>
        <title>::Login Page::</title>
        <link href="https://fonts.googleapis.com/css2?family=Sugar+Fruit&display=swap" rel="stylesheet">
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            h1 {
                font-family: 'Sugar Fruit', cursive;
            }
        </style>
    </head>
    <body>
        <h1><?php echo "Selamat datang " . $_SESSION['username'] . " ke-" . $_SESSION['login_count']; ?></h1>
        
    </body>
</html>
