<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width" , initial-scale=1 />

        <title> Gameshop | Shop </title>

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
                <h1>Shopping Cart</h1>
                <?php
                    if(!empty($_SESSION["cart_products"])) {
                         $total = 0;
                        foreach ($_SESSION["cart_products"] as $item) {
                            $total = $total + $item['price'];
                         echo
                                '<div class="row">
                                    <form method="post" action="game_page.php">
                                        <input type="hidden" name="hidden_title" value="'. $item['title'] .'">
                                        <input type="image" src="'. $item['image'] .'" id="content_img">
                                    </form>
                                    <form method="post" action="game_page.php">
                                        <input type="hidden" name="hidden_title" value="'. $item['title'] .'">
                                        <input type="submit" value="'. $item['title'] .'" class="title">
                                    </form>
                                    <h2>'. $item['price'] .' kr</h2>
                                    <form method="post" action="update_cart.php">
                                        <input type="hidden" name="hidden_remove_game" value="'. $item['title'] .'">
                                        <input type="submit" value="Remove" class="cart_add_btn">
                                    </form>
                                </div>';
                        }
                        echo
                            '<div class="row" id="summary">
                                <p id="total_cost"> Total cost: '. $total .' kr </p>

                                <form method="post" action="buy.php">
                                    <input type="submit" value="Buy" id="shop_buy_btn">
                                </form>

                                <form method="post" action="update_cart.php">
                                    <input type="hidden" name="hidden_clear" value="clear">
                                    <input type="submit" value="Clear All" id="shop_clear_btn">
                                </form>
                            </div>';
                    } else {
                        echo 'Your cart is empty';
                    }
                ?>
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
