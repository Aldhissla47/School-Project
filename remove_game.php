<?php
    if(!empty($_POST['hidden_title'])) {

        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "DELETE FROM Game WHERE title='". $_POST['hidden_title'] ."'";
        $conn->query($sql);
        $conn->close();
    }
    header("Location: games_overview_page.php");
?>