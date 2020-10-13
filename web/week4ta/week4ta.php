<?php

	try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$queryResults = "<div id='query-results'>"

foreach ($db->query('SELECT * FROM scriptures') as $row)
{
	$queryResults .= "<p id='scripture'>"
  	$queryResults .= "<strong>" . $row['book'];
  	$queryResults .= " " . $row['chapter'];
	$queryResults .= ":" . $row['verse'] . "</strong>";
	$queryResults .= " - \"" . $row['content'] . "\"";
}

$queryResults .= "</div>"
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