<?php 
    require_once 'core/models.php';
    require_once 'core/handleForms.php';

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        .container {
            border: 1px solid #ddd;
            width: 50%;
            height: 200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }


        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.15);
        }


        .container h3, .container h2 {
            font-size: 1.1em;
            color: #333;
            margin: 8px 0;
        }


        .editAndDelete {
            float: right;
                margin-right: 20px;
        }


        .editAndDelete a {
            margin-left: 10px;
            color: #0073e6;
            font-weight: bold;
            text-decoration: none;
            font-size: 0.9em;
            transition: color 0.2s ease;
        }


        .editAndDelete a:hover {
            color: #005bb5;
            text-decoration: underline;
        }

        .header{
            margin-bottom: 30px;
        }

        .greeting {
            font-size: 1.5rem;
            color: #333;
        }

        .logout-button {
            background-color: #f44336;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            float: right;
        }

        .logout-button:hover {
            background-color: #d32f2f;
        }

        .message {
            font-size: 1.2rem;
            color: #4CAF50;
            text-align: center;
            padding: 10px;
            border: 1px solid #4CAF50;
            background-color: #e7f9e7;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
	    animation: fadeOut 5s forwards;
        }

	@keyframes fadeOut {
            0% { opacity: 1; }
            80% { opacity: 1; } 
            100% { opacity: 0; }
        }

        .no-user {
            font-size: 1.2rem;
            color: #666;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }

        .user-list {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            margin: 20px auto;
        }

        .user-list-title {
            font-size: 1.4rem;
            color: #333;
            text-align: center;
            margin-bottom: 15px;
        }

        .user-list-items {
            list-style-type: none;
            padding: 0;
        }

        .user-list-item {
            margin-bottom: 10px;
            text-align: center;
        }

        .user-link {
            color: #4CAF50;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            transition: color 0.3s;
        }

        .user-link:hover {
            color: #388E3C;
        }
    </style>
    <script>
        setTimeout(() => {
            const messageElement =document.querySelector('.message');
            if (messageElement) {
                messageElement.style.display = 'none';
            }
        }, 5000);
    </script>
</head>
<body>
    <h1>Welcome to Web Dev Projects Management System. Add new Web Devs!</h1>
    <div class="header">
        <?php if (isset($_SESSION['message'])) { ?>
            <h1 class="message"><?php echo $_SESSION['message']; ?></h1>
        <?php } unset($_SESSION['message']); ?>

        <?php if (isset($_SESSION['username'])) { ?>
            <h1 class="greeting">Hello There!! <?php echo $_SESSION['username']; ?></h1>
            <a href="core/handleForms.php?logoutAUser=1" class="logout-button">Logout</a>
        <?php } else { ?>
            <h1 class="no-user">No User Logged In.</h1>
        <?php } ?>
    </div>
    <div class="user-list">
        <h3 class="user-list-title">Users List</h3>
        <ul class="user-list-items">
            <?php $getAllUsers = getAllUsers($pdo); ?>
            <?php foreach ($getAllUsers as $row) { ?>
                <li class="user-list-item">
                    <a href="viewusers.php?user_id=<?php echo $row['user_id']; ?>" class="user-link">
                        <?php echo $row['username']; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username">
        </p>
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName">
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName">
        </p>
        <p>
            <label for="dateOfBirth">Date of Birth</label>
            <input type="date" name="dateOfBirth">
        </p>
        <p>
            <label for="specialization">Specailization</label>
            <input type="text" name="specialization">
        </p>
        <input type="submit" name="insertWebDevBtn">
    </form>
    <?php $getAllWebDevs = getAllWebDevs($pdo); ?>
	<?php foreach ($getAllWebDevs as $row) { ?>
	<div class="container">
		<h3>Username: <?php echo $row['username']; ?></h3>
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Specialization: <?php echo $row['specialization']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete">
			<a href="viewprojects.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">View Projects</a>
			<a href="editwebdev.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">Edit</a>
			<a href="deletewebdev.php?web_dev_id=<?php echo $row['web_dev_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>
