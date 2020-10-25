<?php 
	session_start();

	$_SESSION["accountNum"] = 0;

	include 'database_connect.php';

	if (!isset( $_SESSION['cart'] )){
		  $_SESSION['cart'] = [];
	}

	$queryString = "SELECT userid FROM users WHERE fullname = 'Jane Doe';"; 
	$select = $db->prepare($queryString);
	$select->execute();
	$userId = $select->fetchAll(PDO::FETCH_ASSOC);

	$_SESSION['userId'] = $userId[0]['userid'];

	$queryResults = "<div id='soaps' class='hello'>";

	foreach ($db->query('SELECT * FROM products') as $row)
{
	$queryResults .= "<div class='description'>";
  	$queryResults .= "<img src='" . $row['productimage'] . "'><br>";
  	$queryResults .= "<h3>" . $row['productname'] . "</h3><br>";
	$queryResults .= "<p>" . $row['productdescription'] . "</p>";
	$queryResults .= "<a href='items.php?action=" . $row['productid'] . "'>Add to Cart</a>";
	$queryResults .= "</div>";
}

	$queryResults .= "</div>";

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
switch ($action){

  case 0:
    $_SESSION['cart'][0]['productName'] = 'Lavender Soap';
    $_SESSION['cart'][0]['quantity'] = 1;
    $_SESSION['cart'][0]['productPrice'] = 11.00;
    $_SESSION['cart'][0]['productId'] = 1;
  break;
  
  case 1:
    $_SESSION['cart'][1]['productName'] = 'Mint Soap';
    $_SESSION['cart'][1]['quantity'] = 1;
    $_SESSION['cart'][1]['productPrice'] = 11.00;
    $_SESSION['cart'][0]['productId'] = 1;
  break;
  
  case 2:
    $_SESSION['cart'][2]['productName'] = 'Oatmeal Soap';
    $_SESSION['cart'][2]['quantity'] = 1;
    $_SESSION['cart'][2]['productPrice'] = 11.00;
    $_SESSION['cart'][0]['productId'] = 1;
  
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