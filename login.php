<?php
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$conn = new mysqli("localhost", "root", "", "game_webshop");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		// Protect from sql-injections
		$username = stripslashes($_POST['username']);
		$password = stripslashes($_POST['password']);
		$username = $conn->real_escape_string($username);
		$password = $conn->real_escape_string($password);

		$sql = "SELECT * FROM User WHERE name='". $username ."' and password='". $password ."'";
		$result = $conn->query($sql);

		if ($result->num_rows == 1){
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
            header("Location: index.php");
		} else {
            header("Location: login_page.php");
        }
        $conn->close();
	}
	else {
		header("Location: login_page.php");
	}
?>