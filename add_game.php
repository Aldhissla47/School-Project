<?php
    if(!empty($_POST['title']) && !empty($_POST['developer']) && !empty($_POST['genre']) && !empty($_POST['price']) && !empty($_POST['date']) && !empty($_POST['description']) && !empty($_POST['image'])) {

        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Protect from sql-injections
        $title = stripslashes($_POST['title']);
        $title = $conn->real_escape_string($title);

        $dev = stripslashes($_POST['developer']);
        $dev = $conn->real_escape_string($dev);

        $genre = stripslashes($_POST['genre']);
        $genre = $conn->real_escape_string($genre);

        $price = stripslashes($_POST['price']);
        $price = $conn->real_escape_string($price);

        $date = stripslashes($_POST['date']);
        $date = $conn->real_escape_string($date);

        $description = stripslashes($_POST['description']);
        $description = $conn->real_escape_string($description);

        $image = stripslashes($_POST['image']);
        $image = $conn->real_escape_string($image);
        $image = 'images/games/'. $image .'';

        if (!empty($_POST['checkbox'])) {
            $multiplayer = 1;
        } else {
            $multiplayer = 0;
        }
        $sql = "INSERT INTO Game (title, description, genre, price, developer, release_date, image_path, multiplayer) VALUES ('". $title ."','". $description ."','". $genre ."',". $price .",'". $dev ."','". $date ."','". $image ."',". $multiplayer .")";

        if ($conn->query($sql)) {
            header("Location: index.php");
        } else {
            header("Location: add_game_page.php");
        }
        $conn->close();
    }
    else {
        header("Location: add_game_page.php");
    }
?>