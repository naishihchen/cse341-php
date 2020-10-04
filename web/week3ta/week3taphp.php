<html>
	

	<body>
		Name: <?php echo $_POST["name"]; ?>
		<br>
		<br>
		Email: <a href="mailto:<?php echo htmlspecialchars($_POST['email']); ?>"><?php echo $_POST["email"]; ?></a>
		<br>
		<br>
		Major: <?php echo htmlspecialchars($_POST["Major"]); ?>
		<br>
		<br>
		Comments: <?php echo htmlspecialchars($_POST["Comments"]); ?>
		<br>
		<br>
		Continents Visited: 
		<?php 
		$array = array(
			"NA" => "North America",
			"SA" => "South America",
			"EU" => "Europe",
			"AS" => "Asia",
			"AU" => "Australia",
			"AF" => "Africa",
			"AN" => "Antarctica"
		);
		foreach ($_POST["checkbox"] as $value) {
			echo $array[htmlspecialchars($value)] . "<br>";
		}
		 ?>
	</body>
</html>