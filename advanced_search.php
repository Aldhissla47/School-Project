<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "game_webshop");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (!empty($_POST['search'])) {
        $_SESSION['adv_search'] = $_POST['search'];
        if (!empty($_SESSION['sql'])) {
            unset($_SESSION['sql']);
        }
        $query = "";
        $orderBy = "";
        $orderIn = "";
        
        foreach ($_POST['search'] as $k => $v) {
            if (!empty($v)) {
                $v = stripslashes($v);
		        $v = $conn->real_escape_string($v);

                if ($k !== "order_by" && $k !== "order_in" && $k !== "items" && $k !== "view") {
                	if ($query === "") {
				        $query .= " WHERE ";
			        } else {
				        $query .= " AND ";
			        }
                }
                switch ($k) {
				    case "title":
					    $query .= "title LIKE '%". $v ."%'";
					    break;

				    case "developer":
					    $query .= "developer LIKE '%". $v ."%'";
					    break;

				    case "genre":
					    $query .= "genre = '". $v ."'";
					    break;

				    case "min_price":
					    $query .= "price >= ". $v ."";
					    break;

				    case "max_price":
					    $query .= "price <= ". $v ."";
					    break;

                    case "min_date":
					    $query .= "YEAR(release_date) >= ". $v ."";
					    break;

                    case "max_date":
					    $query .= "YEAR(release_date) <= ". $v ."";
					    break;

                    case "multiplayer":
                        $mp = 0;
                        if ($v === "true") {
                            $mp = 1;
                        }
					    $query .= "multiplayer = ". $mp ."";
					    break;

                    case "order_by":
                        if ($v === "OrderBT") {
                            $orderBy = " ORDER BY title";
                        } else if ($v === "OrderBD") {
                            $orderBy = " ORDER BY developer";
                        } else if ($v === "OrderBG") {
                            $orderBy = " ORDER BY genre";
                        } else if ($v === "OrderBP") {
                            $orderBy = " ORDER BY price";
                        } else {
                            $orderBy = " ORDER BY release_date";
                        }
					    break;

                    case "order_in":
                        if ($v === "ASC") {
                            $orderIn = " ASC";
                        } else {
                            $orderIn = " DESC";
                        }
					    break;

                    case "items":
                        break;

                    case "view":
                        break;
			    }
            }
        }
        $query .= $orderBy;
        $query .= $orderIn;
        $_SESSION['sql'] = "SELECT * FROM Game ". $query;
        //echo $_SESSION['sql'];
        header("Location: advanced_search_page.php?page=1");
    }
    $conn->close();
?>