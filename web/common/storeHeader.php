<header>
	<a href="web/week6act/items.php" id="items-link"><h1>Naomi's Store</h1></a>
	<div id="cart">
		<a href="cart.php">Cart</a>
		<?php
			if ($_SESSION['loggedin'] == TRUE) {
				echo "<h1><a href=\"accounts/index.php?action=logout\" id=\"logout\">Log Out</a></h1>";
    		} else {
        		echo "<a title=\"my-account\" href=\"/week6act/accounts/index.php?action=login\">Login/Register</a>";
			}
		?>
	</div>
</header>