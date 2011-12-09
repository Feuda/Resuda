<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html">
<title>All Resumes</title>
<?php
    include("header.php");
?>
</head>
<body>
<marquee direction="left"><<<<<</marquee>
<div id="main">
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v2.jiathis.com/code/jiathis_r.js?btn=r2.gif" charset="utf-8"></script>
<!-- JiaThis Button END -->
    <div id="top">
		<div id="top_one">
			<?php
			    @session_start();
				if($_SESSION['admin'] !=null)
				{
					if($_GET['changepw'] == "ola")
					{
						echo "<h2><font color='#cc0033'>Password Successfully Changed!</font><br>Resuda,&nbsp;just show you up in seconds.&nbsp;&nbsp;&nbsp;&nbsp;<font size='-1'><a href='index.php'>Go to Index</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='uresume.php'>Go to your resume</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='out.php?page=allresumes'>Logout</a></font>&nbsp;&nbsp;&nbsp;&nbsp;</h2>";
					}
					else
					{
						echo "<h2>Resuda,&nbsp;just show you up in seconds.&nbsp;&nbsp;&nbsp;&nbsp;<font size='-1'><a href='index.php'>Go to Index</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='uresume.php'>Go to your resume</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='out.php?page=allresumes'>Logout</a></font>&nbsp;&nbsp;&nbsp;&nbsp;</h2>";
					}
				}
				else
				{
					echo "<h2><a href='index.php'>Resuda</a>,&nbsp;just show you up in seconds.&nbsp;&nbsp;&nbsp;&nbsp;<font size='-0.4'><a href='generate.php'>Get yours now!</a></font></h2>";
				}
			?>
        </div>
		<div id="top_two">
			<?php
			    echo "<div id='search'><form action='search.php' method='post'><input type='text' name='keywords' size='15'>&nbsp;&nbsp;<span><input type='submit' value='search for'></span></form></div>";
			?>
		</div>
    </div>
    <div id="content">
	    <div id="left">
			<div id="left_one2">
				<?php
				    date_default_timezone_set('Asia/Shanghai');
					if($_SESSION['admin'] != null)
					{
						if($_GET['key'] == "change")
						{
							echo "<form action='changepw.php?page=all' method='post'>";
							echo "<table class='change'>";
							echo "<tr><th><font size='-2'>Last Password</font></th><td><div id='input2'><input type='password' name='lastpw'></div></td></tr>";
							echo "<tr><th><font size='-2'>New Password</font></th><td><div id='input2'><input type='password' name='newpw'></div></td></tr>";
							echo "<tr><th><font size='-2'>Confirm Password</font></th><td><div id='input2'><input type='password' name='cfpw'></div></td></tr>";
							echo "<tr><td colspan='2'><div id='button'><input type='submit' value='OK'></div></td></tr>";
							echo "</table>";
							echo "</form>";
							if ($_GET['reason'] == "!val")
							{
								echo "<font color='red'>Input should not be null!</a></font>";
							}
							elseif ($_GET['reason'] == "!pw")
							{
								echo "<font color='red'>Your password is wrong!</a></font>";
							}
							elseif ($_GET['reason'] == "!same")
							{
								echo "<font color='red'>Your new password is not confirmed!</a></font>";
							}
						}
						else
						{
							echo "<h3><table><tr><th><h3>Hello</h3></th><td class='td'><font color='#cc0033' size='+1'>".$_SESSION['name1']."</font></td></tr></table><br>Today is 20".date('y/m/j')."<br><br></h3><h4>How are you?Be happy or be sad,wanna <a href='writting.php'>write down</a> your mood?</h4><div id='key'><font size='-1'><a href='allresumes.php?key=change'>Change Your Password?</a></font></div>";
						}
					}
					else
					{
						echo "<form action='checklogin.php' method='post'>";
						echo "<table>";
						echo "<tr><th>Email</th><td><div id='input'><input type='text' name='email' value='".$_GET['email']."'></div></td></tr>";
						echo "<tr><th>Password</th><td><div id='input'><input type='password' name='password'></div><input type='hidden' value='toall' name='anhao'></td></tr>";
						echo "<tr><td colspan='2'><div id='button'><input type='submit' value='Login'></div></td></tr>";
						echo "</table>";
						echo "</form>";
						if ($_GET['login'] == "fail")
						{
						    echo "<font color='red'>You Are Not Allow!</a></font>";
						}
					}
				?>
			</div>
			<div id="left_two3">
				<font size='+2'>So</font> many people all around the world, who know you? who will realize you? who can realize you?No matter what job you do,no matter if you have a job,the point is you should make others realize that who you are and what you are able to do, maybe while you are doing, the world is changing for you, you may find a good job or you may do better job, cuz you have made yourself better known.
			    <br><br>
				<font size='+2'>Resuda</font> displays informations of dears,no more decorations,no more sweet words,just for come to the point in seconds.If you are standout, if you are potential, if you are serious enouth in the working time, people can contact you with your left email or phonenumber, then you may get a good job.
			</div>
        </div>
		<div id="center">
			<div id="center_all">
			   <?php
			       include("mysql_connection.php");

				   $pageSize = 4;
				   $pageNumber = $_GET['pageNumber'];

				   if ($pageNumber == null)
				   {
					   $pageNumber = 1;
				   }

				   $rs = mysql_fetch_row(mysql_query("select count(*) from informations"));

				   $totalCount = $rs[0];

				   $mysql_command = "select * from informations limit ".(($pageNumber - 1)*$pageSize).",".$pageSize;
				   $result = mysql_query($mysql_command);
				   echo "<br><br>";
				   if($totalCount > $pageSize)
				   {
					   if ($pageNumber > 1)
					   {
						   echo "<span class='tags'><a href='allresumes.php?pageNumber=".($pageNumber - 1)."'>Last Page</a>&nbsp;&nbsp;&nbsp;&nbsp;";
					   }
					   else
					   {
						   echo "<span class='tags'>Last Page&nbsp;&nbsp;&nbsp;&nbsp;";
					   }

					   if ($pageNumber < $totalCount / $pageSize)
					   {
						   echo "<a href='allresumes.php?pageNumber=".($pageNumber + 1)."'>Next Page</a></span>";
					   }
					   else
					   {
						   echo "Next Page</span>";
					   }
				   }
				   while ($rs = mysql_fetch_object($result))
				   {
					   $names = $rs->name;
					   $genders = $rs->gender;
					   $focuss = $rs->focus;
					   $jobs = $rs->job;
					   $emails = $rs->email;
					   $ids = $rs->id;
			   ?>
					   <br><br>
					   <div id="box">
						 <h3><a href="#"><?=$names?></a></h3>
						 <table>
						 <tr bgcolor="#CACACA"><td>Gender</td><td><?=$genders?></td></tr>
						 <tr bgcolor="#E6E6E6"><td>Focus On</td><td><?=$focuss?></td></tr>
						 <tr bgcolor="#CACACA"><td>Job</td><td><?=$jobs?></td></tr>
						 <tr><td colspan="2" style="text-align:right">>><a href="uresume.php?email=<?=$emails?>&id=<?=$ids?>">More</a></td></tr>
						 </table>
					   </div>
			   <?php
				   }
			       echo "<br><br>";
			       if($totalCount > $pageSize)
				   {
					   if ($pageNumber > 1)
					   {
						   echo "<span class='tags'><a href='allresumes.php?pageNumber=".($pageNumber - 1)."'>Last Page</a>&nbsp;&nbsp;&nbsp;&nbsp;";
					   }
					   else
					   {
						   echo "<span class='tags'>Last Page&nbsp;&nbsp;&nbsp;&nbsp;";
					   }

					   if ($pageNumber < $totalCount / $pageSize)
					   {
						   echo "<a href='allresumes.php?pageNumber=".($pageNumber + 1)."'>Next Page</a></span>";
					   }
					   else
					   {
						   echo "Next Page</span>";
					   }
				   }
			       echo "<br><br>";
				   mysql_close();
			   ?>
			</div>			
        </div>
		<div id="right2">
			<div id="right_one2">
				<img src="bajun.jpg" width="100%">
			</div>
			<div id="right_two2">
				<h3>I need a chance to change the world.</h3><br><br>
				Feuda Nan&nbsp&nbsp<span class="x"><a href="http://www.feudanan.com" target="_blank">http://www.feudanan.com</a></span><br>
				Follow Feuda&nbsp&nbsp<span class="x"><a href="http://t.qq.com/feudanan" target="_blank">http://t.qq.com/feudanan</a></span>
			</div>
		</div>
    </div>
</div>
</body>
<br><br>
<?php
    include("footer.php");
?>
</html>