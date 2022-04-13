<?php
    session_start();
    if (isset($_SESSION['adv_search'])) {
        unset($_SESSION['adv_search']);
    }
    if (isset($_SESSION['sql'])) {
        unset($_SESSION['sql']);
    }
    header("Location: advanced_search_page.php");
?>