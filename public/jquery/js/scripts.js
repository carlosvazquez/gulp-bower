(function(){
  "use strict";
  $(document).on('ready', function(){

    var h1 = $('h1');
    h1.append('<strong>mundo</strong> ');
    var styles = {
      'color' : 'red',
      'background-color': 'black',
      'padding' : '1em'
    }
    h1.css(styles);

    var screen_size = function(){
      return $(window).width();
    }

    $(window).resize(function(){
      var screen_size = $(window).width();
      var valuescreen = "desktop";

      if (screen_size < 640) {
        valuescreen = '';
        valuescreen = 'mobile';
      } else if (screen_size > 640 && screen_size < 920 ) {
        valuescreen = '';
        valuescreen = 'tablet';
      } else if (screen_size > 920) {
        valuescreen = '';
        valuescreen = 'desktop';
      }
      h1.removeClass();
      h1.addClass(valuescreen);
    });

    console.log(h1.position());
  });
})();
