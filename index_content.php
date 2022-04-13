<?php
    $conn = new mysqli("localhost", "root", "", "game_webshop");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT DISTINCT * FROM Game INNER JOIN Hot ON Game.title = Hot.game";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           echo
                '<div class="row">
                    <form method="post" action="game_page.php">
                        <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
                        <input type="image" src="'. $row['image_path'] .'" id="content_img">
                    </form>
                    <form method="post" action="game_page.php">
                        <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
                        <input type="submit" value="'. $row['title'] .'" class="title">
                    </form>
                    <h2>'. $row['price'] .' kr</h2>';
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['username'] !== 'admin') {    // if the user is logged in and is not admin
                $sql = "SELECT * FROM Owned_game WHERE user='". $_SESSION['username'] ."' AND game='". $row['title'] ."'";
                $result2 = $conn->query($sql);

                if ($result2->num_rows === 0) {  // if the user does not own the game
                    $sql = "SELECT * FROM Wishlist WHERE user='". $_SESSION['username'] ."' AND game='". $row['title'] ."'";
                    $result3 = $conn->query($sql);

                    if ($result3->num_rows > 0) {   // if the user has the game in his wishlist
                        echo
                            '<form method="post" action="update_wishlist.php">
                                <input type="hidden" name="hidden_remove_game" value="'. $row['title'] .'">
                                <input type="submit" value="Remove from wishlist" class="add">
                            </form>';
                    } else {
                        echo
                            '<form method="post" action="update_wishlist.php">
                                <input type="hidden" name="hidden_add_game" value="'. $row['title'] .'">
                                <input type="submit" value="Add to wishlist" class="add">
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
            }
            if (!isset($_SESSION['username'])) { // if not logged in
                if (!isset($_SESSION["cart_products"][$row['title']])) {  // if item do not exist in shopping cart
                    echo
                        '<form method="post" action="update_cart.php">
                            <input type="hidden" name="hidden_game" value="'. $row['title'] .'">
                            <input type="submit" value="Add to cart" class="cart_add_btn">
                        </form>';
                }
            }
            echo '</div>';
        }
    } else {
        echo '0 results';
    }
    $conn->close();
?>