<?php
    require_once 'core/models.php';
    require_once 'core/handleForms.php';

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        .user-details-table {
            width: 50%;
            margin: 50px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .user-details-table th,
        .user-details-table td {
            padding: 15px;
            text-align: left;
        }

        .user-details-table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        .user-details-table td {
            background-color: #f9f9f9;
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        .user-details-table tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <?php $getUserByID = getUserByID($pdo, $_GET['user_id']); ?>
    <table class="user-details-table">
        <tr>
            <th colspan="2">User Details</th>
        </tr>
        <tr>
            <td>Username</td>
            <td><?php echo htmlspecialchars($getUserByID['username']); ?></td>
        </tr>
        <tr>
            <td>Date Joined</td>
            <td><?php echo htmlspecialchars($getUserByID['date_added']); ?></td>
        </tr>
    </table>
</body>
</html>
