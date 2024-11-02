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

        .homeBtn:hover {
            background-color: #0056b3; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }


        table th, table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }


        table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }


        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }


        table tr:hover {
            background-color: #f1f1f1;
        }


        table td a {
            text-decoration: none;
            color: #007bff;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }


        table td a:hover {
            background-color: #e9ecef;
        }


        table td a[href*="deleteproject"] {
            color: #f44336; 
        }   


        table td a[href*="deleteproject"]:hover {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>
    <a href="index.php" class="homeBtn">Return to Home</a>
    <form action="core/handleForms.php?web_dev_id=<?php echo $_GET['web_dev_id']?>" method="POST">
        <p>
            <label for="projectName">Project Name</label>
            <input type="text" name="projectName">
        </p>
        <p>
            <label for="technologiesUsed">Technologies Used</label>
            <input type="text" name="technologiesUsed">
        </p>
        <input type="submit" name="insertNewProjectBtn">
    </form>
    <table>
        <tr>
            <th>Project ID</th>
            <th>Project Name</th>
            <th>Technologies Used</th>
            <th>Date Added</th>
            <th>Project Owner</th>
            <th>Action</th>
        </tr>
        <?php $getProjectsByWebDev = getProjectsByWebDev($pdo, $_GET['web_dev_id']); ?>
        <?php foreach ($getProjectsByWebDev as $row) { ?>
        <tr>
            <td><?php echo $row['project_id']; ?></td>
            <td><?php echo $row['project_name']; ?></td>
            <td><?php echo $row['technologies_used']; ?></td>
            <td><?php echo $row['date_added']?></td>
            <td><?php echo $row['project_owner']; ?></td>
            <td>
                <a href="editproject.php?project_id=<?php echo $row['project_id']; ?>&web_dev_id=<?php echo $_GET['web_dev_id']; ?>">Edit</a>
                <a href="deleteproject.php?project_id=<?php echo $row['project_id']; ?>&web_dev_id=<?php echo $_GET['web_dev_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>