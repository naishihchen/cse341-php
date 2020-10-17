<?php 
	session_start();

	$_SESSION["accountNum"] = 0;

	include 'database_connect.php';

	if (!isset( $_SESSION['cart'] )){
		  $_SESSION['cart'] = [];
	}

	$queryResults = "<div id='soaps' class='hello'>";

	foreach ($db->query('SELECT * FROM products') as $row)
{
	$queryResults .= "<div class='description'>";
  	$queryResults .= "<img src='" . $row['productimage'] . "'><br>";
  	$queryResults .= "<h3>" . $row['productname'] . "</h3><br>";
	$queryResults .= "<p>" . $row['productdescription'] . "</p>";
	$queryResults .= "</div>";
}

	$queryResults .= "</div>";

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
switch ($action){

  case 'lavender':
    $_SESSION['cart'][0] = 'Lavender Soap';
  break;
  
  case 'mint':
    $_SESSION['cart'][1] = 'Mint Soap';
  break;
  
  case 'oatmeal':
    $_SESSION['cart'][2] = 'Oatmeal Soap';
  
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