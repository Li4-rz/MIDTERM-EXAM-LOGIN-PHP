<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        .homeBtn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <a href="index.php" class="homeBtn">Return to Home</a>
    <?php $getWebDevByID = getWebDevByID($pdo, $_GET['web_dev_id']); ?>
    <h1>Edit the User</h1>
    <form action="core/handleForms.php?web_dev_id=<?php echo $_GET['web_dev_id']; ?>" method="POST">
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" value="<?php echo $getWebDevByID['first_name']; ?>">
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" value="<?php echo $getWebDevByID['last_name']; ?>">
        </p>
        <p>
            <label for="dateOfBirth">Date of Birth</label>
            <input type="date" name="dateOfBirth" value="<?php echo $getWebDevByID['date_of_birth']; ?>">
        </p>
        <p>
            <label for="specialization">Specialization</label>
            <input type="text" name="specialization" value="<?php echo $getWebDevByID['specialization']; ?>">
        </p>
        <input type="submit" name="editWebDevBtn">
    </form>
</body>
</html>