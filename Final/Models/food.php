<?php
	include_once __DIR__ . '/../inc/_all.php';
/**
 * 
 */
class Food {
	
	public static function Get($id=null)
	{
		$sql = "	SELECT * FROM 2014Fall_Food_Eaten
		";
		return FetchAll($sql);
	}
}

	