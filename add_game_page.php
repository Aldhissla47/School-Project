<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title>Admin | Add Game </title>

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
                <h1> Add New Game </h1>
                <form action="add_game.php" method="post">
                    <h5>Title: (max 40 chars)</h5>
                    <input type="text" name="title" id="add_game_title" />
                    <br/>

                    <h5>Developer: (max 40 chars)</h5>
                    <input type="text" name="developer" id="add_game_dev" />
                    <br/>

                    <h5>Genre:</h5>
                    <select name="genre" id="add_game_genre">
                        <option value=""></option>
                        <?php
                            $conn = new mysqli("localhost", "root", "", "game_webshop");
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT * FROM Genre";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="'. $row['name'] .'">'. $row['name'] .'</option>';
                                }
                            } else {
                                echo '0 results';
                            }
                            $conn->close();
                        ?>
                    </select>
                    <br/>

                    <h5>Price: (kr)</h5>
                    <input type="text" name="price" id="add_game_price" />
                    <br/>

                    <h5>Release Date:</h5>
                    <input type="date" name="date" id="add_game_date" />
                    <br/>

                    <input type="checkbox" name="checkbox" value="true" id="add_game_checkbox" />Multiplayer
                    <br/>

                    <h5>Description:</h5>
                    <textarea type="text" name="description" id="add_game_description"></textarea>
                    <br/>

                    <h5>Image: (.png)</h5>
                    <input type="file" name="image" id="add_game_image" />
                    <br/>
                    <input type="submit" value="Upload" id="add_game_button" />
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