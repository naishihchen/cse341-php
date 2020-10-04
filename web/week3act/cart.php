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
				<?php foreach($results[] as $result) {
    					echo $result, '<br>';
					} 
				?>
			</div>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/common/storeFooter.php'; ?>
		</main>
	</body>
</html>