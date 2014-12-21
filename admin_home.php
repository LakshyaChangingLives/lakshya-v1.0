<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin-Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script> 
<script type="text/javascript" src="js/Vegur_700.font.js"></script>
<script type="text/javascript" src="js/Vegur_400.font.js"></script>
<script type="text/javascript" src="js/Vegur_300.font.js"></script>
<script type="text/javascript" src="js/atooltip.jquery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script>
	<style type="text/css">
		.box1 figure {behavior:url(js/PIE.htc)}
	</style>
<![endif]-->
<!--[if lt IE 7]>
		<div style='clear:both;text-align:center;position:relative'>
			<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" alt="" /></a>
		</div>
<![endif]-->
</head>
<body id="page3">
	<div class="body1">
		<div class="main">
<!-- header -->
			<header>
				<div class="wrapper">
					<h1><a href="index.php" id="logo">Lakshya</a></h1>
					
					
				</div>
			</header><div class="ic"></div>
<!-- / header -->
<!-- content -->
			<article id="content" class="tabs">
				<div class="wrapper">
					<div class="box1">
						<div class="wrapper">
							<section class="col1">
								<h2><strong>W</strong>elcome<span> Administrator:</span></h2>
								<div class="line1">
									<figure class="left marg_right1"><img src="images/page3_img1.jpg" alt=""></figure>
									
										<?php $date=date('d/m/Y');echo"<p class='pad_bot1'>$date</p>" ?>
									
									<p class="pad_bot2">
									
									</p>
								</div>
							</section>
						</div>
					</div>	
				</div>
				<div class="wrapper">
					<ul class="nav">
						
						<li><a href="#Doners">Update doners</a></li>
						
						
					</ul>
				</div>
				<div class="wrapper">
					<div class="box2">
						<div class="wrapper tab-content" id="Doners">
							<section class="col1">
									<h4 class="color3"><span>Update</span>Doners</h4>
					<div>
					
					<form id="doners" action="update_doners.php" method="post">
						
							
							<div class="textarea_box"><textarea name="textarea" cols="1000" rows="4" style="overflow-y: scroll;" ><?php $text=file_get_contents('doners.txt'); echo$text;?></textarea></div>
							
						
							
						
					</form>
					<a href="#" class="button2 color3" onClick="document.getElementById('doners').submit()">Update</a>
							<a href="#" class="button2 color3" onClick="document.getElementById('doners').reset()">Clear list</a>
					</div>
							</section>
						</div>
						<div class="wrapper tab-content" id="inbox">
							<section class="col1">
								<h4><span>INBOX MESSAGES</span></h4><form id="contact_form"><input type="button" value="refresh" onclick="window.location.reload()"></form>
<?php
$con = mysql_connect("localhost","lakshyac_aman","lakshya");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("lakshyac_lakshya", $con);
  $qget="select * from contacts order by date asc";
  $result=mysql_query($qget,$con);
  if(!$result) echo" get failed".mysql_error();
  echo"<h4 class='color'>messages sorted by date:</h4>";
  
  while($row=mysql_fetch_row($result))
  {
	echo "<h4 class='color3'><span>$row[0]</span></h4>";
	echo "<p class='pad_bot2'><strong>SENT BY:</strong> $row[1]</p>";
	echo "<p class='pad_bot2'><strong>EMAIL  :</strong> $row[2]</p>";
	echo "<p class='pad_bot2'><strong>WEBSITE :</strong> $row[3]</p>";
	echo "<p class='pad_bot2'><strong>CONTACT:</strong> $row[4]</p>";
	echo "<p class='pad_bot2'> $row[5]</p>";
	$delete=$row[1];
	echo "<form action='delmessage.php' method='post'><input type='HIDDEN' name='name' value='{$delete}'/><input type='submit' value='delete'/></form>";
	echo "<form action='archive_insert.php' method='post'><input type='HIDDEN' name='date' value='{$row[0]}'/><input type='HIDDEN' name='name' value='{$row[1]}'/><input type='HIDDEN' name='email' value='{$row[2]}'/><input type='HIDDEN' name='web' value='{$row[3]}'/><input type='HIDDEN' name='contact' value='{$row[4]}'/><input type='HIDDEN' name='message' value='{$row[5]}'/><input type='submit' value='archive'/></form>";
	}
   mysql_close($con);
   ?>
										</section>
						</div>
						<div class="wrapper tab-content" id="archive">
							<section class="col1">
								<h4><span>Archive</span></h4>
								<?php
$con = mysql_connect("localhost","lakshyac_aman","lakshya");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("lakshyac_lakshya", $con);
  $qget="select * from archive";
  $result=mysql_query($qget,$con);
  if(!$result) echo" get failed".mysql_error();
  echo"<h4 class='color'>messages sorted by date:</h4>";
  
  while($row=mysql_fetch_row($result))
  {
	echo "<h4 class='color3'><span>$row[0]</span></h4>";
	echo "<p class='pad_bot2'><strong>SENT BY:</strong> $row[1]</p>";
	echo "<p class='pad_bot2'><strong>EMAIL  :</strong> $row[2]</p>";
	echo "<p class='pad_bot2'><strong>WEBSITE :</strong> $row[3]</p>";
	echo "<p class='pad_bot2'><strong>CONTACT:</strong> $row[4]</p>";
	echo "<p class='pad_bot2'> $row[5]</p>";
	$delete=$row[1];
	echo "<form action='archive_delete.php' method='post'><input type='HIDDEN' name='name' value='{$delete}'/><input type='submit' value='delete'/></form>";
	
	}
   mysql_close($con);
   ?>
							</section>
						</div>
						<div class="wrapper tab-content" id="comments">
							<section class="col1">
							<div id="contact_form"><input type="button" value="refresh" onclick="window.location.reload()"></form>
<?php
$con = mysql_connect("localhost","lakshyac_aman","lakshya");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("lakshyac_lakshya", $con);
  $qget="select * from Tcomments order by date asc";
  $result=mysql_query($qget,$con);
  if(!$result) echo" get failed".mysql_error();
  echo"<h4 class='color'>messages sorted by date:</h4>";
  
  while($row=mysql_fetch_row($result))
  {
	echo "<h4 class='color3'><span>$row[0]</span></h4>";
	echo "<p class='pad_bot2'><strong>SENT BY:</strong> $row[1]</p>";
	echo "<p class='pad_bot2'><strong>EMAIL  :</strong> $row[2]</p>";
	echo "<p class='pad_bot2'><strong>comment :</strong> $row[3]</p>";
	
	
	$delete=$row[1];
	echo "<form action='delmessagec.php' method='post'><input type='HIDDEN' name='name' value='{$delete}'/><input type='submit' value='delete'/></form>";
	echo "<form action='add_comment.php' method='post'><input type='HIDDEN' name='date' value='{$row[0]}'/><input type='HIDDEN' name='name' value='{$row[1]}'/><input type='HIDDEN' name='email' value='{$row[2]}'/><input type='HIDDEN' name='message' value='{$row[3]}'/><input type='submit' value='Approve'/></form>";
	}
   mysql_close($con);
   ?>
			
							</section>
						</div>
						
						<div class="wrapper tab-content" id="2007">
							<section class="col1">
								<h4><span>September 11</span>2007</h4>
								<p class="pad_bot2"><strong>Ut perspiciatis unde omnis occaecati cupiditate non provident</strong></p>
								<p class="pad_bot1">Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
								<h4 class="color2"><span>November 19</span>2007</h4>
								<p class="pad_bot2"><strong>Harum quidem rerum facilis est et expedita distinctio</strong></p>
								<p class="pad_bot1">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
								<h4 class="color3"><span>December 27</span>2007</h4>
								<p class="pad_bot2"><strong>Perspiciatis unde omnis occaecati cupiditate non provident</strong></p>
								<p class="pad_bot1">Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
								<h4><span>September 11</span>2007</h4>
								<p class="pad_bot2"><strong>Ut perspiciatis unde omnis occaecati cupiditate non provident</strong></p>
								Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
							</section>
						</div>
						<div class="wrapper tab-content" id="2008">
							<section class="col1">
								<h4><span>April 13</span>2008</h4>
								<p class="pad_bot2"><strong>Merspiciatis unde omnis occaecati cupiditate non provident</strong></p>
								<p class="pad_bot1">Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
								<h4 class="color2"><span>May 13</span>2008</h4>
								<p class="pad_bot2"><strong>Natus quidem rerum facilis est et expedita distinctio</strong></p>
								Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
							</section>
						</div>
						<div class="wrapper tab-content" id="2009">
							<section class="col1">
								<h4><span>September 11</span>2009</h4>
								<p class="pad_bot2"><strong>Ut perspiciatis unde omnis occaecati cupiditate non provident</strong></p>
								<p class="pad_bot1">Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
								<h4 class="color2"><span>November 19</span>2009</h4>
								<p class="pad_bot2"><strong>Harum quidem rerum facilis est et expedita distinctio</strong></p>
								<p class="pad_bot1">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
								<h4 class="color3"><span>December 27</span>2009</h4>
								<p class="pad_bot2"><strong>Perspiciatis unde omnis occaecati cupiditate non provident</strong></p>
								Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
							</section>
						</div>
						<div class="wrapper tab-content" id="2010">
							<section class="col1">
								<h4><span>April 13</span>2010</h4>
								<p class="pad_bot2"><strong>Merspiciatis unde omnis occaecati cupiditate non provident</strong></p>
								<p class="pad_bot1">Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.</p>
								<h4 class="color2"><span>May 13</span>2010</h4>
								<p class="pad_bot2"><strong>Natus quidem rerum facilis est et expedita distinctio</strong></p>
								<p class="pad_bot1">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
								<h4 class="color3"><span>June 21</span>2010</h4>
								<p class="pad_bot2"><strong>Ut enim ad minima unde omnis occaecati cupiditate non provident</strong></p>
								Natus error sit voluptatem accusantium doloremque laudantium architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.
							</section>
						</div>
					</div>
				</div>
			</article>
<!-- / content -->
<!-- footer -->
			<footer>
				<div class="wrapper">
					<a href="index.html" id="footer_logo"><span>LAKSHYA</span></a>
					
				</div>	
			
				
			</footer>
<!-- / footer -->
		</div>
	</div>
<script type="text/javascript">Cufon.now(); tabs.init();</script>
</body>
</html>