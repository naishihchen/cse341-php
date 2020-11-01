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
	$queryResults .= "<label for='points'>Points:</label>";
  	$queryResults .= "<input type='number' class='quantity' name='" . $row['productname'] . " quantity' step='1'>";
	$queryResults .= "</div>";
}
	$queryResults .= "<input type='submit' name='submit' id='cartbtn' value='Proceed To Cart'>";
    $queryResults .= "<input type='hidden' name='action' value='purchase'>";

	$queryResults.= "</form>";
	$queryResults .= "</div>";

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
switch ($action){

  case 1:
    $_SESSION['cart'][0]['productName'] = 'Lavender Soap';
    $_SESSION['cart'][0]['quantity'] = 1;
    $_SESSION['cart'][0]['productPrice'] = 11.00;
    $_SESSION['cart'][0]['productId'] = 1;
  break;
  
  case 2:
    $_SESSION['cart'][1]['productName'] = 'Mint Soap';
    $_SESSION['cart'][1]['quantity'] = 1;
    $_SESSION['cart'][1]['productPrice'] = 11.00;
    $_SESSION['cart'][1]['productId'] = 1;
  break;
  
  case 3:
    $_SESSION['cart'][2]['productName'] = 'Oatmeal Soap';
    $_SESSION['cart'][2]['quantity'] = 1;
    $_SESSION['cart'][2]['productPrice'] = 11.00;
    $_SESSION['cart'][1]['productId'] = 1;
  
  default:
  break;
}

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