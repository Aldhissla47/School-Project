<?php
    if(!empty($_POST['hidden_user'])) {
        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "DELETE FROM Wishlist WHERE user='". $_POST['hidden_user'] ."'";
        $conn->query($sql);

        $sql = "DELETE FROM Owned_game WHERE user='". $_POST['hidden_user'] ."'";
        $conn->query($sql);

        $sql = "DELETE FROM User WHERE name='". $_POST['hidden_user'] ."'";
        $conn->query($sql);

        $conn->close();
    }
    header("Location: user_overview_page.php");
?>