<?php
function getConn(){
	$mysqli = new mysqli("localhost", "root", "root", "messigedb");

	/* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
	}
	return $mysqli;
}

// $mysqli->query("SELECT * FROM City", MYSQLI_USE_RESULT)

?>