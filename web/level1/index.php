<html>
	<head>
		<title>Admin Key Panel</title>
	</head>
	<body>
		<p>Enter admin password for key</p>
		<?php
			$secret_key = '284be5ee435befac45b9e5d396d97581';
			extract($_GET);
			$flag = '$$_FLAG_$$';
			if (isset($password)) {
				if ($password === $secret_key) {
					echo "<p>Correct!</p>";
					echo "<p>Flag: "." $flag</p>";
				} else {
					echo "<p>Incorrect!</p>";
				}
			}
		?>
		<form action="#" method=”GET”>
		<p><input type="text" name="password"></p>
		<p><input type="submit" value="submit"></p>
		</form>
	</body>
	<!-- source code: /index.phps -->
</html>
