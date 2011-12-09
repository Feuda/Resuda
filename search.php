<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html">
<title>Searching Results</title>
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

				$keywords = $_POST['keywords'];
				if($keywords == null)
				{
					$keywords = $_GET['keywords'];
				}
				

				if($_SESSION['admin'] !=null)
				{
					if($_GET['changepw'] == "ola")
					{
						echo "<h2><font color='#cc0033'>Password Successfully Changed!</font><br>Resuda,&nbsp;just show you up in seconds.&nbsp;&nbsp;&nbsp;&nbsp;<font size='-1'><a href='index.php'>Go to Index</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='uresume.php'>Go to your resume</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='out.php?page=search&keywords=".$keywords."'>Logout</a></font>&nbsp;&nbsp;&nbsp;&nbsp;</h2>";
					}
					else
					{
						echo "<h2>Resuda,&nbsp;just show you up in seconds.&nbsp;&nbsp;&nbsp;&nbsp;<font size='-1'><a href='index.php'>Go to Index</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='uresume.php'>Go to your resume</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='out.php?page=search&keywords=".$keywords."'>Logout</a></font>&nbsp;&nbsp;&nbsp;&nbsp;</h2>";
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
				echo "<div id='search'><form action='search.php' method='post'><input type='text' name='keywords' size='15' value='".$keywords."'>&nbsp;&nbsp;<span><input type='submit' value='search for'></span></form></div>";
			?>
		</div>
    </div>
    <div id="content">
	<!-- JiaThis Button BEGIN -->
	<script type="text/javascript" src="http://v2.jiathis.com/code/jiathis_r.js?btn=r2.gif" charset="utf-8"></script>
	<!-- JiaThis Button END -->
	    <div id="left">
			<div id="left_one3">
				<a href='feuda.php' style='color:white'><img src='tutu12.jpg' width='100%'></a>
			</div>
			<div id="left_two3">
				<font size='+2'>So</font> many people all around the world, who know you? who will realize you? who can realize you?No matter what job you do,no matter if you have a job,the point is you should make others realize that who you are and what you are able to do, maybe while you are doing, the world is changing for you, you may find a good job or you may do better job, cuz you have made yourself better known.
			    <br><br>
				<font size='+2'>Resuda</font> displays informations of dears,no more decorations,no more sweet words,just for come to the point in seconds.If you are standout, if you are potential, if you are serious enouth in the working time, people can contact you with your left email or phonenumber, then you may get a good job.
			</div>
        </div>
		<div id="bigright">
            <div id="result">
			   <h2 style="color:#0f87ff">Your searching results:</h2>
			   <?php
					if(!preg_match("/^[0-9a-zA-Z]/",$keywords))
					{
						echo "<font color='red' size='+1'>It's not a well done!!!</font>";
						echo "<br><br><br>";
					}
					else
					{
						include("mysql_connection.php");

						$pageNumber = $_GET['pageNumber'];

						if($pageNumber == 0)
						{
							$pageNumber = 1;
						}

						$pageSize = 6;

						$mysql_command1 = "select id,name,focus,birthdate,language,city,job,email,description1,description2 from informations where name like '%".$keywords."%' or focus like '%".$keywords."%' or birthdate like '%".$keywords."%' or language like '%".$keywords."%' or city like '%".$keywords."%' or job like '%".$keywords."%' or email like '%".$keywords."%' or description1 like '%".$keywords."%' or description2 like '%".$keywords."%' limit ".(($pageNumber - 1)*$pageSize).",".$pageSize;

						echo $mysql_command;

						$result = mysql_query($mysql_command1);

						$mysql_command2 = "select id,name,focus,birthdate,language,city,job,email,description1,description2 from informations where name like '%".$keywords."%' or focus like '%".$keywords."%' or birthdate like '%".$keywords."%' or language like '%".$keywords."%' or city like '%".$keywords."%' or job like '%".$keywords."%' or email like '%".$keywords."%' or description1 like '%".$keywords."%' or description2 like '%".$keywords."%'";

						$result2 = mysql_query($mysql_command2);

						$totalNumber = mysql_num_rows($result2);


						if ($totalNumber > 6)
						{
							if ($pageNumber > 1)
							{
								echo "<font size='+0.7'><a href='search.php?pageNumber=".($pageNumber - 1)."&keywords=".$keywords."'>Last Page&nbsp;&nbsp;&nbsp;&nbsp;</a></font>";
							}
							else
							{
								echo "<font size='+0.7'>Last Page&nbsp;&nbsp;</font>";
							}

							if ($pageNumber < $totalNumber / $pageSize)
							{
								echo "<font size='+0.7'><a href='search.php?pageNumber=".($pageNumber + 1)."&keywords=".$keywords."'>Next Page</a></font>";
								echo "<br><br>";
							}
							else
							{
								echo "<font size='+0.7'>Next Page</font>";
								echo "<br><br>";
							}
						}


						while($rs = mysql_fetch_object($result))
						{
							$id = $rs->id;
							$name = $rs->name;
							$focus = $rs->focus;
							$birthdate = $rs->birthdate;
							$language = $rs->language;
							$city = $rs->city;
							$job = $rs->job;
							$email = $rs->email;
							$description1 = $rs->description1;
							$description2 = $rs->description2;

							echo "<br>";
							echo "<h3><a style='color:#0f87ff;text-decoration:underline' href='http://resuda.sinaapp.com/uresume.php?email=".$email."&id=".$id."'>".$name."</a></h3>";
							echo "<div id='each'>";
							foreach($rs as $p)
							{
								echo str_ireplace($keywords,"<font color='#0f87ff'>".$keywords."</font>",$p);
								echo "&nbsp;";
							}
							echo "</div>";
							echo "<br><br>";
						}

						if ($totalNumber > 6)
						{
							if ($pageNumber > 1)
							{
								echo "<font size='+0.7'><a href='search.php?pageNumber=".($pageNumber - 1)."&keywords=".$keywords."'>Last Page&nbsp;&nbsp;&nbsp;&nbsp;</a></font>";
							}
							else
							{
								echo "<font size='+0.7'>Last Page&nbsp;&nbsp;</font>";
							}

							if ($pageNumber < $totalNumber / $pageSize)
							{
								echo "<font size='+0.7'><a href='search.php?pageNumber=".($pageNumber + 1)."&keywords=".$keywords."'>Next Page</a></font>";
								echo "<br><br>";
							}
							else
							{
								echo "<font size='+0.7'>Next Page</font>";
								echo "<br><br>";
							}
						}
					}
			   ?>
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