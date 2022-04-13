<?php
	session_start();
?>

<!doctype html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title> Gameshop | Game </title>

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
                    if(isset($_POST['hidden_title'])) {
                        $conn = new mysqli("localhost", "root", "", "Game_webshop");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM Game WHERE title='". $_POST['hidden_title'] ."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo
                                '<img src="'. $row['image_path'] .'" class="slide_image">
				                <div id="game_hidden_content">
					                <h2>'. $row['title'] .'</h2>
					                <p>'. $row['description'] .'</p>
					                <h4>'. $row['developer'] .' '. $row['release_date'] .'</h4>';

                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['username'] === 'admin') {    // if the user is logged as admin
                                echo
                                    '<form method="post" action="edit_game_page.php">
                                        <input type="hidden" name="hidden_edit_game" value="'. $row['title'] .'">
						                <input type="submit" value="Edit" id="game_edit_game_btn">
					                </form>';
                            } else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['username'] !== 'admin') {    // if the user is logged in but not as admin
                                $sql = "SELECT * FROM Owned_game WHERE user='". $_SESSION['username'] ."' AND game='". $row['title'] ."'";
                                $result2 = $conn->query($sql);

                                if ($result2->num_rows === 0) {  // if the user does not own the game
                                    $sql = "SELECT * FROM Wishlist WHERE user='". $_SESSION['username'] ."' AND game='". $row['title'] ."'";
                                    $result3 = $conn->query($sql);

                                    if ($result3->num_rows > 0) {   // if the user has the game in his wishlist
                                        echo
                                        '<form method="post" action="update_wishlist.php">
                                                <input type="hidden" name="hidden_remove_game" value="'. $row['title'] .'">
								                <input type="submit" value="Remove from wishlist" id="game_wishlist_remove_btn">
							                </form>';
                                    } else {
                                        echo
                                        '<form method="post" action="update_wishlist.php">
                                                <input type="hidden" name="hidden_add_game" value="'. $row['title'] .'">
							                    <input type="submit" value="Add to wishlist" class="wishlist_add_btn_gamepage">
						                    </form>';
                                    }
                                    if (!isset($_SESSION["cart_products"][$row['title']])) {  // if item do not exist in shopping cart
                                        echo
                                            '<form method="post" action="update_cart.php">
                                                <input type="hidden" name="hidden_game" value="'. $row['title'] .'">
                                                <input type="submit" value="Add to cart" class="cart_add_btn">
                                            </form>';
                                    }
                                }
                            } else {
                                if (!isset($_SESSION['username'])) { // if not logged in
                                    if (!isset($_SESSION["cart_products"][$row['title']])) {  // if item do not exist in shopping cart
                                        echo
                                            '<form method="post" action="update_cart.php">
                                                <input type="hidden" name="hidden_game" value="'. $row['title'] .'">
                                                <input type="submit" value="Add to cart" class="cart_add_btn_gamepage">
                                            </form>';
                                    }
                                }
                                echo '</div>';
                            }
                        } else {
                        echo '0 results';
                        }
                        $conn->close();
                    }
                ?>

            <div class="footer">
                <?php
                    include 'footer.php';
                ?>
            </div>		
		</div> <!-- Container End-->

        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>
	</body>	
</html>