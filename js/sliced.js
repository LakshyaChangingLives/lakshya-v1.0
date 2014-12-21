var windowX=720,windowY=500;
;(function( $, window ) {

  var _defaults = {
    x      : 2, // number of tiles in x axis
    y      : 2, // number of tiles in y axis
    random : true, // animate tiles in random order
    speed  : 2000 // time to clear all times
  };

  /**
  * range Get an array of numbers within a range
  * @param min {number} Lowest number in array
  * @param max {number} Highest number in array
  * @param rand {bool} Shuffle array
  * @return {array}
  */
  function range( min, max, rand ) {
    var arr = ( new Array( ++max - min ) )
      .join('.').split('.')
      .map(function( v,i ){ return min + i })
    return rand
      ? arr.map(function( v ) { return [ Math.random(), v ] })
         .sort().map(function( v ) { return v[ 1 ] })
      : arr
  }
  
  
  // Prevent css3 transitions on load
  $('body').addClass('css3-preload');
  $(window).ready(function(){
  
  if(window.innerWidth<=700){$('.sliced').css("width",window.innerWidth+"px");$('.sliced').css("height",window.innerHeight/2+"px");
  $('.slider').css("height",window.innerHeight/2+50+"px");
  windowX=window.innerWidth;
  windowY=window.innerHeight/2;
  $('.sliced').sliced({ x: 4, y:4, speed: 1000 });}
  else{$('.sliced').sliced({ x: 6, y:4, speed: 1000 });}
  
  });
  $( window ).load(function(){ $('body').removeClass('css3-preload');$('.sliced').trigger('animate');
  $('.menu').click(function(){$('#menu').toggle('blind',{easing:'linear'},500);});
  $('#img1').trigger('animate');
  $('.banner').css('display','none');
  $('#ban1').css('display','block');
 
  window.setInterval('slideShow()',1000);

   });

  $.fn.sliced = function( options ) {

    var o = $.extend( {}, _defaults, options );

    return this.each(function() {

      var $container = $(this);

      /*---------------------------------
       * Make the tiles:
       ---------------------------------*/

      var width = $container.width(),
          height = $container.height(),
          $img = $container.find('img'),
          n_tiles = o.x * o.y,
          tiles = [], $tiles;

      for ( var i = 0; i < n_tiles; i++ ) {
        tiles.push('<div class="tile"/>');
      }

      $tiles = $( tiles.join('') );

      // Hide original image and insert tiles in DOM
      $img.hide().after( $tiles );
      

      // Set background
      $tiles.css({
        width: width / o.x,
        height: height / o.y,
        backgroundImage: 'url('+ $img.attr('src') +')',
        backgroundSize: windowX+'px '+windowY+'px'
      });

      // Adjust position
      $tiles.each(function() {
        var pos = $(this).position();
        $(this).css( 'backgroundPosition', -pos.left +'px '+ -pos.top +'px' );
      });

      /*---------------------------------
       * Animate the tiles:
       ---------------------------------*/

      var tilesArr = range( 0, n_tiles, o.random ),
          tileSpeed = o.speed / n_tiles; // time to clear a single tile

      // Public method
      $container.on( 'animate', function() {
console.log("animate triggered");
        tilesArr.forEach(function( tile, i ) {
          setTimeout(function(){
            $tiles.eq( tile ).toggleClass( 'tile-animated' );
          }, i * tileSpeed );
        });

      });

    });

  };

}( jQuery, window ));


var counter=0;
var current=1;

 function slideShow(){

counter++;

if(counter>=8){
 $('#ban'+current).toggle('slide',{ direction: 'right', easing:'linear' },500);
current=current+1;
  $('#ban'+current).toggle('slide',{ direction: 'right', easing:'linear' },500);
$('#img'+current).trigger('animate');

counter=0;

}

if(current==9)
{

current=1;
$('#img2').trigger('animate');
$('#img3').trigger('animate');
$('#img4').trigger('animate');
$('#img5').trigger('animate');
$('#img6').trigger('animate');
$('#img7').trigger('animate');
$('#img8').trigger('animate');
$('.banner').css('display','none');
$('#ban'+current).toggle('slide',{ direction: 'right', easing:'linear' },500);
}


console.log(current);

}