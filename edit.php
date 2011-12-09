<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html">
<title>Just For Better</title>
<?php
    @session_start();
    include("header.php");

    $why = $_GET['why'];
	$namee= $_GET['name'];
	$gendere = $_GET['gender'];
	$focuse = $_GET['focus'];
	$monthe = $_GET['month'];
	$daye = $_GET['day'];
	$yeare = $_GET['year'];
	$languagee = $_GET['language'];
	$citye = $_GET['city'];
	$jobe = $_GET['job'];
	$mobilephonee= $_GET['mobilephone'];

	include("mysql_connection.php");

	$mysql_command = "select * from informations where id = '".$_SESSION['id1']."'";

	$result = mysql_query($mysql_command);
	if ($rs = mysql_fetch_object($result))
	{
		$namet = $rs->name;
		$gendert = $rs->gender;
		$focust = $rs->focus;
		$birthdate = $rs->birthdate;

		$explode = explode("/",$birthdate);
		$montht = $explode[0];
		$dayt = $explode[1];
		$yeart = $explode[2];

		$languaget = $rs->language;
		$cityt = $rs->city;
		$jobt = $rs->job;
		$mobilephonet = $rs->mobilephone;
		$description1t = $rs->description1;
		$description2t = $rs->description2;
	}
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
			<< <a href="index.php"><font size="small">Back To Index</font></a>
			<h2>@Lovely Tips</h2>
			<h3>Before start,I must tell you that you can only use English to type in words.</h3>
			<br>
			<br>
			<li>What is Name?</li>
			It's your firstname and your lastname,ok,you can also only left your firstname.
			<li>What is Gender?</li>
			It's jsut show your physical characteristics.If you are gay,you still keep the choice male,else if you are lesbian,just keep it female.
			<li>What is Focus On?</li>
			Your main work or study.For example,Jay is still a singer,though he also plays role in movie,so he should type in Popular Music.
			<li>What is BirthDate?</li>
			The date you came to the wonderful world.Notice the formate: birthmonth/birthday/birthyear.
	    </div>
    </div>
	<div id="center">
	  <form action="update.php" method="post">
	  <div id="center_top">
		  <table>
			  <tr bgcolor="#CACACA">
				<th>Name</th>
				<?php
				    if ($why!= null)
					{
						echo"<td><div id='input'><input type='text' name='namet' value='".$namee."'></div></td>";
					}
					else
					{
						echo "<td><div id='input'><input type='text' name='namet' value='".$namet."'></div></td>";
					}
				?>
			  </tr>
				<tr bgcolor="#E6E6E6">
				<th>Gender</th>
		        <?php
				   if ($why != null)
				   {
					   if ($gendere == "Male")
					   {
						   echo "<td><input type='radio' name='gendert' value='Male' checked>Male&nbsp;&nbsp;<input type='radio' name='gendert' value='Female'>Female</td>";
					   }
					   else
					   {
						   echo "<td><input type='radio' name='gendert' value='Male'>Male&nbsp;&nbsp;<input type='radio' name='gendert' value='Female' checked>Female</td>";
					   }
				   }
				   else
				   {
					   if ($gendert == "Male")
					   {
						   echo "<td><input type='radio' name='gendert' value='Male' checked>Male&nbsp;&nbsp;<input type='radio' name='gendert' value='Female'>Female</td>";
					   }
					   else
					   {
						   echo "<td><input type='radio' name='gendert' value='Male'>Male&nbsp;&nbsp;<input type='radio' name='gendert' value='Female' checked>Female</td>";
					   }
				   }
				?>
				<tr bgcolor="#CACACA">
				<th>Focus On</th>
				<td><div id="input"><input type="text" name="focust" value=<?=$focust?>></div></td>
			  </tr>

			  <tr bgcolor="#E6E6E6">
				<?php
				   if ($why != null)
				   {
					   echo "<th>BirthDate</th>
				<td><div id='small'>Month:<input type='text' name='montht' size='5' value='".$monthe."'><input type='hidden' value='/' name='division1'>Day:<input type='text' name='dayt' size='5' value='".$daye."'><input type='hidden' value='/' name='division2'>Year:<input type='text' name='yeart' size='5' value='".$yeare."'></div></td>";
				   }
				   else
				   {
					   echo "<th>BirthDate</th>
				<td><div id='small'>Month:<input type='text' name='montht' size='5' value='".$montht."'><input type='hidden' value='/' name='division1'>Day:<input type='text' name='dayt' size='5' value='".$dayt."'><input type='hidden' value='/' name='division2'>Year:<input type='text' name='yeart' size='5' value='".$yeart."'></div></td>";
				   }
				?>
			  </tr>
			  <tr bgcolor="#CACACA">
				<th>Language</th>
				<?php
				    if ($why!= null)
					{
						echo"<td><div id='input'><input type='text' name='languaget' value='".$languagee."'</div></td>";
					}
					else
					{
						echo "<td><div id='input'><input type='text' name='languaget' value='".$languaget."'</div></td>";
					}
				?>
			  </tr>
				  <tr bgcolor="#E6E6E6">
				<th>City</th>
				<?php
				    if ($why!= null)
					{
						echo"<td><div id='input'><input type='text' name='cityt' value='".$citye."'</div></td>";
					}
					else
					{
						echo "<td><div id='input'><input type='text' name='cityt' value='".$cityt."'</div></td>";
					}
				?>
			  </tr>
				  <tr bgcolor="#CACACA">
				<th>Job</th>
				<?php
				    if ($why!= null)
					{
						echo "<td><div id='input'><input type='text' name='jobt' value='".$jobe."'</div></td>";
					}
					else
					{
						echo "<td><div id='input'><input type='text' name='jobt' value='".$jobt."'</div></td>";
					}
				?>
			  </tr>
			  <tr bgcolor="#CACACA">
				<th>MobilePhone</th>
				<?php
				   if ($why!= null)
			 	   {
					   echo "<td><div id='input'><input type='text' name='mobilephonet' value='".$mobilephonee."'></div></td>";
			 	   }
				   else
				   {
					   echo "<td><div id='input'><input type='text' name='mobilephonet' value='".$mobilephonet."'></div></td>";
				   }
				?>
			  </tr>
			  <tr>
			    <td colspan="2">
				   <?php
				      if($why == "!value")
					  {
						  echo "<li><font color='red'>Every input should be of words but not null!</font></li>";
					  }
					  if($why == "!pw")
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
			 <div id="input"><textarea name="description1t" rows="10" cols="50"><?=$description1t?></textarea></div>
		  </div>
		  <div id="box2">
			 <h3><a href="#">My Online Sites</a></h3>
			 <div id="input"><textarea name="description2t" rows="10" cols="50"><?=$description2t?></textarea></div>
		  </div>
		 <br>
		 <div id="button2"><input type="submit" value="OK"></div>
		 <br>
	  </div>
	  </form>
    </div>
    <div id="right">
		<div id="gright_one">
		   <img src="face.jpg" width="100%">
	    </div>
	</div>
</div>
</div>
</body>
<br></br>
<?php
    include("footer.php");
	mysql_close();
?>
</html>