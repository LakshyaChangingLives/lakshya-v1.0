
// <!--
var pWidth = 0;
var speed = 5; // change scroll speed with this value
/**
 * Get a collection of all of the objects of a particular type, can pass in an object that they should be collected from.
 */
function getElementsByTagNames(list,obj) {
  if (!obj) var obj = document;
  var tagNames = list.split(',');
  var resultArray = new Array();
  for (var i=0;i<tagNames.length;i++) {
    var tags = obj.getElementsByTagName(tagNames[i]);
    for (var j=0;j<tags.length;j++) {
      resultArray.push(tags[j]);
    };
  };
  var testNode = resultArray[0];
  if(!testNode){
    return [];
  };
  if(testNode.sourceIndex){
    resultArray.sort(function(a,b){
      return a.sourceIndex - b.sourceIndex;
    });
  }else if(testNode.compareDocumentPosition){
    resultArray.sort(function(a,b){
      return 3 - (a.compareDocumentPosition(b) & 6);
    });
  };
  return resultArray;
}
 
/**
 * Initialize the marquee, and start the marquee by calling the marquee function.
 */
function init(){
  var div = document.getElementById("marquee_replacement");
  div.style.overflow = 'hidden';
  
  var ps = getElementsByTagNames('p',div);
  for(var j=0;j<ps.length;j++){
    pWidth += ps[j].offsetWidth;
  }
 
  var startdiv = document.getElementById("start");
  startdiv.style.width = pWidth+'px';
  div.scrollLeft = 0;
  setTimeout("scrollFromBottom()",50);
}
 
var go = 0;
var timeout = '';
 
/**
 * This is where the scroll action happens.
 * Recursive method until stopped.
 */
function scrollFromSide(){
  clearTimeout(timeout);
  var el = document.getElementById("marquee_replacement");
  if(el.scrollLeft >= pWidth-1000){
    el.scrollLeft = 0;
  };
  el.scrollLeft = el.scrollLeft+speed;
  if(go == 0){
    timeout = setTimeout("scrollFromSide()",50);
  };
}
 
/**
 * Set the stop variable to be true (will stop the marquee at the next pass).
 */
function stop(){
  go = 1;
  timeout = '';
}
 
/**
 * Set the stop variable to be false and call the marquee function.
 */
function startit(){
  go = 0;
  scrollFromSide();
}
// -->
