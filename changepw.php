<?php
    @session_start();
	$id = $_SESSION['id1'];
	$lastpw = $_POST['lastpw'];
	$newpw = $_POST['newpw'];
	$cfpw = $_POST['cfpw'];
	$page = $_GET['page'];

	include("mysql_connection.php");

	$mysql_command = "select password from informations where id = '".$id."'";
	$result = mysql_query($mysql_command);
	while($rs = mysql_fetch_row($result))
	{
		$selectpw = $rs[0]; 
	}

	if($lastpw != null)
	{
		if($selectpw == $lastpw)
		{
			if($newpw == null || $cfpw == null)
			{
				if($page == "all")
				{
					header("location:allresumes.php?reason=!val&key=change");
				}
				if($page == "index")
				{
					header("location:index.php?reason=!val&key=change");
				}
			}
			else
			{
				if($newpw == $cfpw)
				{
					$mysql_command = "update informations set password = '".$cfpw."' where id = '".$id."'";
					if($result = mysql_query($mysql_command))
					{
						if($page == "all")
						{
							header("location:allresumes.php?changepw=ola");
						}
						if($page == "index")
						{
							header("location:index.php?changepw=ola");
						}
					}
				}
				else
				{
					if($page == "all")
					{
						header("location:allresumes.php?reason=!same&key=change");
					}
					if($page == "index")
					{
						header("location:index.php?reason=!same&key=change");
					}
				}
			}
		}
		else
		{
			if($page == "all")
			{
				header("location:allresumes.php?reason=!pw&key=change");
			}
			if($page == "index")
			{
				header("location:index.php?reason=!pw&key=change");
			}
		}
	}
	else
	{
		if($page == "index")
		{
			header("location:index.php?reason=!val&key=change");
		}
		elseif($page == "all")
		{
			header("location:allresumes.php?reason=!val&key=change");
		}
	}
	mysql_close();
?>