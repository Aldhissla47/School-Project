<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title> Gameshop | Browse </title>

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
			
        <div class="container" id="content">
            <?php
                if (!empty($_POST['search'])){
                    $conn = new mysqli("localhost", "root", "", "game_webshop");

                    $q = $conn->real_escape_string($_POST['search']);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    if (empty($_POST['filter']) && empty($_POST['RadioButtonGroup'])) {
                        /*If radiobutton is empty. Use default value title and order by price*/
                        $sql = "SELECT title, price, image_path FROM Game WHERE title LIKE '%". $q."%'";

                    } else if (!empty($_POST['filter']) && !empty($_POST['RadioButtonGroup']) && $_POST['RadioButtonGroup'] == "OrderBP") {
                        /*order by price*/
                        $sql = "SELECT title, price, image_path FROM Game WHERE " .$_POST['filter']. " LIKE '%". $q."%' ORDER BY price";

                    } else if (empty($_POST['filter']) && !empty($_POST['RadioButtonGroup']) && $_POST['RadioButtonGroup'] == "OrderBP") {
                        /*no column name is given button is checked on price*/
                        $sql = "SELECT title, price, image_path FROM Game WHERE title LIKE '%". $q."%' ORDER BY price";

                    } else if (empty($_POST['filter']) && empty($_POST['RadioButtonGroup'])) {
                        /*No radiobutton is checked dont order by anything*/
                        $sql = "SELECT title, price, image_path FROM Game WHERE title LIKE '%". $q."%'";

                    } else if (!empty($_POST['filter']) && empty($_POST['RadioButtonGroup'])) {
                        /*Radiobutton is empty and selectBox search value has been picked - maybe "genre". Dont order by anything*/
                        $sql = "SELECT title, price, image_path FROM Game WHERE " .$_POST['filter']. " LIKE '%". $q."%'";

                    } else if (!empty($_POST['filter']) && !empty($_POST['RadioButtonGroup']) && $_POST['RadioButtonGroup'] == "OrderBR") {
                        /*order by relevance*/
                        $sql = "SELECT title, price, image_path FROM Game WHERE " .$_POST['filter']. " LIKE '%". $q."%' ORDER BY release_date DESC";

                    } else if (empty($_POST['filter']) && !empty($_POST['RadioButtonGroup']) && $_POST['RadioButtonGroup'] == "OrderBR") {
                        /*no select is made. Order by relevance*/
                        $sql = "SELECT title, price, image_path FROM Game WHERE title LIKE '%". $q."%' ORDER BY release_date DESC";
                    }
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $str = $row['title'];
                            preg_replace("/\w*?".preg_quote($q)."\w*/i", "<b>$0</b>", $str);

                            echo
                                '<div class="row" style="width: 100%;">
                                    <form method="post" action="word_search.php" name="link_form">
                                        <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
                                        <input type="image" src="'. $row['image_path'] .'" id="content_img">
                                    </form>
                                    <form method="post" action="game_page.php">
                                        <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
                                        <input type="submit" value="'. $row['title'] .'" class="title">
                                    </form>
                                    <h2>'. $row['price'] .' kr</h2>
                                </div>';
                        }
                    } else {
                        echo'Result 0';
                    }
                }
            ?>            
         </div>

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