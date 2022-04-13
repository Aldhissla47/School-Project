<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

		<title> Gameshop </title>

		<link rel="icon" href="images/tab_logo.ico">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	</head>
	
	<body>
        <div class="container" id=wrapper> <!--START content-->
            <div id="header">
                <?php
                    include 'header.php';
                    include 'index_slide.php';
                    include 'header2.php';
                ?>
            </div>

            <div class="container" id="content">
                <?php
                    include 'index_content.php';
                ?>
            </div>

            <div class="footer">
                <?php
                    include 'footer.php';
                ?>
            </div>
        </div> <!-- Container End-->

        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/scroll-sneak.js"></script>
        <script src="/js/script.js"></script>
	</body>
</html>
