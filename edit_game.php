<?php
    if(!empty($_POST['hidden_prev_game_title']) && !empty($_POST['title']) && !empty($_POST['developer']) && !empty($_POST['genre']) && !empty($_POST['price']) && !empty($_POST['date']) && !empty($_POST['description']) && !empty($_POST['image'])) {

        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $prev_title = $_POST['hidden_prev_game_title'];

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
        $sql = "UPDATE Game SET title='". $title ."', description='". $description ."', genre='". $genre ."', price='". $price ."', developer='". $dev ."', release_date='". $date ."', image_path='". $image ."', multiplayer='". $multiplayer ."' WHERE title='". $prev_title ."'";

        $conn->query($sql);
        $conn->close();
    }
    header("Location: index.php");
?>