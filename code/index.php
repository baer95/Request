<?php

error_reporting(E_ALL);

//require("./classes/");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>FBA - SQLIA</title>
		<link rel="stylesheet" type="text/css" href="./css/custom.css">
	</head>
	<body>
		<div class='container'>
			<h1>FBA - SQLIA</h1>
			<h3>Eingabe der Daten</h3>
			<form action="index.php" method="post">
				<p><textarea class="textarea" name="textarea"><?php echo $_POST["textarea"]?></textarea></p>
				<p><input type="text" name="user" placeholder="Username">&nbsp;<input type="text" name="pass" placeholder="Password"></p>
				<p><input type="reset">&nbsp;<input type="submit"></p>
			</form>
			<h3>Ausgabe der Daten</h3>
			<pre><?php echo $_POST["textarea"] ?></pre>
			<h3>Speicherung der Eingabe in der Datenbank</h3>
<?php

$db = new mysqli("localhost", "fba_sqlia", "fba_sqlia", "fba_sqlia");

$user = $_POST["user"];
$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT, ['cost' => 12]);

$sql = "INSERT INTO `fba_sqlia`.`login` (`username`, `password`) VALUES ('$user', '$pass')";

$result = $db->query($sql);

if ($result) {
	echo "<p>Die Daten wurden erfolgreich gespeichert.</p>";
} else {
	echo "<p>Die Daten konnten nicht gespeichert werden.</p>";
}

$db->close();

?>
			<h3>Ausgabe der Daten aus der Datenbank</h3>
<?php

// $db = new mysqli("localhost", "fba_sqlia", "fba_sqlia", "fba_sqlia");

// $sql = "SELECT *
// 		FROM `fba_sqlia`.`login`
// 		ORDER BY `id` ASC";

// $result = $db->query($sql);

// $result->close();
// $db->close();










?>
		</div>
	</body>
</html>
