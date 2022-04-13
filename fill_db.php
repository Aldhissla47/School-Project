<?php
    $conn = new mysqli("localhost", "root", "", "game_webshop");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $chars = '0123456789abcdefghijklmnopqr stuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charsLength = strlen($chars);

    $today = date('Y-m-d');
    $min_date = strtotime("1990-01-01");
    $max_date = strtotime($today);

    echo 'Filling database...';
    for ($j = 0; $j < 1000; $j++) {
        $title = '';
        $max_i = mt_rand(3,20);
        for ($i = 0; $i < $max_i; $i++) {
            $title .= $chars[mt_rand(0, $charsLength - 1)];
        }
        $description = '';
        $max_i = mt_rand(10,200);
        for ($i = 0; $i < $max_i; $i++) {
            $description .= $chars[mt_rand(0, $charsLength - 1)];
        }
        $genre = '';
        $sql = "SELECT name FROM Genre ORDER BY RAND() LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $genre = $row['name'];
        }
        $price = mt_rand(49,599);

        $dev = '';
        $max_i = mt_rand(3,20);
        for ($i = 0; $i < $max_i; $i++) {
            $dev .= $chars[mt_rand(0, $charsLength - 1)];
        }
        $rand_date = mt_rand($min_date, $max_date);
        $date = date("Y-m-d", $rand_date);

        $image = '';
        $images = glob('images/games/*');
        $image = $images[mt_rand(0, count($images) - 1)];

        $mp = mt_rand(0,1);

        $sql = "INSERT INTO Game (title, description, genre, price, developer, release_date, image_path, multiplayer) VALUES ('". $title ."','". $description ."','". $genre ."',". $price .",'". $dev ."','". $date ."','". $image ."',". $mp .")";
        $conn->query($sql);
        //echo "INSERT INTO Game VALUES ('". $title ."','". $description ."','". $genre ."',". $price .",'". $dev ."','". $date ."','". $image ."',". $mp .")<br>";
    }
    $conn->close();
    header("Location: index.php");
?>
