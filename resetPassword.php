<?php
	if (isset($_GET["token"]) && isset($_GET["email"])) {
		$connection = new mysqli("localhost", "root", "", "britayasia");
		
		$email = $connection->real_escape_string($_GET["email"]);
		$token = $connection->real_escape_string($_GET["token"]);

		$data= $connection-> query("SELECT id_user FROM users WHERE email='$email' AND token='$token'");

		if ($data->num_rows > 0) {
			$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
			$str = str_shuffle($str);
			$str = substr($str, 0, 15);

			$password = base64_encode(strrev(md5($str)));

			$connection->query("UPDATE users SET password = '$password', token = '' WHERE email='$email'");

			echo "Your new password is: $str";
		} else {
			echo "Please check your link!";
		}
	} else {
		header("Location: login.php");
		exit();
	}
?>