<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Week 7 Activity</title>
		<link rel="stylesheet" type="text/css" href="/styles/storeStyles.css">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet"> 
	</head>
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeHeader.php'; ?>
		<main>
			<h1>Login</h1>

            <?php
          
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            ?>

            <div id="form">
            <form action="accounts/index.php" method="post">
                <label for="email">Email address: </label><input type="email" name="clientEmail" id="email" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>><br>
                <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
                <label for="password">Password: </label>
                <input type="password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" ><br>
                <input id="submit" type="submit" value="Login">
                <input type="hidden" name="action" value="Logging">
            </form>
            
                <div id="register">
            <p>Not Registered? Click Here!</p>
            <a href="accounts/index.php?action=register">Register</a>
                </div>
            </div>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>