<?php
ini_set('display_errors', 1);

function GetConnection(){
	include __DIR__ . '/_password.php';
	return new mysqli('localhost','plotkinm',$sql_password,'plotkinm_db');
}

function FetchAll($sql){
		$ret = array();
		$conn = GetConnection();
		$results = $conn->query($sql);
		
		$error = $conn->error;
		if($error){
			echo $error;
		}else{
			while ($rs = $results->fetch_assoc()) {
				$ret[] = $rs;
			}			
		}
		
		return $ret;	
}
