<?php
include "config.php";

function dbConn(){
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);	
	if (!mysqli_connect_errno()) {
		return $conn;
	}
	else
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
}
function dbClose($conn)
{
	mysqli_close($conn);
}

function dbSelect($table, $column, $criteria="", $clause=""){
	if (empty($table)) 
	{
		return false;
	}
	$sql = "select " . $column . " from " . $table;

	if (!empty($criteria)){
		$sql .= " where " . $criteria;
	}
	if (!empty($clause)){
		$sql .= " " . $clause;
	}
	// $sql = "select * from tb_login";
	// echo $sql;
	$conn = dbConn();
	$row = mysqli_query($conn, $sql);
	if (!$row) {
		echo("Error description: " . mysqli_error($conn));
		return false;
	}
	dbClose($conn);
	return $row;
}	




function dbInsert($table, $data=array()){

	if(empty($table) || empty($data)) 
	{ 
		return false;
	}
	$fields = implode(',',array_keys($data));
	$values = implode("','",array_values($data));
	$sql = "insert into " . $table ." (" .$fields .") values ('" . $values ."')";
	$conn = dbConn();
	$result = mysqli_query($conn,$sql);
	dbClose($conn);
	if (!$result) {
		echo("Error description: " . mysqli_error($conn));
		return false;
	}
	return true;
}	


function dbInsert1($table, $data=array()){

	if(empty($table) || empty($data)) 
	{ 
		return false;
	}
	$fields = implode(',',array_keys($data));
	$values = implode("','",array_values($data));
	$sql = "insert into " . $table ." (" .$fields .") values ('" . $values ."')";
	$conn = dbConn();
	$result = mysqli_query($conn,$sql);
	
	if (!$result) {
		echo("Error description: " . mysqli_error($conn));
		return false;
	}
	$id = mysqli_insert_id($conn);
	dbClose($conn);
	return $id;
	
}	

function dbUpdate($table, $data=array(), $criteria=""){
	if(empty($table) || empty($data) || empty($criteria)) 
	{
			return false;
	}
	// $fields = implode('=,',array_keys($data));
	// $values = implode("','",array_values($data));
	
	// $sql = "update " . $table ." set " . $fields;
	// $sql .= " = " . $values . " where " .$criteria;

	
	$sql = "update " . $table ." set " ;
	foreach ($data as $field => $value)
	{
		$sql .= $field . " = '" . $value . "', ";
	}
	$sql = substr ($sql, 0, strlen($sql) -2);
	$sql .= " where " . $criteria;
	
	$conn = dbConn();
	$result = mysqli_query($conn,$sql);
	dbClose($conn);
	if (!$result) {
		echo("Error description: " . mysqli_error($conn));
		return false;
	}
	return true;
}	

function dbDelete($table, $criteria){
	if(empty($table) || empty($criteria)){
		return false;
	}
	$conn = dbConn();
	$sql = "delete from ". $table . " where " . $criteria;	
	$conn = dbConn();	
	$result = mysqli_query($conn,$sql);
	dbClose($conn);
	if (!$result) {
		echo("Error description: " . mysqli_error($conn));
		return false;
	}
	return true;
}	

function dbCount($table="", $criteria=""){
	if (empty($table))
	{
		return false;
	}
	$sql = "select count(*) from " .$table;
	if(!empty($criteria)){
		$sql .= " where " . $criteria;
	}
	$conn = dbConn();
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	dbClose($conn);
	if (!$result) {
		echo("Error description: " . mysqli_error($conn));
		return false;
	}
	return $row[0];
}
function cleanInput ($input)
{
	$conn = dbConn();
	$result = mysqli_real_escape_string($conn,$input);
	dbClose($conn);
	return $result;
}

?>