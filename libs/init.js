    var x, y, flag=true,tmpszer=0,iglo=1,fl=false,
    $main = $('#main'),
    $handler = $('#tiles li'),
    $tiles = $('#tiles');

    (function ($){

      var checking=setInterval(function(){myTimer()},100);
      //var checking2=setTimeout(function(){myTimer2()},3100);
      var mousechecking=setInterval(function(){detectEdge()},100);

      function applyLayout() {

        tmpszer += ( $(document).height() >  2* $(window).height()) ? ( $(window).width() / 3) : 0;
        $('#tiles').imagesLoaded(function() {

          var options = {
            szer: tmpszer,
            autoResize: true,
            container: $main,
            fillEmptySpace: false,
            onLayoutChanged : function() {
              iglo++;
              if(iglo==3)
              {

                setTimeout((function() {
                 $('html, body').animate({

                   scrollTop: ($(document).height() - $(window).height()) /2,
                   scrollLeft: ($(document).width() - $(window).width()) /2
                 }, 1000);
               }), 100);
                
              }
            },
            offset: 0
          };
          if ($handler.wookmarkInstance) {
            $handler.wookmarkInstance.clear();
          }





            // Call the layout function.
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


        $("#loginbt").fancybox({
          'scrolling'   : 'no',
          'closeBtn'   : false,
          'helpers' : {
            title : null            
        },

          beforeLoad   : function() {

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


        $('a.video', $handler).fancybox({
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
  };


  applyLayout();


  filters = $('#filters a');
  function onClickFilter(e) {
    var $item = $(e.currentTarget),
    activeFilters = [],
    filterType = $item.data('filter');

    if (filterType === 'all') {
      filters.removeClass('active');
    } else {
      $item.toggleClass('active');

              // Collect active filter strings
              filters.filter('.active').each(function() {
                activeFilters.push($(this).data('filter'));
              });
            }

            $handler.wookmarkInstance.filter(activeFilters, 'or');
          }

          // Capture filter click events.
          $('#filters').on('click.wookmark-filter', 'a', onClickFilter);

          function detectEdge(){
            if(flag)
            {
              if(x > window.innerWidth-50 || x < 50 || y > window.innerHeight-50  || y < 50)
              {
                var tmpX=0,tmpY=0;
                if(x > window.innerWidth-100)tmpX=50;
                if (x < 100) tmpX=-50;

                if(y > window.innerHeight-100) tmpY=50;
                if (y < 100) {
                  tmpY= -50;
                }
                window.scrollBy(tmpX , tmpY);
              }
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
            }
          }






          // Capture scroll event.
          document.onmousemove = handleMouse;

          document.getElementById('logo').addEventListener('click', function() {

            $("#blur").css("display", "none");
            $("#main").css({
              "-webkit-filter": "blur(0px)", 
              "-moz-filter": "blur(0px)",
              "filter": "blur(0px)",
            });
          }, false);


          function myTimer(){
           if(iglo%2 == 0){
            applyLayout(); 
          }

        }




})(jQuery);     
