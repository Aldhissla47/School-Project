<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("Location: login_page.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title>Gameshop | Profile</title>

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
                <div id="games">
                    <?php
                        $conn = new mysqli("localhost", "root", "", "game_webshop");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        if (isset($_POST['name']) || !empty($_SESSION['edit_user'])) { // if logged in as admin
                            if (isset($_POST['name'])) {
                                $_SESSION['edit_user'] = $_POST['name'];
                            }
                            echo "<h1> ". $_SESSION['edit_user'] ."'s Games </h1>";

                            $sql = "SELECT * FROM Owned_game WHERE user='". $_SESSION['edit_user'] ."' ORDER BY game ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo
                                    '<div class="game_square">
						                    <form method="post" action="user_remove_game.php">
                                                <input type="hidden" name="hidden_user" value="'. $_SESSION['edit_user'] .'">
                                                <input type="hidden" name="hidden_game" value="'. $row['game'] .'">
				                                <input type="submit" name="remove_game" value="Remove">
							                </form>
						                    <form method="post" action="game_page.php">
                                                <input type="hidden" name="hidden_title" value="'. $row['game'] .'">
				                                <input type="submit" value="'. $row['game'] .'" style="border:none;">
							                </form>
						                </div>';
                                }
                            } else {
                                echo 'User have no games!';
                            }
                        } else {
                            echo '<h1> My Games </h1>';
                            $sql = "SELECT * FROM Owned_game WHERE user='". $_SESSION['username'] ."' ORDER BY game ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()) {
                                    echo
                                    '<div class="game_square">
						                    <form method="post" action="game_page.php">
                                                <input type="hidden" name="hidden_title" value="'. $row['game'] .'">
				                                <input type="submit" value="'. $row['game'] .'" style="border:none;">
							                </form>
						                </div>';
                                }
                            } else {
                                echo 'You have no games!';
                            }
                        }
                        $conn->close();
                    ?>
                </div>

                <div id="wishlist">
                    <?php
                        $conn = new mysqli("localhost", "root", "", "game_webshop");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        if (isset($_SESSION['edit_user'])) { // if logged in as admin
                            echo "<h1> ". $_SESSION['edit_user'] ."'s Wishlist </h1>";

                            $sql = "SELECT game FROM Wishlist WHERE user='". $_SESSION['edit_user'] ."' ORDER BY game ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()) {
                                    echo
                                    '<div class="game_square">
						                <form method="post" action="user_remove_game.php">
                                            <input type="hidden" name="hidden_user" value="'. $_SESSION['edit_user'] .'">
                                            <input type="hidden" name="hidden_game" value="'. $row['game'] .'">
				                            <input type="submit" name="remove_wishlist" value="Remove">
							            </form>
						                <form method="post" action="game_page.php">
                                                <input type="hidden" name="hidden_title" value="'. $row['game'] .'">
				                            <input type="submit" value="'. $row['game'] .'" style="border:none;">
							            </form>
						            </div>';
                                }
                            } else {
                                echo 'Wishlist is empty!';
                            }
                        } else {
                            echo '<h1> My Wishlist </h1>';
                            $sql = "SELECT game FROM Wishlist WHERE user='". $_SESSION['username'] ."' ORDER BY game ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo
                                    '<div class="game_square">
						                <form method="post" action="user_remove_game.php">
                                            <input type="hidden" name="hidden_user" value="'. $_SESSION['username'] .'">
                                            <input type="hidden" name="hidden_game" value="'. $row['game'] .'">
				                            <input type="submit" name="remove_wishlist" value="Remove">
							            </form>
						                <form method="post" action="game_page.php">
                                            <input type="hidden" name="hidden_title" value="'. $row['game'] .'">
				                            <input type="submit" value="'. $row['game'] .'" style="border:none;">
							            </form>
						            </div>';
                                }
                            } else {
                                echo 'Wishlist is empty!';
                            }
                        }
                        $conn->close();
                    ?>
                </div>

                <div id="profile_options">
                    <h2>Options </h2>
                    <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            $conn = new mysqli("localhost", "root", "", "game_webshop");
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            if ($_SESSION['username'] === 'admin' && isset($_SESSION['edit_user'])) {
                                echo
                                '<form method="post" action="remove_user.php">
							            <input type="hidden" name="hidden_user" value="'. $_SESSION['edit_user'] .'">
				                        <input type="submit" value="Remove User">
						            </form>
                                    <form method="post" action="user_add_game_page.php">
							            <input type="hidden" name="hidden_user" value="'. $_SESSION['edit_user'] .'">
				                        <input type="submit" value="Add Game" class="profile_add_game">
						            </form>';
                                $sql = "SELECT * FROM Owned_game WHERE user='". $_SESSION['edit_user'] ."'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    echo
                                    '<form method="post" action="user_clear_games.php">
							                <input type="hidden" name="hidden_user" value="'. $_SESSION['edit_user'] .'">
				                            <input type="submit" name="clear_games" value="Clear User Games">
						                </form>';
                                }
                                $sql = "SELECT * FROM Wishlist WHERE user='". $_SESSION['edit_user'] ."'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    echo
                                    '<form method="post" action="user_clear_games.php">
							                <input type="hidden" name="hidden_user" value="'. $_SESSION['edit_user'] .'">
				                            <input type="submit" name="clear_wishlist" value="Clear User Wishlist">
						                </form>';
                                }
                            } else {
                                echo
                                '<form method="post" action="">
				                        <input type="submit" value="Change Username">
						            </form>
                                    <form method="post" action="">
				                        <input type="submit" value="Change Email">
						            </form>
                                    <form method="post" action="">
				                        <input type="submit" value="Change Password">
						            </form>
                                    <form method="post" action="user_clear_games.php">
							            <input type="hidden" name="hidden_user" value="'. $_SESSION['username'] .'">
				                        <input type="submit" name="clear_wishlist" value="Clear Wishlist">
						            </form>
                                    <form method="post" action="">
				                        <input type="submit" value="Delete Account">
						            </form>';
                            }
                            $conn->close();
                        }
                    ?>
                </div>
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
