<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Week 3 Team Activity</title>
	</head>
	<body>
		<form action="week3taphp.php" method="post">
			Name: <input type="text" name="name">
			<br>
			<br>
			Email: <input type="email" name="email">
			<br>
			<br>

			<?php
				$major = array("CS-Computer Science", "WDD-Web Design and Development", "CIT-Computer Information Technology", "CE-Computer Engineering");
				foreach($major as $value) {
					echo "<input type='radio' name='Major' value='$value'>$value <br>";
				}
			?> 
			Major:
			<input type="radio" name="Major" value="Computer Science"> <label>Computer Science </label>
			<input type="radio" name="Major" value="Web Design and Development"> <label>Web Design and Development </label>
			<input type="radio" name="Major" value="Computer Information Technology"> <label>Computer Information Technology </label>
			<input type="radio" name="Major" value="Computer Engineering"> <label>Computer Engineering </label>
			<br>
			<br>
			<label>Comments:</label> <textarea name="Comments" rows="10" cols="30"></textarea>
			<br>
			<br>
			
			<label>North America</label>
			<input type="checkbox" name="checkbox[]" value="North-America">
			<br>
			
			<label>South America</label>
			<input type="checkbox" name="checkbox[]" value="South-America">
			<br>

			<label>Europe</label>
			<input type="checkbox" name="checkbox[]" value="Europe">
			<br>

			<label>Africa</label>
			<input type="checkbox" name="checkbox[]" value="Africa">
			<br>

			<label>Asia</label>
			<input type="checkbox" name="checkbox[]" value="Asia">
			<br>

			<label>Australia</label>
			<input type="checkbox" name="checkbox[]" value="Australia">
			<br>
			
			<label>Antarctica</label>
			<input type="checkbox" name="checkbox[]" value="Antarctica">

			<br>
			<br>

			<label>Submit</label> <button type="Submit">Submit</button>
		</form>
	</body>
</html>