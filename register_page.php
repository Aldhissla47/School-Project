<?php
	session_start();
?>

<!doctype html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title> Gameshop | Register </title>

        <link rel="icon" href="images/tab_logo.ico" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	</head>
	
	<body>
		<div class="container" id="wrapper">
            <div id="header">
                <?php
                    include 'header.php';
                ?>
            </div>
					
			<div class="container" id="content">
				<div id="register_form">
					<h1> Register a new user </h1>
					<form action="register.php" method="post" id="form">
						<h5>Username:</h5><input type="text" name="name" id="register_name"><br>
						<h5>Email:</h5><input type="text" name="email" id="register_email" /><br>
                        <h5>Password:</h5><input type="password" name="password" id="register_password" /><br />
						<input type="submit" id="send_button" value="Register">
					</form>
				</div>
			</div>

            <div class="footer">
                <?php
                    include 'footer.php';
                ?>
            </div>
			<div class="search_result"></div>
		</div> <!-- Container End-->

        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>
	</body>
</html>