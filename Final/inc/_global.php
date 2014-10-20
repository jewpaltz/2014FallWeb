<?php
ini_set('display_errors', 1);

function GetConnection(){
	include __DIR__ . '/_password.php';
	return new mysqli('localhost','plotkinm',$sql_password,'plotkinm_db');
}
