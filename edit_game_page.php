<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title>Admin | Edit Game </title>

        <link rel="icon" href="images/tab_logo.ico" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    </head>

    <body>
        <div class="container" id="wrapper">
            <div id="header">
                <?php
                    include 'header.php';
                ?>
            </div>

            <div class="container" id="content">
                <h1> Edit Game </h1>
                <form action="edit_game.php" method="post">
                    <?php
                        $conn = new mysqli("localhost", "root", "", "game_webshop");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM Game WHERE title='". $_POST['hidden_edit_game'] ."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();

                            $title = $row['title'];
                            $description = $row['description'];
                            $genre = $row['genre'];
                            $price = $row['price'];
                            $dev = $row['developer'];
                            $date = $row['release_date'];
                            $image = $row['image_path'];
                            $multiplayer = $row['multiplayer'];

                            echo
                                '<input type="hidden" name="hidden_prev_game_title" value="'. $title .'" />

                                <h5>Title: (max 40 chars)</h5>
                                <input type="text" name="title" id="add_game_title" value="'. $title .'"/>
                                <br/>

                                <h5>Developer: (max 40 chars)</h5>
                                <input type="text" name="developer" id="add_game_dev" value="'. $dev .'"/>
                                <br/>

                                <h5>Genre:</h5>
                                <select name="genre" id="add_game_genre">
                                    <option value=""></option>';
                                $sql = "SELECT * FROM Genre";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="'. $row['name'] .'"'; if ($row['name'] === $genre) { echo ' selected'; } echo '>'. $row['name'] .'</option>';
                                    }
                                }
                            echo
                                '</select>
                                <br/>

                                <h5>Price: (kr)</h5>
                                <input type="text" name="price" id="add_game_price" value="'. $price .'"/>
                                <br/>

                                <h5>Release Date:</h5>
                                <input type="date" name="date" id="add_game_date" value="'. $date .'"/>
                                <br/>

                                <input type="checkbox" name="checkbox" value="true" id="add_game_checkbox"'; if ($multiplayer === '1') { echo 'checked'; } echo '/>Multiplayer
                                <br/>

                                <h5>Description:</h5>
                                <textarea type="text" name="description" id="add_game_description">'. $description .'</textarea>
                                <br/>

                                <h5>Image: (.png)</h5>
                                <input type="file" name="image" id="add_game_image"/>
                                <br/>';
                        } else {
                            echo '0 results';
                        }
                        $conn->close();
                    ?>
                    <input type="submit" value="Save" id="add_game_button" />
                </form>
            </div>

            <div class="footer">
                <?php
                    include 'footer.php';
                ?>
            </div>
            <div class="search_result"></div>
        </div><!-- Container End-->

        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>
    </body>
</html>