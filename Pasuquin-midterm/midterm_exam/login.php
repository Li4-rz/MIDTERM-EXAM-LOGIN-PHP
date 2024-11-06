<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
        }

        .form-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-container h1 {
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-container p {
            margin-bottom: 1rem;
            text-align: left;
        }

        label {
            font-size: 0.9rem;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-top: 0.3rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 0.8rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
        }

        .register-link {
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #333;
        }

        .register-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #ff4d4d;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="error-message"><?php echo $_SESSION['message']; ?></div>
        <?php } unset($_SESSION['message']);?>

        <h1>Login Now!</h1>
        <form action="core/handleForms.php" method="POST">
            <p>
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </p>
            <input type="submit" name="loginUserBtn" value="Login">
        </form>
        <p class="register-link">Don't have an account? Register <a href="register.php">here</a></p>
    </div>
</body>
</html>
