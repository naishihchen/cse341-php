<?php 
	session_start();

	if (!isset( $_SESSION['cart'] )){
		  $_SESSION['cart'] = [];
	}

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
			<h2>Items For Sale</h2>
			<div id="soaps" class="hello">
				<div class="soap">
					<div class="description">
						<img src="/images/lavender-soap.jpg">
						<h3>Lavender Soap</h3>
						<p>This lavender soap has a fresh flowery smell that will soothe you</p>
					</div>
					<a href="items.php?action=lavender">Add to Cart</a>

				</div>
				<div class="soap">
					<div class="description">
						<img src="/images/mint-soap.jpg">
						<h3>Mint Soap</h3>
						<p>This mint soap has a cool tingly shock that will revive you</p>
					</div>
					<a href="items.php?action=mint">Add to Cart</a>
				</div>
				<div class="soap">
					<div class="description">
						<img src="/images/oatmeal-soap.jpg">
						<h3>Oatmeal Soap</h3>
						<p>This oatmeal soap has a warm yummy scent that will comfort you</p>
					</div>
					<a href="items.php?action=oatmeal">Add to Cart</a>
				</div>
			</div>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>