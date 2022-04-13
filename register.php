<?php
	session_start();
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {

		$conn = new mysqli("localhost", "root", "", "game_webshop");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		// Protect from sql-injections
		$name = stripslashes($_POST['name']);
		$name = $conn->real_escape_string($name);

        $password = stripslashes($_POST['password']);
		$password = $conn->real_escape_string($password);

		$email = stripslashes($_POST['email']);
		$email = $conn->real_escape_string($email);

		$date = date('Y-m-d');

		$sql = "INSERT INTO User (name, password, email, registered)
				VALUES ('". $name ."','". $password ."','". $email ."','". $date ."')";

		if ($conn->query($sql)) {
            $_SESSION['loggedin'] = true;
			$_SESSION['username'] = $name;
			header("Location: index.php");
		} else {
			header("Location: register_page.php");
		}
		$conn->close();
	}
	else {
		header("Location: register_page.php");
	}
?>