<?php
    session_start();
    if(!empty($_POST['hidden_game'])) { // Add game to cart

        $conn = new mysqli("localhost", "root", "", "game_webshop");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM Game WHERE title='". $_POST['hidden_game'] ."'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $title = $row['title'];
            $price = $row['price'];
            $dev = $row['developer'];
            $date = $row['release_date'];
            $image = $row['image_path'];

            $new_product['title'] = $title;
            $new_product['price'] = $price;
            $new_product['developer'] = dev;
            $new_product['date'] = $date;
            $new_product['image'] = $image;

            if(isset($_SESSION["cart_products"])) { // if session var already exist
                if(isset($_SESSION["cart_products"][$title])) {  // check item exist in products array
                    unset($_SESSION["cart_products"][$title]);   // unset old array item
                }
            }
            $_SESSION["cart_products"][$title] = $new_product;  // update or create product session with new item
        }
        $conn->close();

        $return_url = $_POST["return_url"]; // return url
		header("Location: index.php");
    }

    if(!empty($_POST['hidden_remove_game'])) { // Remove game from cart
        if(isset($_SESSION["cart_products"])) { // if session var exist
            if(isset($_SESSION["cart_products"][$_POST["hidden_remove_game"]])) {  // check item exist in products array
                unset($_SESSION["cart_products"][$_POST["hidden_remove_game"]]);   // unset old array item
            }
        }
        header("Location: shop_page.php");
    }

    if(!empty($_POST['hidden_clear'])) { // Remove all games from cart

        if(isset($_SESSION["cart_products"])) { // if session var exist
            unset($_SESSION["cart_products"]);
        }
        header("Location: index.php");
    }
?>