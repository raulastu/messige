<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

	include_once $_SERVER['DOCUMENT_ROOT'].'/php/db.php';
	function storeMessage($message){
		// echo 'ola q ase link';
		$con = getConn();
		// look if it already exists TBD
		$arr = array('message'=>$message);
		store_array($arr,'messages',$con);
		$lastInsertedId = mysqli_insert_id($con);
		include_once $_SERVER['DOCUMENT_ROOT'].'/php/utils/Utils.php';
		$base62 = dec2string($lastInsertedId, 62);
		// echo $lastInsertedId;
		$con->real_query("UPDATE messages set short = '".$base62."' where message_id=".$lastInsertedId);
		return $base62;
	}

	function getMessageByShort($short){
		$con = getConn();
		include_once $_SERVER['DOCUMENT_ROOT'].'/php/utils/Utils.php';
		$id = string2dec($short, 62);
		// $con->query("SELECT short FROM messages where messages_id=".$id);

		if($stmt = $con->prepare("SELECT message FROM messages where message_id=?")){
			$stmt-> bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($result);
			$stmt->fetch();
			if ($result) {
			    return $result;
			}			
		}
		return "";
	}


	function store_array (&$data, $table, $mysqli){
		$cols = implode(',', array_keys($data));
		foreach (array_values($data) as $value)
		{
		  isset($vals) ? $vals .= ',' : $vals = '';
		  $vals .= '\''.$mysqli->real_escape_string($value).'\'';
		}
		$mysqli->real_query('INSERT INTO '.$table.' ('.$cols.') VALUES ('.$vals.')');
	}

	

?>