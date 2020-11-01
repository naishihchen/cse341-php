<?php
	session_start();

	$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 if (isset( $_SESSION['cart'] )){	

 	switch ($action){

	  case 'Lavender Soap':
	    $_SESSION['cart'][0] = '';
	  break;
	  
	  case 'Mint Soap':
	    $_SESSION['cart'][1] = '';
	  break;
	  
	  case 'Oatmeal Soap':
	    $_SESSION['cart'][2] = '';
	  
	  default:
	  break;
	}

	$lavQuantity = filter_input(INPUT_POST, 'Lavender Soap Quantity', FILTER_SANITIZE_NUMBER_INT);
	$mintQuantity = filter_input(INPUT_POST, 'Mint Soap Quantity', FILTER_SANITIZE_NUMBER_INT);
	$oatQuantity = filter_input(INPUT_POST, 'Oatmeal Soap Quantity', FILTER_SANITIZE_NUMBER_INT);

	if ($lavQuantity > 0) {
		$_SESSION['cart'][0]['productName'] = 'Lavender Soap';
    	$_SESSION['cart'][0]['quantity'] = $lavQuantity;
    	$_SESSION['cart'][0]['productPrice'] = 11.00;
    	$_SESSION['cart'][0]['productId'] = 1;
	}

	if ($mintQuantity > 0) {
		$_SESSION['cart'][0]['productName'] = 'Mint Soap';
    	$_SESSION['cart'][0]['quantity'] = $mintQuantity;
    	$_SESSION['cart'][0]['productPrice'] = 11.00;
    	$_SESSION['cart'][0]['productId'] = 1;
	}

	if ($oatQuantity > 0) {
		$_SESSION['cart'][0]['productName'] = 'Oatmeal Soap';
    	$_SESSION['cart'][0]['quantity'] = $oatQuantity;
    	$_SESSION['cart'][0]['productPrice'] = 11.00;
    	$_SESSION['cart'][0]['productId'] = 1;
	}

	var_dump($_SESSION['cart']);


	$cartContents = "<div id='shopping-cart'>";

	foreach($_SESSION['cart'] as $product){
		if ($product != "") {
			$cartContents .= "<div class='cart-item'><p>". $product['productName'] ."</p><a href='cart.php?action=". $product['productName'] ."'>Remove</a></div> <br>";
		}
	} 

	$cartContents .= "</div>";
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
			<h2>Shopping Cart</h2>
			<div id="soaps" class="hello">
				<div class="soap">
					<?php
						if(isset($cartContents)){
						    echo $cartContents;
						}
					?>
				</div>
				<div id="progress-buttons">
						<a id="a-button" href="items.php">Buy More</a>
						<a id="a-button" href="checkout.php">Check Out</a>
					</div>
			</div>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>