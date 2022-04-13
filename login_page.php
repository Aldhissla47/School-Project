<?php
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {		
		header("Location: index.php");
	}
?>
<!doctype html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title>Gameshop | Login</title>

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

            <div class="container" id="container_loginpage">
                <h1>Login</h1>
                <div id="login_form">
                    <form method="post" action="login.php">
                      <div class="username">
                            <p>Username:</p>
                            <input type="text" name="username" class="login_box" id="username_box" />
                      </div>
                     <div class="password">
                            <p>Password:</p>
                            <input type="password" name="password" class="login_box" id="password_box" />
                        </div>
                            <input type="submit" id="login_button" value="Login" />
                            <a href="register.php">Register </a>
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