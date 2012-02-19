<html>
<head>
	<title>CompressorBot Comming Soon!</title>
</head>
<body>
	<h1>CompressorBot</h1>

	<form action="?" method="POST" name="compressorbot_prerelease">
		<label for="prerelease_email"></label><input type="email" id="prerelease_email" name="prerelease_email" value="email">
		<input type="submit" id="prerelease_submit" value="Submit Email"/>
	</form>
	<?php
		var_dump($_POST);
		echo "<br>";
		$email = empty($_POST['prerelease_email']);
		echo $email;
		if($email != "email"){
			$db = new \PDO('mysql:host=localhost;dbname=compressorbot_test','root','root');
		$stmt = $db->prepare("INSERT INTO `test_data`(email) VALUES(':email')");
		$stmt->execute(array(':email'=>$email));
		$db = new \PDO('mysql:host=localhost;dbname=compressorbot_test','root','root');
		$stmt = $db->prepare('SELECT * FROM `test_data`');
		$stmt->execute();
		$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		foreach ($rows as $row) {
			var_dump($row);
			echo "<br>";
		}
		}


	?>
</body>
</html>
