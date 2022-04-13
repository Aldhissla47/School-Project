<nav class="navbar navbar-default" id="navbar2"> <!-- START navbar2-->
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                Genre
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
            <?php
                $conn = new mysqli("localhost", "root", "", "game_webshop");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM Genre";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        echo
                            '<li>
                                <form method="post" action="genre_page.php">
								    <input type="submit" name="genre" value="'. $row['name'] .'"class="genrebutton">
							    </form>
                            </li>';
                    }
                } else {
                    echo '0 results';
                }
                $conn->close();
            ?>
            </ul>
        </li>

        <li>
            <a href="#">Bestsellers</a>
        </li>
        <li>
            <a href="#">Below 300 kr</a>
        </li>
        <li>
            <a href="#">Below 200 kr</a>
        </li>
        <li>
            <a href="#">Below 100 kr</a>
        </li>
    </ul>
    <?php
        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT title FROM Game";
        $result = $conn->query($sql);
        if ($result->num_rows < 20) {
            echo
                '<form method="post" action="fill_db.php">
		            <input type="submit" name="fill_db" value="Fill database" id="fill_db_btn">
	            </form>';
        }
        $conn->close();
    ?>
</nav><!-- END navbar2-->