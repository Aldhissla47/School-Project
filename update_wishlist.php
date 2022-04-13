<?php
    session_start();
    if (!empty($_POST['hidden_add_game'])) {

        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
            header("Location: login_page.php");
        }
        else {
            $conn = new mysqli("localhost", "root", "", "game_webshop");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM Wishlist WHERE user='". $_SESSION['username'] ."' AND game='". $_POST['hidden_add_game'] ."'";
            $result = $conn->query($sql);
            if ($result->num_rows < 1) {
                $sql = "INSERT INTO Wishlist (user, game) VALUES ('". $_SESSION['username'] ."', '". $_POST['hidden_add_game'] ."')";
                echo "INSERT INTO Wishlist (user, game) VALUES ('". $_SESSION['username'] ."', '". $_POST['hidden_add_game'] ."')<br>";
                $conn->query($sql);
            }
            $conn->close();
        }
        $return_url = $_POST["return_url"]; // return url
		header("Location: index.php");
    }

    else if (!empty($_POST['hidden_remove_game'])) {

        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
            header("Location: login_page.php");
        }
        else {
            $conn = new mysqli("localhost", "root", "", "game_webshop");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "DELETE FROM Wishlist WHERE user='". $_SESSION['username'] ."' AND game='". $_POST['hidden_remove_game'] ."'";
            $conn->query($sql);

            $conn->close();
        }
        $return_url = $_POST["return_url"]; // return url
		header("Location: index.php");
    }
?>