<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("Location: login_page.php");
    } else {
        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT game FROM Owned_game WHERE user='". $_SESSION['username'] ."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if(isset($_SESSION["cart_products"][$row['game']])){
                    unset($_SESSION["cart_products"][$row['game']]);
                }
            }
        }
        $date = date('Y-m-d');

        foreach ($_SESSION["cart_products"] as $item) {
            $sql = "INSERT INTO Owned_game (user, game, price, date) VALUES ('". $_SESSION['username'] ."', '". $item['title'] ."', ". $item['price'] .", '". $date ."')";
            if ($conn->query($sql)) {
                $sql = "SELECT * FROM Wishlist WHERE user='". $_SESSION['username'] ."' AND game='". $item['title'] ."'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $sql = "DELETE FROM Wishlist WHERE user='". $_SESSION['username'] ."' AND game='". $item['title'] ."'";
                    $conn->query($sql);
                }
                unset($_SESSION["cart_products"][$item['title']]);
            }
        }
        $conn->close();
        if (count($_SESSION["cart_products"]) > 0) {
            header("Location: shop_page.php");
        } else {
            unset($_SESSION["cart_products"]);
            header("Location: buy.html");
        }
    }
?>