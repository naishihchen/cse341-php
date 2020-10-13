<!-- <?php

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

$statement = $db->query('SELECT * FROM scriptures');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

$queryResults = "<p id='scripture-results'>";
$queryResults .= $results;
$queryResults -. "</p>";

?> -->
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