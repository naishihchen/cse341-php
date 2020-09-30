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
		
			Major:
			<?php
				$major = array("CS-Computer Science", "WDD-Web Design and Development", "CIT-Computer Information Technology", "CE-Computer Engineering");
				foreach($major as $value) {
					echo "<input type='radio' name='Major' value='$value'>$value <br>";
				}
			?> 
			<br>

			<label>Comments:</label> <textarea name="Comments" rows="10" cols="30"></textarea>
			<br>
			<br>
			
			<label>North America</label>
			<input type="checkbox" name="checkbox[]" value="NA">
			<br>
			
			<label>South America</label>
			<input type="checkbox" name="checkbox[]" value="SA">
			<br>

			<label>Europe</label>
			<input type="checkbox" name="checkbox[]" value="EU">
			<br>

			<label>Africa</label>
			<input type="checkbox" name="checkbox[]" value="AF">
			<br>

			<label>Asia</label>
			<input type="checkbox" name="checkbox[]" value="AS">
			<br>

			<label>Australia</label>
			<input type="checkbox" name="checkbox[]" value="AU">
			<br>
			
			<label>Antarctica</label>
			<input type="checkbox" name="checkbox[]" value="AN">

			<br>
			<br>

			<label>Submit</label> <button type="Submit">Submit</button>
		</form>
	</body>
</html>