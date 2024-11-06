<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        
        h1 {
            color: #333;
            font-size: 1.8em;
            text-align: center;
            margin-top: 30px;
        }

        .Deletecontainer {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .Deletecontainer h2 {
            color: #333;
            font-size: 18px;
            margin: 8px 0;
        }

        .deleteBtn {
            margin-top: 20px;
        }

        .deleteBtn form {
            display: inline-block;
            margin: 0;
        }

        .deleteBtn input[type="submit"] {
            padding: 10px 20px;
            background-color: #f44336; 
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .deleteBtn input[type="submit"]:hover {
            background-color: #d32f2f; 
        }
    </style>
</head>
<body>
    <a href="index.php" class="homeBtn">Return to Home</a>
    <h1>Are you sure you want to delete this user?</h1>
    <?php $getWebDevByID = getWebDevByID($pdo, $_GET['web_dev_id']); ?>
    <div class="Deletecontainer">
        <h2>Username: <?php echo $getWebDevByID['username']; ?></h2>
        <h2>First Name: <?php echo $getWebDevByID['first_name']; ?></h2>
        <h2>Last Name: <?php echo $getWebDevByID['last_name']; ?></h2>
        <h2>Date Of Birth: <?php echo $getWebDevByID['date_of_birth']; ?></h2>
        <h2>Specialization: <?php echo $getWebDevByID['specialization']; ?></h2>
        <h2>Date Added: <?php echo $getWebDevByID['date_added']; ?></h2>

        <div class="deleteBtn">
            <form action="core/handleForms.php?web_dev_id=<?php echo $_GET['web_dev_id']; ?>" method="POST">
                <input type="submit" name="deleteWebDevBtn" value="Delete">
            </form>
        </div>
    </div>
</body>
</html>