<html>
	<head>
	</head>
	<body>
		Name: <?php echo $_POST["name"]; ?>
		<br>
		<br>
		Email: <a href="<?php echo $_POST["email"]; ?>"><?php echo $_POST["email"]; ?></a>
		<br>
		<br>
		Major: <?php echo $_POST["Major"]; ?>
		<br>
		<br>
		Comments: <?php echo $_POST["Comments"]; ?>
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
			echo "$array[$value] <br>";
		}
		 ?>
	</body>
</html>