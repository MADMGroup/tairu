

var $tiles = $('#tiles'),
x,
y,
flag=true,
$handler = $('li', $tiles),
$main = $('#main'),
$window = $(window),
$document = $(document);
options = {
  autoResize: true,
  container: $main,
  szer:0,
  offset: 0
};

(function ($){

  $("document").ready(function() {

    $('html, body').animate({
      scrollTop: $(document).height()/2,
      scrollLeft: $(document).width()/2
    }, 1000);

  });

      /**
       * Reinitializes the wookmark handler after all images have loaded
       */
       function applyLayout() {
       	$tiles.imagesLoaded(function() {
          // Destroy the old handler
          if ($handler.wookmarkInstance) {
          	$handler.wookmarkInstance.clear();
          }

          // Create a new layout handler.
          $handler = $('li', $tiles);
          $handler.wookmark(options);


	  // Init lightbox


	  $('a', $handler).fancybox({
      openEffect  : 'none',
      closeEffect : 'none',
      nextEffect  : 'none',
      prevEffect  : 'none',

      beforeLoad		: function() {

        $("#main").css({
         "-webkit-filter": "blur(2px)", 
         "-moz-filter": "blur(2px)",
         "filter": "blur(2px)",
       });

        flag=false;

      },

      afterClose		: function() {
        $("#main").css({
         "-webkit-filter": "blur(0px)", 
         "-moz-filter": "blur(0px)",
         "filter": "blur(0px)",
       });
        flag=true;
      }
    });


   $('a.Video', $handler).fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    nextEffect  : 'none',
    prevEffect  : 'none',
    arrows:false,
    helpers : {
     media: true
   },
   beforeLoad    : function() {

    $("#main").css({
      "-webkit-filter": "blur(2px)", 
      "-moz-filter": "blur(2px)",
      "filter": "blur(2px)",
    });

    flag=false;

  },

  afterClose    : function() {
    $("#main").css({
      "-webkit-filter": "blur(0px)", 
      "-moz-filter": "blur(0px)",
      "filter": "blur(0px)",
    });
    flag=true;
  }
});




 });
}



      /**
       * When scrolled all the way to the bottom, add more tiles
       */
       function onScroll() {
        // Check if we're within 100 pixels of the bottom edge of the broser window.
        var winHeight = window.innerHeight ? window.innerHeight : $window.height(),
			winWidth = window.innerWidth ? window.innerWidth : $window.width(),		// iphone fix
			closeToRight = ($window.scrollLeft() + winWidth > $document.width() - 10),
			closeToLeft = ($window.scrollLeft() < 10 ),
			closeToBottom = ($window.scrollTop() + winHeight > $document.height() - 500);
			closeToTop = ($window.scrollTop() < 10);

			if (closeToBottom) {
          // Get the first then items from the grid, clone them, and add them to the bottom of the grid
          var $items = $('li', $tiles),
          $firstTen = $items.slice(0, 26);
          $tiles.append($firstTen.clone());

          applyLayout();
        }

        if (closeToTop) {
          // Get the first then items from the grid, clone them, and add them to the bottom of the grid
          var $items = $('li', $tiles),
          $firstTen = $items.slice(0, 26);
          $tiles.append($firstTen.clone());

          applyLayout();
        }

        if (closeToRight) {
          // Get the first then items from the grid, clone them, and add them to the bottom of the grid
          var $items = $('li', $tiles),
          $firstFive = $items.slice(0, 26);
          $tiles.append($firstFive.clone());
          options['szer'] = options['szer']+300;
          applyLayout();
        }


        if (closeToLeft) {
          // Get the first then items from the grid, clone them, and add them to the bottom of the grid
          var $items = $('li', $tiles),
          $firstFive = $items.slice(0, 26);
          $tiles.append($firstFive.clone());
          options['szer'] = options['szer']+300;
          applyLayout();
        }
      };

      function detectEdge(){
        if(x > window.innerWidth-100 || x < 100 || y > window.innerHeight-100  || y < 100)
        {
          var tmpX=0,tmpY=0;
          if(x > window.innerWidth-100)tmpX=25;
          if (x < 100) tmpX=-25;



          if(y > window.innerHeight-100) tmpY=25;
          if (y < 100) tmpY= -25;


          window.scrollBy(tmpX , tmpY);
        }
      }


      function handleMouse(e) {
        if(flag)
        {

          if (x && y) {
            window.scrollBy(e.clientX - x , e.clientY - y);

          }

          x = e.clientX;
          y = e.clientY;
          detectEdge();
        }
      }




      // Call the layout function for the first time
      applyLayout();

      // Capture scroll event.
      $window.bind('scroll.wookmark', onScroll);
      document.onmousemove = handleMouse;

      document.getElementById('logo').addEventListener('click', function() {
        $("#blur").css("display", "none");
        $("#main").css({
          "-webkit-filter": "blur(0px)", 
          "-moz-filter": "blur(0px)",
          "filter": "blur(0px)",
        });
      }, false);






    })(jQuery);