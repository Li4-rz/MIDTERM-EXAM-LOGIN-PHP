<?php require_once 'core/dbConfig.php'?>
<?php require_once 'core/models.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        a {
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

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href="viewprojects.php?web_dev_id=<?php echo $_GET['web_dev_id']; ?>"> View The Projects</a>
    <h1>Edit the Project!</h1>
    <?php $getProjectByID = getProjectByID($pdo, $_GET['project_id']); ?>
    <form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&web_dev_id=<?php echo $_GET['web_dev_id']; ?>" method="POST">
        <p>
            <label for="projectName">Project Name</label>
            <input type="text" name="projectName" value="<?php echo $getProjectByID['project_name']; ?>">
        </p>
        <p>
            <label for="technologiesUsed">Tecnologies Used</label>
            <input type="text" name="technologiesUsed" value="<?php echo $getProjectByID['technologies_used']; ?>">
        </p>
        <input type="submit" name="editProjectBtn">
    </form>
</body>
</html>