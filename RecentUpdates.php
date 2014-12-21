<!DOCTYPE html>
<html lang="en">
<head>
<title>Lakshya-Recent Updates</title>
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
<script type="text/javascript" src="js/popup.js"></script>
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=147132012148263";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="body1">
	<script>
window.onload = function gettoken(token)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	var token=xmlhttp.responseText;

var access_token= token.split("=");
var url="https://graph.facebook.com/Lakshya.changinglives?fields=posts,cover&&access_token="+access_token[1];
getdata(url);
	


	
  }
  }
xmlhttp.open("GET", "https://graph.facebook.com/oauth/access_token?client_id=147132012148263&&client_secret=850615930070c66f21f343e7b24156f1&&grant_type=client_credentials" ,true);
xmlhttp.send();

}


 function getdata(url)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	var data=xmlhttp.responseText;
	//document.getElementById("content").innerHTML+=data+"</br></br>";	
feed=JSON.parse(xmlhttp.responseText);
if( feed.cover) document.getElementById("headerimage").innerHTML="<img class='fbcover' src='"+feed.cover.source+"' width='870px' height='300px'></br>";
var align="left";
if(feed.posts){
for(var i=0;i<feed.posts.data.length;i++)
{
if((!(feed.posts.data[i].story)&&(feed.posts.data[i].message))||(feed.posts.data[i].caption)||(feed.posts.data[i].caption))
{
if(align=="left") { 
document.getElementById("contentleft").innerHTML+="<div  id='post"+feed.posts.data[i].id+"' class='fbpost'></div></br></br>";
}else 
{
document.getElementById("contentright").innerHTML+="<div  id='post"+feed.posts.data[i].id+"' class='fbpost'></div></br></br>";
}

if(align=="left") align="right"; else align="left"; // start the div



document.getElementById("post"+feed.posts.data[i].id).innerHTML+="post#:"+feed.posts.data[i].id+"</br></br>";
document.getElementById("post"+feed.posts.data[i].id).innerHTML+="<img src='http://graph.facebook.com/"+feed.posts.data[i].from.id+"/picture' class='fbpic'/>";
document.getElementById("post"+feed.posts.data[i].id).innerHTML+=""+feed.posts.data[i].from.name+"</br></br>";
if(feed.posts.data[i].message){
document.getElementById("post"+feed.posts.data[i].id).innerHTML+=""+feed.posts.data[i].message+"</br></br>";
}
else
{
document.getElementById("post"+feed.posts.data[i].id).innerHTML+=feed.posts.data[i].story+"</br></br>";
document.getElementById("post"+feed.posts.data[i].id).innerHTML+=feed.posts.data[i].caption+"</br></br>";
}



if(feed.posts.data[i].description)
{ 
 document.getElementById("post"+feed.posts.data[i].id).innerHTML+="<div class='fbarticle'><a href='"+feed.posts.data[i].link+"'><img class='fbphoto' src='"+feed.posts.data[i].picture+"' float='left'></img></a><p>"+feed.posts.data[i].description+"</p></div>";
}
else
if(feed.posts.data[i].type =='photo')//timeline pics
{
document.getElementById("post"+feed.posts.data[i].id).innerHTML+="<center><img src='https://graph.facebook.com/"+feed.posts.data[i].object_id+"/picture' height='300px' width='400px' class='fbphoto'></center>";
}


document.getElementById("post"+feed.posts.data[i].id).innerHTML+="</br>";

if(feed.posts.data[i].likes)
{
document.getElementById("post"+feed.posts.data[i].id).innerHTML+="LIKES</br><div class='fblike' id='fblike"+feed.posts.data[i].id+"'></div>";
for(var j=0;j<feed.posts.data[i].likes.data.length;j++)
{
document.getElementById("fblike"+feed.posts.data[i].id).innerHTML+="<img src='http://graph.facebook.com/"+feed.posts.data[i].likes.data[j].id+"/picture'>";
}
}
if(feed.posts.data[i].comments)
{ 
document.getElementById("post"+feed.posts.data[i].id).innerHTML+="</br></br>COMMENTS</br>";
for(var j=0;j<feed.posts.data[i].comments.data.length;j++)
{
document.getElementById("post"+feed.posts.data[i].id).innerHTML+="<div class='fbcomments'><img class='fbphoto' src='http://graph.facebook.com/"+feed.posts.data[i].comments.data[j].from.id+"/picture'>";
//document.getElementById("post"+i).innerHTML+="comments:"+feed.posts.data[i].comments.data[j].from.name+"</br>";
document.getElementById("post"+feed.posts.data[i].id).innerHTML+="<p>"+feed.posts.data[i].comments.data[j].message+"</p></div></br>";
}
}

}// end first loop

document.getElementById("paginate").innerHTML="<input type='button' value='more' onclick='paginate(feed.posts.paging.next)'/>";

}

}
else if(feed.data)
{

for( i=0;i<feed.data.length;i++)
{
if((!(feed.data[i].story)&&(feed.data[i].message))||(feed.data[i].caption)||(feed.data[i].caption))
{
if(align=="left"){ 
document.getElementById("contentleft").innerHTML+="<div  id='post"+feed.data[i].id+"' class='fbpost'></div></br></br>";
}else 
{
document.getElementById("contentright").innerHTML+="<div  id='post"+feed.data[i].id+"' class='fbpost'></div></br></br>";
}

if(align=="left") align="right"; else align="left"; // start the div



document.getElementById("post"+feed.data[i].id).innerHTML+="post#:"+i+"</br></br>";
document.getElementById("post"+feed.data[i].id).innerHTML+="<img src='http://graph.facebook.com/"+feed.data[i].from.id+"/picture' class='fbpic'/>";
document.getElementById("post"+feed.data[i].id).innerHTML+=""+feed.data[i].from.name+"</br></br>";
if(feed.data[i].message){
document.getElementById("post"+feed.data[i].id).innerHTML+=""+feed.data[i].message+"</br></br>";
}
else
{
document.getElementById("post"+feed.data[i].id).innerHTML+=feed.data[i].story+"</br></br>";
document.getElementById("post"+feed.data[i].id).innerHTML+=feed.data[i].caption+"</br></br>";
}



if(feed.data[i].description)
{ 
 document.getElementById("post"+feed.data[i].id).innerHTML+="<div class='fbarticle'><a href='"+feed.data[i].link+"'><img class='fbphoto' src='"+feed.data[i].picture+"' float='left'></img></a><p>"+feed.data[i].description+"</p></div>";
}
else
if(feed.data[i].type =='photo')//timeline pics
{
document.getElementById("post"+feed.data[i].id).innerHTML+="<center><img src='https://graph.facebook.com/"+feed.data[i].object_id+"/picture' height='300px' width='400px' class='fbphoto'></center>";
}


document.getElementById("post"+feed.data[i].id).innerHTML+="</br>";

if(feed.data[i].likes)
{
document.getElementById("post"+feed.data[i].id).innerHTML+="LIKES</br><div class='fblike' id='fblike"+feed.data[i].id+"'></div>";
for(var j=0;j<feed.data[i].likes.data.length;j++)
{
document.getElementById("fblike"+feed.data[i].id).innerHTML+="<img src='http://graph.facebook.com/"+feed.data[i].likes.data[j].id+"/picture'>";
}
}
if(feed.data[i].comments)
{ 
document.getElementById("post"+feed.data[i].id).innerHTML+="</br></br>COMMENTS</br>";
for(var j=0;j<feed.data[i].comments.data.length;j++)
{
document.getElementById("post"+feed.data[i].id).innerHTML+="<div class='fbcomments'><img class='fbphoto' src='http://graph.facebook.com/"+feed.data[i].comments.data[j].from.id+"/picture'>";
//document.getElementById("post"+i).innerHTML+="comments:"+feed.posts.data[i].comments.data[j].from.name+"</br>";
document.getElementById("post"+feed.data[i].id).innerHTML+="<p>"+feed.data[i].comments.data[j].message+"</p></div></br>";
}
}

}// end paging loop

document.getElementById("paginate").innerHTML="<input type='button' value='more' onclick='paginate(feed.paging.next);'/>";

}

}

}
}
	
  
  
xmlhttp.open("GET", url ,true);
xmlhttp.send();

}

function paginate(url)
{
document.getElementById("paginate").innerHTML="<img src='images/fbloading.gif' width='300px' height='300px'/>";
getdata(url);
}

</script>

		<div class="main">
<!-- header -->
			<header>
				<div class="wrapper">
					<h1><a href="index.php" id="logo">LAKSHAYA</a></h1>
					<nav>
						<ul id="top_nav">
							<br>
							<div class="images_left" align="center">
		
		<a target="_blank" href ="https://www.facebook.com/Lakshya.changinglives"><img 
src="http://lakshyachanginglives.org/images/social/facebook.png" alt="Facebook"/></a>
		<a target="_blank" href ="http://www.linkedin.com/groups/LakshyaChanging-Lives-4869364/about?
trk=anet_ug_grppro"><img src="http://lakshyachanginglives.org/images/social/linkedin.png" alt="LinkedIn"/></a>
		<a target="_blank" href ="https://twitter.com/Lakshya_Change"><img 
src="http://lakshyachanginglives.org/images/social/twitter.png" alt="Twitter"/></a>
		<a target="_blank" href ="https://plus.google.com/u/0/communities/100838634670801816599"><img 
src="http://lakshyachanginglives.org/images/social/google-plus-black.png" alt="Google Plus"/></a>
		<a target="_blank" href ="http://lakshyachanginglives.blogspot.in/"><img 
src="http://lakshyachanginglives.org/images/social/blogger.png"  alt="Blogger"/></a>
	</div>
						</ul>
					</nav>
					<nav>
						<ul id="menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="Mission.html">Our Mission</a></li>
							<li><a href="Gallery.php">Gallery</a></li>
							<li><a href="Help.html">How to Help</a></li>
							<li><a href="Contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</header><div class="ic"></div>
<!-- / header -->
<!-- content -->
			<article id="content">
			
				<div class="wrapper">
					<div class="box3">
					
						
						
												
						<center><div class='fbcover' id="headerimage"><img src="images/fbloading.gif" width='300px' height='300px'/></div></center>
						</div>
<ul style="display: inline !important">		
<li id="contentleft" class="left1"></li>
<li id="contentright" class="right1"></li>	
</ul>
</br></br>
<center><div id="paginate" style="display:inline"></div></center>

						
						

					</div>
				
			</article>
<!-- / content -->
<!-- footer -->
			<footer>
				<div class="wrapper">
					<a href="index.php" id="footer_logo"><span>LAKSHYA</span></a>
					
				</div>	
				<div class="wrapper">
					<nav>
						<ul id="footer_menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="Mission.html">Our Mission</a></li>
							<li class="active"><a href="Gallery.php">Gallery</a></li>
							<li><a href="Help.html">How to Help</a></li>
							<li class="end"><a href="Contact.html">Contact</a></li>
						</ul>
					</nav>
					<div class="tel"></div>
				</div>
				<div id="footer_text">
					<p><strong>A non profit society</strong>(Registered)</p> 
				
				</div>
			</footer>
<!-- / footer -->
		</div>
	</div>
<script type="text/javascript">Cufon.now(); tabs.init();
function submit(){
document.getElementById('popup').style.display="none";
document.getElementById('ContactForm').submit();}</script>
</body>
</html>