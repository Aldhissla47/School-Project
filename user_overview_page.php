<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title> Admin | User Overview</title>

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
                <h1> Users </h1>
                <?php
                    $conn = new mysqli("localhost", "root", "", "game_webshop");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT name FROM User ORDER BY name ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                            if ($row['name'] !== 'admin') {
                                echo
                                    '<div class="user_row">
						                <form method="post" action="profile_page.php">
				                            <input type="submit" name="name" value="'. $row['name'] .'" style="border:none;">
							            </form>
						            </div>';
                            }
                        }
                    } else {
                        echo '0 results';
                    }
                    $conn->close();
                ?>
            </div>

            <div class="footer">
                <?php
                    include 'footer.php';
                ?>
            </div>
            <div class="search_result"></div>
        </div><!-- Container End-->

        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>
    </body>
</html>