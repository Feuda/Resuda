<?php
    @session_start();
    $lastname = $_POST['namet'];
	$lastgender = $_POST['gendert'];
	$lastfocus = $_POST['focust'];
	$lastmontht = $_POST['montht'];
	$lastdayt = $_POST['dayt'];
	$lastyeart = $_POST['yeart'];
	$lastbirthdate = $lastmontht.$_POST['division1'].$lastdayt.$_POST['division2'].$lastyeart;
	$lastlanguage = $_POST['languaget'];
	$lastcity = $_POST['cityt'];
	$lastjob = $_POST['jobt'];
	$lastmobilephone = $_POST['mobilephonet'];
	$lastdescription1 = $_POST['description1t'];
	$lastdescription2 = $_POST['description2t'];
	include("mysql_connection.php");

	$mysql_command = "update informations set name = '".$lastname."',gender= '".$lastgender."',focus='".$lastfocus."',birthdate='".$lastbirthdate."',language='".$lastlanguage."',city='".$lastcity."',job='".$lastjob."',mobilephone='".$lastmobilephone."',description1='".$lastdescription1."',description2='".$lastdescription2."' where id = '".$_SESSION[id1]."'";

	if ($lastname == null || $lastgender == null || $lastfocus == null || $lastbirthdate == null || $lastlanguage == null || $lastcity == null || $lastjob == null || $lastmobilephone == null || $lastdescription1 == null || $lastdescription2 == null)
	{
		header("location:edit.php?why=!value&name=$lastname&gender=$lastgender&focus=$lastfocus&month=$lastmontht&day=$lastdayt&year=$lastyeart&language=$lastlanguage&city=$lastcity&job=$lastjob&mobilephone=$lastmobilephone");
	}
	else
	{
		if ($result = mysql_query($mysql_command))
		{
			@session_start();
			$_SESSION['name1'] = $lastname;
			header("location:uresume.php?do=okok");
		}
	}
	mysql_close();
?>