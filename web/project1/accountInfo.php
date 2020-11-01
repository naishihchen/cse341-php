<?php 
	
	// if ($_SESSION['loggedin'] == FALSE) {
	// 	header("Location: /project1/items.php");
	// }

	session_start();

	include 'database_connect.php';

	$queryString = "SELECT username, fullname, email FROM users WHERE userid = :userid;"; 
	$sql = $db->prepare($queryString);
	$sql->bindParam(':userid', $_SESSION['clientData']['userid'], PDO::PARAM_INT);
	$sql->execute();

	$row = $sql->fetchAll(PDO::FETCH_ASSOC);

	$queryResults = "<div id='account-info'>";

  	$queryResults .= "<p>Full Name: " . $row[0]['fullname'] . "</p><br>";
  	$queryResults .= "<p>User Name: " . $row[0]['username'] . "</p><br>";
	$queryResults .= "<p>Email: " . $row[0]['email'] . "</p>";

	$queryResults .= "</div>";
?>
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
			<h2>Account Info</h2>
			<?php if (isset($queryResults)) {
				echo $queryResults;
			} ?>

			<p>Visit our <a href="purchaseSearch.php">Receipt Search</a> page to search for past purchases<p>
			<br>
			<a href="accounts/index.php?action=accountUpdate">Update Account Info</a>
			<br>
			<a href="accounts/index.php?action=logout" id="logout">Log Out</a>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>