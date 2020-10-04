<?php

	session_start();

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
			<h2>Checkout</h2>
			<div id="form-div" class="hello">
				<form id="checkout-form" action='confirmation.php' method='post'>
					<label for="street">Street: </label>
					<input id="street" type="text" name="street">
					
					<label for="unit">Unit #: </label>
					<input id="unit" type="text" name="unit">
					
					<label for="city">City: </label>
					<input id="city" type="text" name="city">
					
					<label for="state">State: </label>
					<input id="state" type="text" name="state">
					
					<label for="zip">Zip Code: </label>
					<input id="zip" type="text" name="zip">
				
					<input type='submit' value='Checkout'><input type='hidden' name='action' value='checkout'>
				</form>
			</div>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>