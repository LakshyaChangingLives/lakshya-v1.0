function gettoken()
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

var align="left";
if(feed.posts){
for(var i=0;i<3;i++)
{

document.getElementById("timeline"+i+1).innerHTML+="post#:"+feed.posts.data[i].id+"</br></br>";
document.getElementById("timeline"+i+1).innerHTML+="<img src='http://graph.facebook.com/"+feed.posts.data[i].from.id+"/picture' class='fbpic'/>";
document.getElementById("timeline"+i+1).innerHTML+=""+feed.posts.data[i].from.name+"</br></br>";
if(feed.posts.data[i].message){
document.getElementById("timeline"+i+1).innerHTML+=""+feed.posts.data[i].message+"</br></br>";
}
else
{
document.getElementById("timeline"+i+1).innerHTML+=feed.posts.data[i].story+"</br></br>";
document.getElementById("timeline"+i+1).innerHTML+=feed.posts.data[i].caption+"</br></br>";
}



if(feed.posts.data[i].description)
{ 
 document.getElementById("timeline"+i+1).innerHTML+="<div class='fbarticle'><a href='"+feed.posts.data[i].link+"'><img class='fbphoto' src='"+feed.posts.data[i].picture+"' float='left'></img></a><p>"+feed.posts.data[i].description+"</p></div>";
}
else
if(feed.posts.data[i].type =='photo')//timeline pics
{
document.getElementById("timeline"+i+1).innerHTML+="<center><img src='https://graph.facebook.com/"+feed.posts.data[i].object_id+"/picture' height='300px' width='400px' class='fbphoto'></center>";
}


document.getElementById("timeline"+i+1).innerHTML+="</br>";

if(feed.posts.data[i].likes)
{
document.getElementById("timeline"+i+1).innerHTML+="LIKES</br><div class='fblike' id='fblike"+feed.posts.data[i].id+"'></div>";
for(var j=0;j<feed.posts.data[i].likes.data.length;j++)
{
document.getElementById("fblike"+feed.posts.data[i].id).innerHTML+="<img src='http://graph.facebook.com/"+feed.posts.data[i].likes.data[j].id+"/picture'>";
}
}
if(feed.posts.data[i].comments)
{ 
document.getElementById("timeline"+i+1).innerHTML+="</br></br>COMMENTS</br>";
for(var j=0;j<feed.posts.data[i].comments.data.length;j++)
{
document.getElementById("timeline"+i+1).innerHTML+="<div class='fbcomments'><img class='fbphoto' src='http://graph.facebook.com/"+feed.posts.data[i].comments.data[j].from.id+"/picture'>";
//document.getElementById("post"+i).innerHTML+="comments:"+feed.posts.data[i].comments.data[j].from.name+"</br>";
document.getElementById("timeline"+i+1).innerHTML+="<p>"+feed.posts.data[i].comments.data[j].message+"</p></div></br>";
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

}

function paginate(url)
{
document.getElementById("paginate").innerHTML="<img src='images/fbloading.gif' width='300px' height='300px'/>";
getdata(url);
}
