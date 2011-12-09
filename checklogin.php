<?php
    @session_start();
    $email = $_POST['email'];
	$password = $_POST['password'];
	
	include("mysql_connection.php");

	$tablename = "informations";

	$mysql_command = "select id,name from ".$tablename." where email = '".$email."' and password = '".$password."'";

	$result = mysql_query($mysql_command);
	
    
	if ($rs = mysql_fetch_row($result))
	{
		$id = $rs[0];
		$name = $rs[1];
		$_SESSION['admin'] = "OK";
		$_SESSION['id1'] = $id;
		$_SESSION['name1'] = $name;

		if ($_POST['anhao'] != null)
		{
			header("location:allresumes.php");
		}
		else
		{
			header("location:index.php");
		}
	}
    else
	{
		if ($_POST['anhao'] != null)
		{
			header("location:allresumes.php?login=fail&email=$email");
		}
		else
		{
			header("location:index.php?login=fail&email=$email");
		}
	}
	mysql_close();
?>