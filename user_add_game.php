<?php
    if (!empty($_POST['hidden_user'])) {
        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if (!empty($_POST['game'])) {
            $sql = "SELECT title, price FROM Game WHERE title='". $_POST['game'] ."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $date = date('Y-m-d');
                $sql = "INSERT INTO Owned_game (user, game, price, date) VALUES ('". $_POST['hidden_user'] ."', '". $_POST['game'] ."', ". $row['price'] .", '". $date ."')";
                $conn->query($sql);
            }
        }
        if (!empty($_POST['wishlist'])) {
            $sql = "SELECT game FROM Owned_game WHERE user='". $_POST['hidden_user'] ."' AND game='". $_POST['wishlist'] ."'";
            $result = $conn->query($sql);
            if ($result->num_rows === 0) {
                $sql = "INSERT INTO Wishlist (user, game) VALUES ('". $_POST['hidden_user'] ."', '". $_POST['wishlist'] ."')";
                $conn->query($sql);
            }
        }
        $conn->close();
    }
    header("Location: profile_page.php");
?>