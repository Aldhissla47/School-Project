<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title> Admin | Games Overview </title>

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
                <?php
                    $conn = new mysqli("localhost", "root", "", "game_webshop");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT title FROM Game ORDER BY title ASC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()) {
                            echo
                                '<div class="remove_game_row">
                                    <form method="post" action="edit_game_page.php" class="remove_button">
                                        <input type="hidden" name="hidden_edit_game" value="'. $row['title'] .'">
						                <input type="submit" value="Edit">
					                </form>';

                                    $sql = "SELECT * FROM Hot WHERE game='". $row['title'] ."'";
                                    $result2 = $conn->query($sql);
                                    if ($result2->num_rows === 0) {  // if the game does not exist in Hot
                                        echo
                                            '<form method="post" action="hot.php" class="remove_button">
							                    <input type="hidden" name="hidden_add_hot" value="'. $row['title'] .'">
				                                <input type="submit" value="Add to Hot">
							                </form>';
                                    } else {
                                        echo
                                            '<form method="post" action="hot.php" class="remove_button">
							                    <input type="hidden" name="hidden_remove_hot" value="'. $row['title'] .'">
				                                <input type="submit" value="Remove from Hot">
							                </form>';
                                    }
                                echo
						            '<form method="post" action="remove_game.php" class="remove_button">
							            <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
				                        <input type="submit" value="Remove">
							        </form>
						            <form method="post" action="game_page.php" class="remove_gametag">
							            <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
				                        <input type="submit" value="'. $row['title'] .'" style="border:none;">
							        </form>
						        </div>';
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