<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Soap Store</title>
		<link rel="stylesheet" type="text/css" href="/styles/storeStyles.css">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet"> 
	</head>
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeHeader.php'; ?>
		<main>
			<h1>Registration</h1>

            <div id="form">

            <?php
          
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            ?>

            <form action="accounts/index.php" method="post">
                    <label for="fullname">Full Name: </label><input type="text" name="clientFullname" id="clientFullname" required><br>
                    <label for="username">User Name: </label><input type="text" name="clientUsername" id="clientUsername" required><br>
                    <label for="email">Email address: </label><input type="email" name="clientEmail" id="clientEmail" required><br>
                    <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
                    <label for="password">Password: </label>
                    <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
                <input type="submit" name="submit" id="regbtn" value="Register">

                <input type="hidden" name="action" value="registration">
            </form>
            </div>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>