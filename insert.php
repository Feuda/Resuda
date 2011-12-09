<?php
   session_start();
   $name = $_POST['name'];
   $gender = $_POST['gender'];
   $focus = $_POST['focus'];
   $month = $_POST['month'];
   $day = $_POST['day'];
   $year = $_POST['year'];
   $birthdate = $month.$_POST['division1'].$day.$_POST['division2'].$year;
   $language = $_POST['language'];
   $city = $_POST['city'];
   $job = $_POST['job'];
   $email = $_POST['email'];
   $mobilephone = $_POST['mobilephone'];
   $password = $_POST['password'];
   $cfpassword = $_POST['cfpassword'];
   $description1 = $_POST['description1'];
   $description2 = $_POST['description2'];



   
   if ($name == null || $gender == null || $focus == null || $month == null || $day == null || $year == null || $language == null || $city == null || $job == null || $email == null || $mobilephone == null || $password == null || $cfpassword == null || $description1 == null || $description2 == null)
   {
	    header("location:generate.php?why=value!&name=$name&gender=$gender&focus=$focus&month=$month&day=$day&year=$year&language=$language&city=$city&job=$job&email=$email&mobilephone=$mobilephone");
   }
   else
   {   
		if (!preg_match("/^([a-zA-Z0-9])/",$name) || !preg_match("/^([a-zA-Z0-9])/",$gender) || !preg_match("/^([a-zA-Z0-9])/",$focus) || !preg_match("/^([a-zA-Z0-9])/",$month) || !preg_match("/^([a-zA-Z0-9])/",$day) || !preg_match("/^([a-zA-Z0-9])/",$year) || !preg_match("/^([a-zA-Z0-9])/",$language) || !preg_match("/^([a-zA-Z0-9])/",$city) || !preg_match("/^([a-zA-Z0-9])/",$job) || !preg_match("/^([a-zA-Z0-9])/",$email) || !preg_match("/^([a-zA-Z0-9])/",$mobilephone) || !preg_match("/^([a-zA-Z0-9])/",$description1) || !preg_match("/^([a-zA-Z0-9])/",$description2))
	    {
		   header("location:http://www.baidu.com/s?wd=%E5%A6%82%E4%BD%95%E5%81%9A%E4%BA%BA%E6%89%8D%E4%B8%8D%E6%97%A0%E8%81%8A%EF%BC%9F&rsv_spt=1&issp=1&rsv_bp=0&ie=utf-8&tn=baiduhome_pg");
	    }
		else
	    {
		   include("mysql_connection.php");

		   $mysql_command = "select id from informations where email = '".$email."'";
		   $result = mysql_query($mysql_command);

		   if($result == false)
		   {
			   header("location:generate.php?why=email!&name=$name&gender=$gender&focus=$focus&month=$month&day=$day&year=$year&language=$language&city=$city&job=$job&email=$email&mobilephone=$mobilephone");
		   }
		   else
		   {
			   if ($password != $cfpassword)
			   {
				   header("location:generate.php?why=pw!&name=$name&gender=$gender&focus=$focus&month=$month&day=$day&year=$year&language=$language&city=$city&job=$job&email=$email&mobilephone=$mobilephone");
			   }
			   else
			   {
				   $tablename = "informations";
		   
				   $mysql_command = "insert into ".$tablename."(name,gender,focus,birthdate,language,city,job,email,mobilephone,password,description1,description2) values('".$name."','".$gender."','".$focus."','".$birthdate."','".$language."','".$city."','".$job."','".$email."','".$mobilephone."','".$password."','".$description1."','".$description2."')";
					

				   if ($result = mysql_query($mysql_command))
				   {
					   $mysql_command = "select id from ".$tablename." where name='".$name."'";
					   $result = mysql_query($mysql_command);
					   $rs = mysql_fetch_row($result);
					   $id = $rs[0];
					   $_SESSION['admin'] = "OK";
					   $_SESSION['id1'] = $id;
					   $_SESSION['name1'] = $name;

					   header("location:uresume.php?do=ok");
				   }
				   else
				   {
					   echo "<h3>Oh,no,something bad,you can <a href='generate.php'>try it agin</a></h3>";
				   }
			   }
		   }
		}
   }
   mysql_close();
?>