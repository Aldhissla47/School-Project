<?php
    if (!empty($_POST['hidden_user'])) {
        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if (isset($_POST['clear_games'])) {
            $sql = "DELETE FROM Owned_game WHERE user='". $_POST['hidden_user'] ."'";
            $conn->query($sql);
        } else if (isset($_POST['clear_wishlist'])) {
            $sql = "DELETE FROM Wishlist WHERE user='". $_POST['hidden_user'] ."'";
            $conn->query($sql);
        }
        $conn->close();
    }
    header("Location: profile_page.php");
?>