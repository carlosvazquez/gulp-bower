// List of features loaded
// Audio
// canvas



// if (Modernizr.canvas){
//    alert("SI canvas");
// }
// else{
//    alert("NO canvas");
// }


/**
 * Author: Heather Corey
 * jQuery Simple Parallax Plugin
 *
 */

// (function($) {
//
//     $.fn.parallax = function(options) {
//
//         var windowHeight = $(window).height();
//
//         // Establish default settings
//         var settings = $.extend({
//             speed        : 0.15
//         }, options);
//
//         // Iterate over each object in collection
//         return this.each( function() {
//
//         	// Save a reference to the element
//         	var $this = $(this);
//
//         	// Set up Scroll Handler
//         	$(document).scroll(function(){
//
//     		        var scrollTop = $(window).scrollTop();
//             	        var offset = $this.offset().top;
//             	        var height = $this.outerHeight();
//
//     		// Check if above or below viewport
// 			if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
// 				return;
// 			}
//
// 			var yBgPosition = Math.round((offset - scrollTop) * settings.speed);
//
//                  // Apply the Y Background Position to Set the Parallax Effect
//     			$this.css('background-position', 'center ' + yBgPosition + 'px');
//
//         	});
//         });
//     }
// }(jQuery));
//
// $('.parallax1,.parallax3').parallax({
// 	speed :	0.15
// });
//
//
// $('.parallax2').parallax({
// 	speed :	0.25
// });

$(document).on('ready', function(){
    var targetOffset = $("#anchor-point").offset().top;

    var $w = $(window).scroll(function(){
        if ( $w.scrollTop() < targetOffset ) {
          $('.navbar-default').addClass("bg-navbar");
          $('svg').removeClass("svg-color");
        } else {
          $('.navbar-default').removeClass("bg-navbar");
          $('svg').addClass("svg-color");
        }
    });

    $("a.confirm").click(function(e) {
      e.preventDefault();
      if(confirm( "Saldrá de este sitio y será dirigido a nuestra tienda.")) {
        window.location.href = 'http://www.playcreativepiano.com/es/store/albums';
      }
    });



    $("a.indice").click(function (e) {
      e.preventDefault();
      $(this).text(function(i, text){
          return text === "Ver índice" ? "Cerrar" : "Ver índice";
      })
    });

    $.validate({
    modules : 'sanitize'
    });


});
