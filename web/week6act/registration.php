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
          
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="accounts/index.php" method="post">
                    <label for="firstname">First Name: </label><input type="text" name="clientFirstname" id="fname" required <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>><br>
                    <label for="lastname">Last Name: </label><input type="text" name="clientLastname" id="lname" required <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?>><br>
                    <label for="email">Email address: </label><input type="email" name="clientEmail" id="email" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>><br>
                    <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
                    <label for="password">Password: </label>
                    <input type="password" name="clientPassword" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
                <input type="submit" name="submit" id="regbtn" value="Register">

                <input type="hidden" name="action" value="registration">
            </form>
            </div>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>