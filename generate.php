<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html">
<title>Start!</title>
<?php
    include("header.php");
	$why = $_GET['why'];
	$name= $_GET['name'];
	$gender = $_GET['gender'];
	$focus = $_GET['focus'];
	$month = $_GET['month'];
	$day = $_GET['day'];
	$year = $_GET['year'];
	$language = $_GET['language'];
	$city = $_GET['city'];
	$job = $_GET['job'];
	$email = $_GET['email'];
	$mobilephone= $_GET['mobilephone'];
?>
</head>
<body>
<marquee direction="left"><<<<<</marquee>
<div id="main">
<div id="content">
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v2.jiathis.com/code/jiathis_r.js?btn=r2.gif" charset="utf-8"></script>
<!-- JiaThis Button END -->
    <div id="left">
		<div id="left_one">
			<< <a href="index.php"><font size="small">Back To Index</font></a><br><br>
			<font size='+1.5' color='#cc0033'>You can only use English to type in words!</font>
			<br>
	    </div>
		<div id="left_two">
			 <li><font size='+1'>What you focus on and what job you are doing?</font></li><br>If you don't have a job like Feuda Nan, you can fill the 'job' with 'On the searching', but the 'focus on' must not like as 'On the searching' or 'on the developing' except for you don't expect for a job.<br><br>
			 <li><font size='+1'>What is your email and mobilphone?</font></li><br>You should at least leave one to contact others, if you don't wanna your phonenumber be public, you can keep it secret, at the same time you must leave your eamil, as someone stop his finger on your page and then contact you.Just give youself a chance.<br><br>
			 <li><font size='+1'>What is shining points?</font></li><br>Of course your speciality, anything which can show your ability.Notice that every param in the textarea must be divided with semicolon ';'<br><br>
			 <li><font size='+1'>What is onling sites?</font></li><br>The site whitch can show your ability or living.You can show your works here!Notice that not only every param in the area must be divided with semicolon ';' but also the site name and the site address must be divided with colon ':'<br><br>
		</div>
    </div>
	<div id="center">
	  <form action="insert.php" method="post">
	  <div id="center_top">
		  <table>
			  <tr bgcolor="#CACACA">
				<th>Name</th>
				<?php
			
					echo"<td><div id='input'><input type='text' name='name' value='".$name."'></div></td>";
				?>
			  </tr>
				<tr bgcolor="#E6E6E6">
				<th>Gender</th>
				<?php
				    if ($why != null)
					{
						if ($gender == "Male")
						{
							echo "<td><input type='radio' name='gender' value='Male' checked>Male&nbsp;&nbsp;<input type='radio' name='gender' value='Female'>Female</td>";
						}
						else
						{
							echo "<td><input type='radio' name='gender' value='Male'>Male&nbsp;&nbsp;<input type='radio' name='gender' value='Female' checked>Female</td>";
						}
					}
					else
					{
						echo "<td><input type='radio' name='gender' value='Male' checked>Male&nbsp;&nbsp;<input type='radio' name='gender' value='Female'>Female</td>";
					}
				?>
			  </tr>
				<tr bgcolor="#CACACA">
				<th>Focus On</th>
				<td><div id="input"><input type="text" name="focus" value=<?=$focus?>></div></td>
			  </tr>

			  <tr bgcolor="#E6E6E6">
				<?php
				   if ($why != null)
				   {
					   echo "<th>BirthDate</th>
				<td><div id='small'>Month:<input type='text' name='month' size='5' value='".$month."'><input type='hidden' value='/' name='division1'>Day:<input type='text' name='day' size='5' value='".$day."'><input type='hidden' value='/' name='division2'>Year:<input type='text' name='year' size='5' value='".$year."'></div></td>";
				   }
				   else
				   {
					   echo "<th>BirthDate</th>
				<td><div id='small'>Month:<input type='text' name='month' size='5' value='11'><input type='hidden' value='/' name='division1'>Day:<input type='text' name='day' size='5' value='23'><input type='hidden' value='/' name='division2'>Year:<input type='text' name='year' size='5' value='1989'></div></td>";
				   }
				?>
			  </tr>
			  <tr bgcolor="#CACACA">
				<th>Language</th>
				<td><div id="input"><input type="text" name="language" value=<?=$language?>></div></td>
			  </tr>
				  <tr bgcolor="#E6E6E6">
				<th>City</th>
				<td><div id="input"><input type="text" name="city" value=<?=$city?>></div></td>
			  </tr>
				  <tr bgcolor="#CACACA">
				<th>Job</th>
				<td><div id="input"><input type="text" name="job" value=<?=$job?>></div></td>
			  </tr>
			  <tr bgcolor="#E6E6E6">
				<th>Email</th>
				<td><div id="input"><input type="text" name="email" value=<?=$email?>></div></td>
			  </tr>
			  <tr bgcolor="#CACACA">
				<th>MobilePhone</th>
				<?php
				   if ($why != null)
			 	   {
					   echo "<td><div id='input'><input type='text' name='mobilephone' value='".$mobilephone."'></div></td>";
			 	   }
				   else
				   {
					   echo "<td><div id='input'><input type='text' name='mobilephone' value='Secret'></div></td>";
				   }
				?>
			  </tr>
			  <tr bgcolor="#E6E6E6">
				<th>Password</th>
				<td><div id="input"><input type="password" name="password"></div></td>
			  </tr>
			   <tr bgcolor="#CACACA">
				<th>Confirm Password</th>
				<td><div id="input"><input type="password" name="cfpassword"></div></td>
			  </tr>
			  <tr>
			    <td colspan="2">
				   <?php
				      if($why == "value!")
					  {
						  echo "<li><font color='red'>Every input should be of words but not null!</font></li>";
					  }
					  elseif($why == "email!")
					  {
						  echo "<li><font color='red'>Your email is already in used!</font></li>";
					  }
					  elseif($why == "pw!")
					  {
						  echo "<li><font color='red'>Your password are not successfully confirmed!</font></li>";
					  }
				   ?>
			    </td>
			  </tr>
		  </table>
	  </div>
	  <div id="center_bottom">
		  <br><br>
		  <div id="box1">
			 <h3><a href="#">My Shining Points</a></h3>
			 <div id="input"><textarea name="description1" rows="10" cols="50">eg.:shining point one;  shinig point two;</textarea></div>
		  </div>
		  <div id="box2">
			 <h3><a href="#">My Online Sites</a></h3>
			 <div id="input"><textarea name="description2" rows="10" cols="50">eg.:site name one: site address one;  site name two: site address two;</textarea></div>
		  </div>
		 <br>
		 <div id="button2"><input type="submit" value="Generate Resume"></div>
		 <br>
	  </div>
	  </form>
    </div>
    <div id="right">
		<div id="gright_one">
		   <img src="zhou3.jpg" width="100%">
	    </div>
	</div>
</div>
</div>
</body>
<br></br>
<?php
    include("footer.php");
?>
</html>