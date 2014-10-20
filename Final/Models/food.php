<?php
	include_once __DIR__ . '/../inc/_all.php';
/**
 * 
 */
class Food {
	
	public static function Get($id=null)
	{
		$ret = array();
		$sql = "	SELECT * FROM 2014Fall_Food_Eaten
		";
		$conn = GetConnection();
		$results = $conn->query($sql);
		
		while ($rs = $results->fetch_assoc()) {
			$ret[] = $rs;
		}
		
		return $ret;
	}
}

	