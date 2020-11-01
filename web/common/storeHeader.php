<header>
	<a href="items.php" id="items-link"><h1>Naomi's Store</h1></a>
	<div id="login-registration">
		<?php
			if ($_SESSION['loggedin'] == TRUE) {
				echo "<h1><a href=\"accountInfo.php\">My Account</a></h1>";
    		} else {
        		echo "<a title=\"my-account\" href=\"accounts/index.php?action=login\">Login/Register</a>";
			}
		?>
	</div>
</header>