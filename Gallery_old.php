<!DOCTYPE html>
<html lang="en">
<head>
<title>lakshya-gallery</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/lightbox.css" >
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.smooth-scroll.min.js"></script>
<script src="js/lightbox.js"></script>
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
<script>
var picarray=new Array();
var curr;
var next;
var prev;
var ptr;
var depth;
var y=new Array();
window.onload = function a(){gettoken()};

 function gettoken()
{
document.getElementById("albums").style.height="";
document.getElementById("albums").style.width="";
document.getElementById("albums").innerHTML="<center><img src='images/fbloading.gif'></center>";
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
var url="https://graph.facebook.com/Lakshya.changinglives/albums?access_token="+access_token[1];
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
    {	document.getElementById("albums").innerHTML="";
	var data=xmlhttp.responseText;
		var photourl="";
feed=JSON.parse(xmlhttp.responseText);
if(feed.data)
{
document.getElementById("albums").innerHTML+="<br><h4 class='color2' id='gallery'><span>ALBUMS</span></h4>";
for(var i=0;i<feed.data.length;i++)
{

if((feed.data[i].type=="normal")||(feed.data[i].type=="unknown")){

document.getElementById("albums").innerHTML+="<a href='#albums' onclick='getpics("+feed.data[i].id+");' class='normaltip' title='"+feed.data[i].name+"'><img class='fbphoto' src='http://graph.facebook.com/"+feed.data[i].cover_photo+"/picture' width='200' height='150'/></a>";}
}
}

if(feed.photos)
{
document.getElementById("albums").style.height="300px";
document.getElementById("albums").style.width="1300px";
var pics= new Array();

for( var i=0;i<feed.photos.data.length-1;i++)
{
pics[i]="<a href='"+feed.photos.data[i].source+"' rel='lightbox[plants]' title='my caption'id='a"+i+"'class='noclick'><img class='albumpicleft' src='"+feed.photos.data[i].images[4].source+"' id='"+i+"' /></a>"

}


animate(pics);

//document.getElementById("albums").innerHTML+="<a href='"+feed.photos.data[i].source+"' rel='lightbox[plants]' title='my caption'><img src='"+feed.photos.data[i].images[0].source+"' width='100' height='75' alt='Plants: image 1 0f 10 thumbnails' /></a>" ;

}

}
}
  
xmlhttp.open("GET", url ,true);
xmlhttp.send();

}

function getpics(albumid){

var url="https://graph.facebook.com/"+albumid+"?fields=photos";
getdata(url);
}

function animate(pics)
{
var pic_count=0;

y=new Array();
var img;
document.getElementById("albums").innerHTML+="<img src='images/fbloading.gif' class='albumpiccenter' id='albumloading'/>";
document.getElementById("albumloading").style.zIndex=40;
document.getElementById("albums").innerHTML+="<img src='images/prev.png' style='position:absolute; left:200px; top=50px; pointer-events: default; cursor: pointer'' onmousedown='prv();'/>";
for(var j=0;j<pics.length;j++)
{
document.getElementById("albums").innerHTML+=pics[j];
img=document.getElementById(j);
img.style.position="absolute";
img.style.left=250+(j*10)+"px";
img.style.zIndex=j;
y[j]=j*10;

}

ptr=pics.length-1;
depth=pics.length;




document.getElementById(ptr).setAttribute("class","albumpiccenter");
document.getElementById("a"+ptr).setAttribute("class","yesclick");
document.getElementById(ptr).style.zIndex=depth;
document.getElementById("albums").innerHTML+="<img src='images/next.png' style='position:absolute; left:1100px; top=50px; pointer-events: default; cursor: pointer' onmousedown='nxt();'/>";
document.getElementById("albums").innerHTML+="<img src='images/close.png' style='position:absolute; left:1100px; top:800px; pointer-events: default; cursor: pointer'' onmousedown='gettoken();'/>";
document.getElementById("albumloading").style.zIndex=-40;
}

function nxt()
{
if(ptr!=0)
{
document.getElementById(ptr).setAttribute("class","albumpicright");
document.getElementById("a"+ptr).setAttribute("class","noclick");
document.getElementById(ptr).style.left="900px";
document.getElementById(ptr).style.zIndex=depth-ptr;
ptr--;
document.getElementById(ptr).setAttribute("class","albumpiccenter");
document.getElementById("a"+ptr).setAttribute("class","yesclick");
document.getElementById(ptr).style.zIndex=depth+1;
}

}

function prv()
{
if(ptr !=depth-1)
{
document.getElementById(ptr).setAttribute("class","albumpicleftafter");
document.getElementById("a"+ptr).setAttribute("class","noclick");
document.getElementById(ptr).style.left=250+y[ptr]+"px";
document.getElementById(ptr).style.zIndex=ptr;


ptr++;
document.getElementById(ptr).setAttribute("class","albumpiccenter");
document.getElementById("a"+ptr).setAttribute("class","yesclick");
document.getElementById(ptr).style.zIndex=depth+1;
}

}
</script>
	<div class="body1">
		<div class="main">
<!-- header -->
			<header>
				<div class="wrapper">
					<h1><a href="index.php" id="logo">LAKSHAYA</a></h1>
					<nav>
						<ul id="top_nav"><br>
							<!-- <li><a href="index.php"><img src="images/top_icon1.gif" alt=""></a></li>
							<li class="end"><a href="Contact.html"><img src="images/top_icon3.gif" alt=""></a></li> -->
							
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
							<li id="menu_active"><a href="Gallery.php">Gallery</a></li>
							<li><a href="Help.html">How to Help</a></li>
							<li><a href="Contact.html">Contact Us</a></li>
						</ul>
					</nav>
				</div>
			</header><div class="ic"></div>
<!-- / header -->
<!-- content -->
			<article id="content" class="tabs">
				<div class="wrapper">
					<div class="box1">
						<div class="wrapper">
							<section class="col1">
								<h2><strong>O</strong>ur<span> work is inspired through self satisfaction:</span></h2>
								<div class="line1">
									<figure class="left marg_right1"><img src="images/page3_img1.jpg" alt=""></figure>
									<p class="pad_bot1">
										Starting as a small group of students who wanted to make a difference, we have come a long way in helping children by organising events for raising funds. since then, the smile on every child's face gives us the motivation and courage to do more 
									</p>
									<p class="pad_bot2">
										Below are a few captured moments of happiness we could bring to some kids..
									</p>
								</div>
							</section>
						</div>
					</div>	
				</div>
				<div class="wrapper">
				<div class="box2">
				
					<div  id="albums">

					</div>
					</div>
				</div>
			
				<div class="wrapper">
					<div class="box2">
						
						<div class="wrapper tab-content" id="ashraya">
							<section class="col1">
								<h4><span>Ashraya </span>event</h4>
								<p class="pad_bot2"><strong></strong></p>
								<!--<h3 style="clear: both;"></h3>-->
<a href="images/Ashraya/1.JPG" rel="lightbox[plants]" title="my caption"><img src="images/Ashraya/thumbnails/1.JPG" width="100" height="75"alt="Plants: image 1 0f 10 thumbnails" /></a> 


							</section>
						</div>
						
						<div class="wrapper tab-content" id="rock">
							<section class="col1">
								<h4><span>Our</span>Performances</h4>
								<p class="pad_bot2"><strong></strong></p>
								<!--<h3 style="clear: both;"></h3>-->
<a href="images/Performances/1.jpg" rel="lightbox[plants]" title="my caption"><img src="images/Performances/thumbnails/1.jpg" width="100" height="75"alt="Plants: image 1 0f 10 thumbnails" /></a> 

							</section>
						</div>
						
						<div class="wrapper tab-content" id="eye">
							<section class="col1">
								<h4><span>Eye Donation Camp</span>2010</h4>
								<p class="pad_bot2"><strong></strong></p>
<a href="images/eyecamp/1.jpg" rel="lightbox[plants]" title="my caption"><img src="images/eyecamp/thumbnails/1.jpg" width="100" height="75"alt="Plants: image 1 0f 13 thumbnails" /></a> 

							</section>
						</div>
						
						<div class="wrapper tab-content" id="sneha">
							<section class="col1">
								<h4><span>Sneha Orphanage</span>Visits</h4>
								<p class="pad_bot2"><strong></strong></p>
<a href="images/Sneha/1.jpg" rel="lightbox[plants]" title="my caption"><img src="images/Sneha/thumbnails/1.jpg" width="100" height="75"alt="Plants: image 1 0f 27 thumbnails"/></a> 

							</section>
						</div>
						
						<div class="wrapper tab-content" id="vishwas">
							<section class="col1">
								<h4><span>Vishwas Orphanage</span>Visits</h4>
								<p class="pad_bot2"><strong></strong></p>
<a href="images/vishwas/1.jpg" rel="lightbox[plants]" title="my caption"><img src="images/vishwas/thumbnails/1.jpg" width="100" height="75"alt="Plants: image 1 0f 23 thumbnails"/></a> 

							</section>
						</div>
						
					</div>
				</div>
			</article>
<!-- / content -->
<!-- footer -->
			<footer>
				<div class="wrapper">
					<a href="index.php" id="footer_logo"><span>LAKSHYA</span></a>
					<!-- <ul id="icons">
						<li><a href="#" class="normaltip" title="Facebook"><img src="images/icon1.gif" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Twitter"><img src="images/icon2.gif" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Linkedin"><img src="images/icon3.gif" alt=""></a></li>
					</ul> -->
				</div>	
				<div class="wrapper">
					<nav>
						<ul id="footer_menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="Mission.html">Our Mission</a></li>
							<li class="active"><a href="Gallery.php">Gallery</a></li>
							<li><a href="Help.html">How to Help</a></li>
							<li class="end"><a href="Contact.html">Contact Us</a></li>
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
<script type="text/javascript">Cufon.now(); tabs.init();</script>
</body>
</html>