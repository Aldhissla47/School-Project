<?php
    echo 'Page: ';
    if ($total_pages <= 10) {
        for ($i = 1; $i <= $total_pages; $i++) { 
            echo "<a href='advanced_search_page.php?page=".$i."'>".$i."</a> "; 
        }
    } else {
        echo "<a href='advanced_search_page.php?page=1'>1</a> ";
        if ($_GET["page"] == 1) {
            echo "<a href='advanced_search_page.php?page=2'>2</a> ... ";
        } else if ($_GET["page"] == $total_pages) {
            $temp = $total_pages - 1;
            echo "... <a href='advanced_search_page.php?page=". $temp ."'>". $temp ."</a> ";
        } else {
            if ($_GET["page"]-1 == 1) {
                $temp = $_GET["page"] + 1;
                echo "<a href='advanced_search_page.php?page=". $_GET["page"] ."'>". $_GET["page"] ."</a> ";
                echo "<a href='advanced_search_page.php?page=". $temp ."'>". $temp ."</a> ... ";
            } else if ($_GET["page"]+1 == $total_pages) {
                $temp = $_GET["page"] - 1;
                echo "... <a href='advanced_search_page.php?page=". $temp ."'>". $temp ."</a> ";
                echo "<a href='advanced_search_page.php?page=". $_GET["page"] ."'>". $_GET["page"] ."</a> ";
            } else {
                $temp = $_GET["page"] - 1;
                if ($temp-1 == 1) {
                    echo "<a href='advanced_search_page.php?page=". $temp ."'>". $temp ."</a> ";
                } else {
                    echo "... <a href='advanced_search_page.php?page=". $temp ."'>". $temp ."</a> ";
                }                                   
                echo "<a href='advanced_search_page.php?page=". $_GET["page"] ."'>". $_GET["page"] ."</a> ";
                $temp = $_GET["page"] + 1;
                if ($temp+1 == $total_pages) {
                    echo "<a href='advanced_search_page.php?page=". $temp ."'>". $temp ."</a> ";
                } else {
                    echo "<a href='advanced_search_page.php?page=". $temp ."'>". $temp ."</a> ... ";
                }
            }                                
        }                     
        echo "<a href='advanced_search_page.php?page=". $total_pages ."'>". $total_pages ."</a> ";
    }
?>