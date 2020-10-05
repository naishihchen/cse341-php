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


	$cartContents = "<div id='shopping-cart'>";

	foreach($_SESSION['cart'] as $product){
		if ($product != "") {
			$cartContents .= "<div class='cart-item'>".$product."<a href='cart.php?action=".$product."'>Remove</a></div> <br>";
		}
	} 
	$cartContents .= "</div>"
 }

 var_dump($_SESSION['cart']);
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