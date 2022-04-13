<nav class="navbar navbar-default" id="navbar1"> <!-- START navbar1-->
        <!--START login-->

        <div class="logotype">
            <a href="index.php"><img src="images/OriginalLogo.png" alt="Frudu lol"/></a>
        </div>
<?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($_SESSION['username'] === 'admin') {
            echo
                '<div class="login">
                    <ul>
                        <li><a href="user_overview_page.php">Users</a></li>
                        <li><a href="add_game_page.php">Add Game</a></li>
                        <li><a href="games_overview_page.php">Game Overview</a></li>
                    </ul>
                </div>';
        } else {
            echo
                '<div class="login">
                        <a href="login_page.php"><img src="images/signin.png" alt="Account picture"/></a>
                        <a href="profile_page.php">Profile</a>
                </div>';
        }
        echo
            '<div class="header_login">
                <p> Hello '. $_SESSION['username'] .'!</p>
                <form action="logout.php" method="post" class="logout">
                    <input type="submit" class="logout_button" value="Log Out">
                </form>
            </div>';
    } else {
        echo
            '<div class="login">
                <a href="login_page.php"><img src="images/signin.png" alt="Account picture"/></a>
                <a href="login_page.php">Login / Sign up</a>
            </div>';
    }
?>
        <!--END login-->

        <div class="customer-support"> <!--START customer-support-->
            <a href="#">
                <img src="images/support.png" alt="Support picture" />
            </a>
            <a href="#">Customer service</a>
        </div><!-- END customer-support-->

        <div id="adv_search_link">
            <a href="advanced_search_page.php"> Advanced Search </a>
        </div>

        <div class="input-group" id="searchbar"> <!--START searchbar-->
            <form method="post" action="browse_page.php" class="shit">
                <select name="filter" class="search_selectbox">
                    <option value="">Filter by</option>
                    <option value="title">Title</option>
                    <option value="genre">Genre</option>
                    <option value="developer">Developer</option>
                </select>
                <input type="search" name="search" class="form-control search_box" id="whore">
                <input type="submit" value="" class="search_btn">
                <input type="radio" name="RadioButtonGroup" value="OrderBR" id="radio_br"><label>Relevance</label>
                <input type="radio" name="RadioButtonGroup" value="OrderBP" id="radio_bp"><label>Order By Price</label>
            </form>
        </div> <!--END searchbar-->

        <div class="shop_cart"> <!--START Shopcart-->
            <form method="post" action="shop_page.php">
                <input type="image" src="images/shoppingcart.png" />
            </form>
        <?php
            if(!empty($_SESSION["cart_products"])) {
                echo
                '<div id="shop_cart_nr">
                    <form method="post" action="shop_page.php">
                        <input type="submit" value="'. count($_SESSION["cart_products"]) .'" id="cart_nr_background">
                    </form>
                </div>';
            }
        ?>
        </div> <!--END Shopcart-->
    <div class="search_result"></div>
</nav> <!-- END navbar1-->