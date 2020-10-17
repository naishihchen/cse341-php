<?php

include 'database_connect.php';

$queryResults = "<div id='query-results'>";

foreach ($db->query('SELECT * FROM scriptures') as $row)
{
	$queryResults .= "<p id='scripture'>";
  	$queryResults .= "<strong>" . $row['book'];
  	$queryResults .= " " . $row['chapter'];
	$queryResults .= ":" . $row['verse'] . "</strong>";
	$queryResults .= ' - "' . $row['content'] . '"';
	$queryResults .= "</p>";
}

$queryResults .= "</div>";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Week 4 Team Activity</title>
	</head>
	<body>
		<h1>Scripture Resources</h1>
		<?php
                        if(isset($queryResults)){
                            echo $queryResults;
                        }
                    ?>
	</body>
</html>