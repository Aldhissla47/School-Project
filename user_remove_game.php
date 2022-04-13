<?php
    if (!empty($_POST['hidden_user']) && !empty($_POST['hidden_game'])) {
        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if (isset($_POST['remove_game'])) {
            $sql = "DELETE FROM Owned_game WHERE user='". $_POST['hidden_user'] ."' AND game='". $_POST['hidden_game'] ."'";
            $conn->query($sql);
        } else if (isset($_POST['remove_wishlist'])) {
            $sql = "DELETE FROM Wishlist WHERE user='". $_POST['hidden_user'] ."' AND game='". $_POST['hidden_game'] ."'";
            $conn->query($sql);
        }
        $conn->close();
    }
    header("Location: profile_page.php");
?>