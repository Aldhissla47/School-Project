<?php
	if (!empty($_GET['q'])) {
		$conn = new mysqli("localhost", "root", "", "game_webshop");

		$q = $conn->real_escape_string($_GET['q']);

		$sql = "SELECT title FROM Game WHERE title LIKE '". $q. "%' LIMIT 5";
		$result = $conn->query($sql);

		while ($row = $result->fetch_assoc()) {
			$str = $row['title'];
			preg_replace("/\w*?".preg_quote($q)."\w*/i", "<b>$0</b>", $str);

			echo
			    '<form method="post" action="game_page.php">
				    <input type="hidden" name="hidden_title" value="'. $row['title'] .'">
				    <input type="submit" value="'. $row['title'] .'" class="search_result_button">
			    </form>';
		}
	}
?>