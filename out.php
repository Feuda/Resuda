<?php
    @session_start();
	$page = $_GET['page'];
	$keywords = $_GET['keywords'];
    session_destroy();
	if ($page == "allresumes")
	{
		header("location:allresumes.php");
	}
	elseif ($page == "index")
	{
		header("location:index.php");
	}
	elseif ($page == "uresume")
	{
		$email = $_GET['email'];
		$id = $_GET['id'];
		header("location:uresume.php?email=$email&id=$id");
	}
	elseif ($page == "search")
	{
		header("location:search.php?keywords=".$keywords);
	}
?>