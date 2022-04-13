<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title> Admin | Add Game </title>

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
                <h1> Add Game For <?php echo $_POST['hidden_user']; ?></h1>
                <form action="user_add_game.php" method="post">
                    <h5>To Owned_game:</h5>
                    <select name="game" id="user_add_game">
                        <option value=""></option>
                        <?php
                            $conn = new mysqli("localhost", "root", "", "game_webshop");
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT title FROM Game WHERE title NOT IN (SELECT game FROM Owned_game WHERE user='". $_POST['hidden_user'] ."') ORDER BY title ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="'. $row['title'] .'">'. $row['title'] .'</option>';
                                }
                            } else {
                                echo '0 results';
                            }
                            $conn->close();
                        ?>
                    </select>
                    <br/>

                    <?php
                        echo '<input type="hidden" name="hidden_user" value="'. $_POST['hidden_user'] .'">';
                    ?>

                    <h5>To wishlish:</h5>
                    <select name="wishlist" id="user_add_game_wishlist">
                        <option value=""></option>
                        <?php
                            $conn = new mysqli("localhost", "root", "", "game_webshop");
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT title FROM Game WHERE title NOT IN (SELECT game FROM Wishlist WHERE user='". $_POST['hidden_user'] ."') ORDER BY title ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="'. $row['title'] .'">'. $row['title'] .'</option>';
                                }
                            } else {
                                echo '0 results';
                            }
                            $conn->close();
                        ?>
                    </select>
                    <br/>

                    <input type="submit" value="Add" id="user_add_game_button" />
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