<?php
    if (!empty($_POST['hidden_add_hot'])) {

        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO Hot (game) VALUES ('". $_POST['hidden_add_hot'] ."')";
        $conn->query($sql);
        $conn->close();
    } else if (!empty($_POST['hidden_remove_hot'])) {

        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "DELETE FROM Hot WHERE game='". $_POST['hidden_remove_hot'] ."'";
        $conn->query($sql);
        $conn->close();
    }
    header("Location: games_overview_page.php");
?>