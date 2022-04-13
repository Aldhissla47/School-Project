<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title> Gameshop | Advanced Search </title>

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
			</div> <!-- Header End -->

            <div class="container" id="search_area">
                <h1> Advanced Search </h1>
                <form action="advanced_search.php" method="post">
                    <h5>Title:</h5>
                    <input type="text" name="search[title]" value="<?php if (!empty($_SESSION['adv_search'])) { echo $_SESSION['adv_search']['title']; } ?>" id="adv_search_title" />

                    <h5>Developer:</h5>
                    <input type="text" name="search[developer]" value="<?php if (!empty($_SESSION['adv_search'])) { echo $_SESSION['adv_search']['developer']; } ?>" id="adv_search_dev" />

                    <h5>Genre:</h5>
                    <select name="search[genre]" id="adv_search_genre">
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
                                    echo '<option value="'. $row['name'] .'"'; if ($row['name'] === $_SESSION['adv_search']['genre']) { echo ' selected'; } echo '>'. $row['name'] .'</option>';
                                }
                            } else {
                                echo '0 results';
                            }
                            $conn->close();
                        ?>
                    </select>

                    <h5>Price: (min/max)</h5>
                    <input type="text" name="search[min_price]" value="<?php if (!empty($_SESSION['adv_search'])) { echo $_SESSION['adv_search']['min_price']; } ?>" id="adv_search_min_price" />
                    -
                    <input type="text" name="search[max_price]" value="<?php if (!empty($_SESSION['adv_search'])) { echo $_SESSION['adv_search']['max_price']; } ?>" id="adv_search_max_price" />

                    <h5>Year of Release: (min/max)</h5>
                    <select name="search[min_date]" id="adv_search_year">
                        <option value=""></option>
                        <?php
                            for ($i = date("Y"); $i > 1989; $i--) {
                                echo '<option value="'. $i .'"'; if ($i == $_SESSION['adv_search']['min_date']) { echo ' selected'; } echo '>'. $i .'</option>';
                            }
                        ?>
                    </select>
                    -
                    <select name="search[max_date]" id="adv_search_year">
                        <option value=""></option>
                        <?php
                            for ($i = date("Y"); $i > 1989; $i--) {
                                echo '<option value="'. $i .'"'; if ($i == $_SESSION['adv_search']['max_date']) { echo ' selected'; } echo '>'. $i .'</option>';
                            }
                        ?>
                    </select>

                    <h5>Has Multiplayer:</h5>
                    <select name="search[multiplayer]" id="adv_search_multiplayer">
                        <option value=""></option>
                        <option value="true" <?php if ($_SESSION['adv_search']['multiplayer'] === "true") { echo ' selected'; } ?> >True</option>
                        <option value="false" <?php if ($_SESSION['adv_search']['multiplayer'] === "false") { echo ' selected'; } ?> >False</option>
                    </select>

                    <h5>Order By:</h5>
                    <input type="radio" name="search[order_by]" value="OrderBT" <?php if (!isset($_SESSION['adv_search']['order_by']) || $_SESSION['adv_search']['order_by'] === "OrderBT") { echo ' checked'; } ?> ><label>Title</label>
                    <input type="radio" name="search[order_by]" value="OrderBD" <?php if ($_SESSION['adv_search']['order_by'] === "OrderBD") { echo ' checked'; } ?> ><label>Developer</label>
                    <input type="radio" name="search[order_by]" value="OrderBG" <?php if ($_SESSION['adv_search']['order_by'] === "OrderBG") { echo ' checked'; } ?> ><label>Genre</label>
                    <input type="radio" name="search[order_by]" value="OrderBP" <?php if ($_SESSION['adv_search']['order_by'] === "OrderBP") { echo ' checked'; } ?> ><label>Price</label>
                    <input type="radio" name="search[order_by]" value="OrderBY" <?php if ($_SESSION['adv_search']['order_by'] === "OrderBY") { echo ' checked'; } ?> ><label>Year</label>

                    <h5>Order In:</h5>
                    <input type="radio" name="search[order_in]" value="ASC" <?php if (!isset($_SESSION['adv_search']['order_in']) || $_SESSION['adv_search']['order_in'] === "ASC") { echo ' checked'; } ?> ><label>ASC</label>
                    <input type="radio" name="search[order_in]" value="DESC" <?php if ($_SESSION['adv_search']['order_in'] === "DESC") { echo ' checked'; } ?> ><label>DESC</label>

                    <h5>Items per page:</h5>
                    <select name="search[items]" id="adv_search_items">
                        <option value="10" <?php if (!isset($_SESSION['adv_search']['items']) || $_SESSION['adv_search']['items'] === "10") { echo ' selected'; } ?> >10</option>
                        <option value="20" <?php if ($_SESSION['adv_search']['items'] === "20") { echo ' selected'; } ?> >20</option>
                        <option value="30" <?php if ($_SESSION['adv_search']['items'] === "30") { echo ' selected'; } ?> >30</option>
                    </select>

                    <h5>Show As:</h5>
                    <select name="search[view]" id="adv_search_view">
                        <option value="detailed" <?php if (!isset($_SESSION['adv_search']['view']) || $_SESSION['adv_search']['view'] === "detailed") { echo ' selected'; } ?> >Detailed</option>
                        <option value="list" <?php if ($_SESSION['adv_search']['view'] === "list") { echo ' selected'; } ?> >List</option>
                    </select>

                    <br><br><input type="submit" value="Search" id="adv_search_button" />
                </form>

                <form action="advanced_search_reset.php" method="post">
                    <input type="submit" value="Reset" id="adv_search_button" />
                </form>
            </div> <!-- Search Area End -->

            <div class="container" id="content">
            <?php
                if (!empty($_SESSION['sql'])) {
                    $conn = new mysqli("localhost", "root", "", "game_webshop");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = $_SESSION['sql'];
                    $result = $conn->query($sql);
                    $itemCount = $result->num_rows;
                    $results_per_page = $_SESSION['adv_search']['items'];

                    if (isset($_GET["page"])) { 
                        $page  = $_GET["page"]; 
                    } else { 
                        $page = 1; 
                    }
                    $start_from = ($page-1) * $results_per_page;
                    $sql .= " LIMIT ". $start_from .",". $results_per_page ."";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $total_pages = ceil($itemCount / $results_per_page);

                        include 'page_number.php';

                        while ($row = $result->fetch_assoc()) {
                            if ($_SESSION['adv_search']['view'] === "detailed") {
                                echo
                                    '<div class="row"">
                                        <form method="post" action="game_page.php" name="link_form">
                                            <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
                                            <input type="image" src="'. $row['image_path'] .'" id="content_img">
                                        </form>
                                        <form method="post" action="game_page.php">
                                            <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
                                            <input type="submit" value="'. $row['title'] .'" class="title">
                                        </form>
                                    
                                        <h5>'. $row['developer'] .'</h5>
                                        <h5>'. $row['genre'] .'</h5>
                                        <h5>'. $row['release_date'] .'</h5>';
                                        if ($row['multiplayer'] === "1") {
                                            echo '<h5>Multiplayer</h5>';
                                        }
                                        echo '
                                        <h2>'. $row['price'] .' kr</h2>
                                    </div>';
                            } else {
                                echo
                                    '<div class="list_row"">
                                        <form method="post" action="game_page.php">
                                            <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
                                            <input type="submit" value="'. $row['title'] .'" class="list_title">
                                        </form>
                                        <p>'. $row['price'] .' kr</p>                                        
                                        <p>'. $row['release_date'] .'</p>
                                        <p>'. $row['genre'] .'</p>
                                        <p>'. $row['developer'] .'</p>';
                                        if ($row['multiplayer'] === "1") {
                                            echo '<p id="list_mp"> Multiplayer </p>';
                                        }
                                        echo
                                    '</div>';
                            }
                        }
                        include 'page_number.php';
                    }
                    $conn->close();
                }
            ?>
            </div> <!-- Content End-->

			<div class="footer">
                <?php
                    include 'footer.php';
                ?>
			</div>
		</div> <!-- Container End-->

        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/js/script.js"></script>
	</body>
</html>