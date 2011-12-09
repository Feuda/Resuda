<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html">
<meta name ="keywords" content="find job,jay chou,feuda,feuda nan,resume,resuda,周杰伦,方文山,简历,找工作"> 
<meta http-equiv="Window-target" content="_top"> 
<meta name="author" content="Feuda Nan"> 
<meta name="description" content="Resuda is resume to help you find job,just show you up in seconds!"> 
<title>Generator Of Your Resume!</title>
<?php
    include("header.php");
?>
</head>
<body>
<marquee direction="left"><<<<<</marquee>
<div id="main">
    <div id="top">
		<div id="top_one">
			<?php
				@session_start();
				if($_SESSION['admin'] !=null)
				{
					if($_GET['changepw'] == "ola")
					{
						echo "<h2><font color='#cc0033'>Password Successfully Changed!</font><br>Welcome back to Resuda.&nbsp;&nbsp;&nbsp;&nbsp;<font size='-1'><a href='uresume.php'>Go to your resume</a> || <a href='allresumes.php'>Go to see others</a> || <a href='out.php?page=index'>Logout</a></font>&nbsp;&nbsp;&nbsp;&nbsp;</h2>";
					}
					else
					{
						echo "<h2>Welcome back to Resuda.&nbsp;&nbsp;&nbsp;&nbsp;<font size='-1'><a href='uresume.php'>Go to your resume</a> || <a href='allresumes.php'>Go to see others</a> || <a href='out.php?page=index'>Logout</a></font>&nbsp;&nbsp;&nbsp;&nbsp;</h2>";
					}
				}
				else
				{
					echo "<h2>Come on! Generate your own style resume!&nbsp;&nbsp;&nbsp;&nbsp;<a href='generate.php'>Let's do it&nbsp;</a><<&nbsp;&nbsp;<font size='-0.5'><a href='allresumes.php'>All resumes</a></font></h2>";
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
    <!-- JiaThis Button BEGIN -->
	<script type="text/javascript" src="http://v2.jiathis.com/code/jiathis_r.js?btn=r2.gif" charset="utf-8"></script>
	<!-- JiaThis Button END -->
	    <div id="left">
			<div id="left_one">
				<?php
				    $key = $_GET['key'];
				    date_default_timezone_set('Asia/Shanghai');
					if($_SESSION['admin'] != null)
					{
						if($key == "change")
						{
							echo "<form action='changepw.php?page=index' method='post'>";
							echo "<table class='change'>";
							echo "<tr><th><font size='-2'>Last Password</font></th><td><div id='input2'><input type='password' name='lastpw'></div></td></tr>";
							echo "<tr><th><font size='-2'>New Password</font></th><td><div id='input2'><input type='password' name='newpw'></div></td></tr>";
							echo "<tr><th><font size='-2'>Confirm Password</font></th><td><div id='input2'><input type='password' name='cfpw'></div></td></tr>";
							echo "<tr><td colspan='2'><div id='button'><input type='submit' value='OK'></div></td></tr>";
							echo "</table>";
							echo "</form>";
							if ($_GET['reason'] == "!val")
							{
								echo "<font color='red'>Input should not be null</a></font>";
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
							echo "<h3><table><tr><th><h3>Hello</h3></th><td class='td'><font color='#cc0033' size='+1'>".$_SESSION['name1']."</font></td></tr></table><br>Today is 20".date('y/m/j')."<br><br></h3><h4>How are you?Be happy or be sad,wanna <a href='writting.php'>write down</a> your mood?</h4><div id='key'><font size='-1'><a href='index.php?key=change'>Change Your Password?</a></font></div>";
						}
					}
					else
					{
						echo "<form action='checklogin.php' method='post'>";
						echo "<table>";
						echo "<tr><th>Email</th><td><div id='input'><input type='text' name='email' value='".$_GET['email']."'></div></td></tr>";
						echo "<tr><th>Password</th><td><div id='input'><input type='password' name='password'></div><input type='hidden' name='anhao'></td></tr>";
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
			<div id="left_two">
			    <font size='+2'>So</font> many people all around the world, who know you? who will realize you? who can realize you?No matter what job you do,no matter if you have a job,the point is you should make others realize that who you are and what you are able to do, maybe while you are doing, the world is changing for you, you may find a good job or you may do better job, cuz you have made yourself better known.
			    <br><br>
				<font size='+2'>In</font> the center of page, you can see a resume.It displays informations of Feuda,no more decorations,no more sweet words,just for come to the point in seconds.If you are standout, if you are potential, if you are serious enouth in the working time, people can contact you with your left email or phonenumber, then you may get a good job.
				<br><br><br>
			</div>
        </div>
		<div id="center">
		   <div id="center_top">
			  <table>
				  <tr bgcolor="#CACACA">
					<th>Name</th>
					<td>Feuda Nan</td>
				  </tr>
					<tr bgcolor="#E6E6E6">
					<th>Gender</th>
					<td>Cool Man</td>
				  </tr>
					<tr bgcolor="#CACACA">
					<th>Focus On</th>
					<td>PHP Programing</td>
				  </tr>

				  <tr bgcolor="#E6E6E6">
					<th>BirthDate</th>
					<td>11/23/1989</td>
				  </tr>
				  <tr bgcolor="#CACACA">
					<th>Language</th>
					<td>Chinese, English</td>
				  </tr>
					  <tr bgcolor="#E6E6E6">
					<th>City</th>
					<td>Beijing</td>
				  </tr>
					  <tr bgcolor="#CACACA">
					<th>Job</th>
					<td>On the training</td>
				  </tr>
				  <tr bgcolor="#E6E6E6">
					<th>Email</th>
					<td>feuda@qq.com</td>
				  </tr>
				  <tr bgcolor="#CACACA"> 
					<th>MobilePhone</th>
					<td>18801132901</td>
				  </tr>
			  </table>
			</div>
			<div id="center_bottom">
			   <br><br>
			   <div id="box1">
				 <h3><a href="#">My Shining Points</a></h3>
				 <ul>
				   <li><a href="#">Passed National Computer Rank Examination Level 2</li>
				   <li><a href="#">Passed CET4 with score 483</li>
				   <li><a href="#">More about me just Google "<span class="f">Feuda</span>" or "<span class="f">Feuda Nan</span>"</a></li>
				 </ul>
			   </div>
			   <div id="box2">
				 <h3><a href="#">My Online Sites</a></h3>
				 <ul>
				   <li><a href="#">Project Picky Blog:</a>&nbsp&nbsp<span class="x"><a href="http://www.feudanan.com">http://www.feudanan.com</a></span></li>
				   <li><a href="#">About.me:</a>&nbsp&nbsp<span class="x"><a href="http://about.me/feuda">http://about.me/feuda</a></span></li>
				   <li><a href="#">Tencent Weibo:</a>&nbsp&nbsp<span class="x"><a href="http://t.qq.com/feudanan">http://t.qq.com/feudanan</a></span></li>
				 </ul>
			   </div>
			   <br><br>
			</div>			
        </div>
		<div id="right">
			<div id="right_one">
				<img src="yu.jpg">
			</div>
			<div id="right_two">
				<h3>I need chance to change my life.</h3><br><br>
				Feuda Nan&nbsp&nbsp<span class="x"><a href="http://www.feudanan.com" target="_blank">http://www.feudanan.com</a></span><br>
				Follow Feuda&nbsp&nbsp<span class="x"><a href="http://t.qq.com/feudanan" target="_blank">http://t.qq.com/feudanan</a></span>
				<br>
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