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

function getPDOConn(){
//    $mysqli = new mysqli("localhost", "root", "root", "messigedb");

    $db=new PDO("mysql:host=localhost;dbname=messigedb;charset=utf8", "root", "root");
    $db -> exec("set names utf8");
    $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}


// $mysqli->query("SELECT * FROM City", MYSQLI_USE_RESULT)

?>