<?php 
	session_start();

	include 'database_connection.php';

	$queryString = "SELECT username, fullname, email FROM users WHERE userid = 1;"; 
	$sql = $db->prepare($queryString);
	$sql->execute();

	$row = $select->fetchAll(PDO::FETCH_ASSOC);

	var_dump($row);
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
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>