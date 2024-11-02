<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($_SESSION['message'])) { ?>
        <h1><?php echo $_SESSION['message']; ?></h1>
    <?php } unset($_SESSION['message']); ?>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password">
        </p>
        <input type="submit" name="registerUserBtn">
    </form>
</body>
</html>