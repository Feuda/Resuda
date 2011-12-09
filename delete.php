<?php
    session_start();
    $id = $_SESSION['id1'];

	include("mysql_connection.php");

	$mysql_command = "delete from informations where id = ".$id;

	if ($result = mysql_query($mysql_command))
	{
		header("location:out.php?page=index");
	}
?>