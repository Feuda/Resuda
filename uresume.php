<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html">
<?php
    @session_start();
    $id = $_SESSION['id1'];
	$name = $_SESSION['name1'];
    include("header.php");
?>
<title>Resuda,Such Chanice Meeting!</title>
</head>
<body>
<marquee direction="left"><<<<<</marquee>
<div id="main">
<div id="top">
		<div id="top_one">
			<?php
				include("mysql_connection.php");

				$tablename = "informations";

				//Who can give me a job??????

				if ($_SESSION['admin'] == "OK" && $_GET['email'] == null)
				{
					$mysql_command = "select * from ".$tablename." where id = '".$id."'";
				}
				elseif ($_GET['email'] != null)
				{
					$email = $_GET['email'];
					$mysql_command = "select * from ".$tablename." where email = '".$email."'";
				}
				elseif ($_GET['email'] != null && $_GET['id'] != null)
				{
					$mysql_command = "select * from ".$tablename." where email = '".$email."' and id = '".$id."'";
				}
				$result = mysql_query($mysql_command);
				while ($rs = mysql_fetch_object($result))
				{
					$idm = $rs->id;
					$namem = $rs->name;
					$genderm= $rs->gender;
					$focusm = $rs->focus;
					$birthdatem = $rs->birthdate;
					$languagem = $rs->language;
					$citym = $rs->city;
					$jobm = $rs->job;
					$emailm = $rs->email;
					$mobilephonem = $rs->mobilephone;
					$description1m = $rs->description1;
					$description2m = $rs->description2;
				}

				if ($_SESSION['admin'] == "OK" && $_GET['do'] == "ok")
				{
					echo "<h2><font color='#cc0033' size='+3'>Successfully Generations!</font><br>You have done a good job for good job.&nbsp;&nbsp;You can >> <font size='-0.5'><a href='edit.php'>Edit</a>&nbsp;&nbsp;&nbsp;<a href='delete.php'>Delete</a></font></h2>";
				}
				elseif ($_SESSION['admin'] == "OK" && $_GET['do'] == "okok")
				{
					echo "<h2><font color='#cc0033' size='+3'>Successfully Update!</font><br>You have done a good job for better job.&nbsp;&nbsp;You can >> <font size='-0.5'><a href='edit.php'>Edit</a>&nbsp;&nbsp;&nbsp;<a href='delete.php'>Delete</a></font></h2>";
				}
				elseif ($_SESSION['admin'] == "OK" && $_GET['do'] != "ok" && $_SESSION[id1] == $idm)
				{
					echo "<h2>Welcome Back,&nbsp;<span class='name'>".$_SESSION['name1']."</span>&nbsp;,&nbsp;&nbsp;You can >>&nbsp;<font size='-0.5'><a href='edit.php'>Edit</a>&nbsp;&nbsp;&nbsp;<a href='delete.php'>Delete</a>&nbsp;&nbsp;&nbsp;<a href='out.php?page=uresume&email=$emailm&id=$idm'>Logout</a></font></h2>";
				}
				elseif ($_SESSION['admin'] == "OK" && $_GET['do'] != "ok" && $_SESSION[id1] != $idm)
				{
					echo "<h2>Welcome to <span class='name2'>".$namem."</span>'s resume!&nbsp;&nbsp;Such <a href='chanice.php'>Chanice</a> meeting.</h2>";
				}
				elseif ($_SESSION['admin'] != "OK" && $_GET['do'] != "ok")
				{
					echo "<h2>Welcome to <font size='+4'>".$namem."</font>'s resume!&nbsp;&nbsp;Such  <a href='chanice.php'>Chanice</a> meeting.</h2>";
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
		<< <a href="allresumes.php"><font size="small">Back To All Resumes</font></a><br>
		<< <a href="index.php"><font size="small">Back To Index</font></a><br>
	</div>
		<div id="left_two">
		    <?php
				if($_SESSION['admin'] == "OK")
				{
					echo "When an opportunity is neglected, it never comes back to you.";
				}
				else
				{
					echo "Resuda is resume to help you to find job.&nbsp;&nbsp;<a href='generate.php'><font size='small'>Get yours now</font></a>.";
				}
			?>  
		</div>
		<div id="left_three">
		   <font size='+2'>So</font> many people all around the world, who know you? who will realize you? who can realize you?No matter what job you do,no matter if you have a job,the point is you should make others realize that who you are and what you are able to do, maybe while you are doing, the world is changing for you, you may find a good job or you may do better job, cuz you have made yourself better known.
		   <br><br>
		   <font size='+2'>Resuda</font> displays informations of dears,no more decorations,no more sweet words,just for come to the point in seconds.If you are standout, if you are potential, if you are serious enouth in the working time, people can contact you with your left email or phonenumber, then you may get a good job.
		</div>
	</div>
	<?php
	    if ($namem != null && $birthdatem != null || $_GET['do'] == "ok")
		{
	?>
	<div id="center">
		 <div id="center_top">
				<table>
				  <tr bgcolor="#CACACA">
					<th>Name</th>
					<td><?=$namem?></td>
				  </tr>
				  <tr bgcolor="#E6E6E6">
					<th>Gender</th>
					<td><?=$genderm?></td>
				  </tr>
				  <tr bgcolor="#CACACA">
					<th>Focus On</th>
					<td><?=$focusm?></td>
				  </tr>

				  <tr bgcolor="#E6E6E6">
					<th>BirthDate</th>
					<td><?=$birthdatem?></td>
				  </tr>
				  <tr bgcolor="#CACACA">
					<th>Language</th>
					<td><?=$languagem?></td>
				  </tr>
					  <tr bgcolor="#E6E6E6">
					<th>City</th>
					<td><?=$citym?></td>
				  </tr>
					  <tr bgcolor="#CACACA">
					<th>Job</th>
					<td><?=$jobm?></td>
				  </tr>
				  <tr bgcolor="#E6E6E6">
					<th>Email</th>
					<td><?=$emailm?></td>
				  </tr>
				  <tr bgcolor="#CACACA">
					<th>MobilePhone</th>
					<td><?=$mobilephonem?></td>
				  </tr>
				</table>
			</div>
			<div id="center_bottom">
			   <br><br>
			   <div id="box1">
				 <h3><a href="#">My Shining Points</a></h3>
				 <ul>
				 <?php
				   $des1 = preg_split('/[;]/',$description1m,-1);
				   
				   for ($i=0;$i<count($des1)-1;$i++)
			       {
					  echo "<li><a href='#'>".$des1[$i]."</a></li>";
			       }

				   //foreach($des1 as $link)
			       //{
					  //echo "<li><a href='#'>".$link."</a></li>";
				   //}
				 ?>
				 </ul>
			   </div>
			   <div id="box2">
				 <h3><a href="#">My Online Sites</a></h3>
				 <ul>
				 <?php
					 $des2 = preg_split('/;/',$description2m,-1);
				     //print_r($des2);
				     for ($i=0;$i<count($des2)-1;$i++)
			         {
						 $des2child = explode(':',$des2[$i]);
						 echo "<li><a href='#'>".$des2child[0]."</a>:<span><a href='".$des2child[1].":".$des2child[2]."' target='_blank'>".$des2child[1].":".$des2child[2]."</a></span></li>";
					 }
				 ?>
				 </ul>
			   </div>
			   <br><strong>&nbsp;&nbsp;<font color='#707071'>Your resume is here:</font><br>&nbsp;&nbsp;<a href='http://resuda.sinaapp.com/uresume.php?email=<?=$emailm?>&id=<?=$idm?>'>http://resuda.sinaapp.com/uresume.php?email=<?=$emailm?>&id=<?=$idm?></a></strong>
			   <br><br>
			</div>			
    </div>
	<div id="right2">
		<div id="right_one2">
		<img src="ma.jpg" width="100%">
		</div>
		<div id='right_two2'>
		<img src='tutu3.jpg' width='100%'>
		</div>
	</div>
	<?php
	    }
		else
		{
			echo "<img src='bg2.jpg' width='100%'>";
		}
	?>
</div>
</div>
</body>
<?php
    include("footer.php");
?>
</html>