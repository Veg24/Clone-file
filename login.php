<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "usm" && $password == "123") {
        $_SESSION['username'] = $username;
        if (isset($_SESSION['login_count'])) {
            $_SESSION['login_count']++;
            if ($_SESSION['login_count'] > 100) {
                $_SESSION['login_count'] = 1;
            }
        } else {
            $_SESSION['login_count'] = 1;
        }
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f5f7fa;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        width: 480px;
        box-sizing: border-box;
        text-align: center;
    }
        .login-container h1 {
            margin-bottom: 24px;
            font-weight: 700;
            font-size: 28px;
            color: #333;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        .input-group input {
            width: 100%;
            padding: 12px 40px 12px 14px;
            border: 1.5px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }
        .input-group input:focus {
            border-color: #007bff;
        }
        .input-group .bx {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 20px;
        }
        .login-button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #d9534f;
            margin-bottom: 16px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if (!empty($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="post" action="login.php" novalidate>
            <div class="input-group">
                <input type="text" name="username" placeholder="Email" required />
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required />
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
