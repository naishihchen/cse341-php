<?php 
	session_start();

	if (!isset($_SESSION['loggedin'])) {
		$_SESSION['loggedin'] = false;
	}

	include 'database_connect.php';

	if (!isset( $_SESSION['cart'] )){
		  $_SESSION['cart'] = [];
	}

	$queryResults = "<div id='soaps' class='hello'>";
	$queryResults = "<form action='cart.php' method='post'>";

	foreach ($db->query('SELECT * FROM products') as $row)
{
	$queryResults .= "<div class='description'>";
  	$queryResults .= "<img src='" . $row['productimage'] . "'><br>";
  	$queryResults .= "<h3>" . $row['productname'] . "</h3><br>";
	$queryResults .= "<p>" . $row['productdescription'] . "</p>";
	$queryResults .= "<label for='points'>Quantity:</label><br>";
  	$queryResults .= "<input type='number' class='quantity' name='" . $row['productname'] . " Quantity' step='1' min='0' onkeypress='return event.charCode >= 48'>";
	$queryResults .= "</div>";
}
	$queryResults .= "<input type='submit' name='submit' id='cartbtn' value='Proceed To Cart'>";
    $queryResults .= "<input type='hidden' name='action' value='purchase'>";

	$queryResults.= "</form>";
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
			<h2>Items For Sale</h2>
			<?php if (isset($queryResults)) {
				echo $queryResults;
			} ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>