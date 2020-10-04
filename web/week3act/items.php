<?php 
	session_start();

	$productArray = []

	// if(!isset($SESSION['products'])) {
	// 	$_SESSION['products'] = $productArray;
	// }
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
					<button type="button" onclick="">Add to Cart</button>

				</div>
				<div class="soap">
					<div class="description">
						<img src="/images/mint-soap.jpg">
						<h3>Mint Soap</h3>
						<p>This mint soap has a cool tingly shock that will revive you</p>
					</div>
					<button>Add to Cart</button>
				</div>
				<div class="soap">
					<div class="description">
						<img src="/images/oatmeal-soap.jpg">
						<h3>Oatmeal Soap</h3>
						<p>This oatmeal soap has a warm yummy scent that will comfort you</p>
					</div>
					<button>Add to Cart</button>
				</div>
			</div>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>