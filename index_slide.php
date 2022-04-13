<?php
    echo
        '<div id="slider"> <!-- START slider -->
            <div class="cycle-slideshow" data-cycle-slides=".items" data-cycle-pause-on-hover="true" data-cycle-fx="scrollHorz" data-cycle-timeout="30000">
                <span class="cycle-next"></span>
                <span class="cycle-prev"></span>';	
                        
                $conn = new mysqli("localhost", "root", "", "game_webshop");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM Game INNER JOIN Hot ON Game.title = Hot.game";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        echo
                            '<div class="items">
                                <form method="post" action="game_page.php">
                                    <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
                                    <input type="image" src="'. $row['image_path'] .'" class="slide_image">
                                </form>
                                <div class="info">
                                <h1>'. $row['price'] .' kr</h2>
                                <h3>'. $row['developer'] .'</h1>
                                </div>
                            </div>';
                    }
                } else {
                    echo '0 results';
                }
                $conn->close();
        echo
            '</div> 
	    </div> <!-- END slider-->';
?>