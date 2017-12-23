/*--------------------------------------------------------------------------------*/
/*                        Clearing the Clipboard 
/*   (so even if, the user press Ctrl + C, nothing is copied into the clipboard)
/*--------------------------------------------------------------------------------
    function clearData(){
        window.clipboardData.setData('text','') 
    }
    function cldata(){
        if(clipboardData){
            clipboardData.clearData();
        }
    }
    setInterval("cldata();", 1000);*/



/*----------------------------------*/
/*      Always Start Body From Top If It IS Refresh
/*----------------------------------*/

    $(window).unload(function() {
        $('body').scrollTop(0);
    });


/*----------------------------------*/
/*      Adding classes to lists
/*----------------------------------*/

$(document).ready(function() {      
    $("ul > li:nth-child(even)").addClass("even");
    $("ul > li:nth-child(odd)").addClass("odd");
    $("ul li:first-child").addClass("first-child");
    $("ul li:last-child").addClass("last-child");
}); 

/*----------------------------------*/
/*      Animation Class Add
/*----------------------------------*/
$(document).ready(function() {
  //$('#academics-holder #bubbles-container ul#bubbles > li').addClass('animated bounceInLeft');
}); 


/*----------------------------------*/
/*      Fixed Main NAv
/*----------------------------------*/
$(window).scroll(function () {

    var winWidth = $(window).width();
    if(winWidth>767)
    {
      var headerHeight = $('#header').height();
      if($(this).scrollTop() > headerHeight)
      {
          if (!$('#header').hasClass('fixed'))
          {
              $('#header').stop().addClass('fixed').css('top', '-150px').animate(
                  {
                      'top': '0px'
                  }, 500);
          }
      }
      else
      {
          $('#header').removeClass('fixed');
      }
    }

});

    
/*----------------------------------*/
/*      Department Readmore Text
/*----------------------------------*/
$(document).ready(function() {
    
    var ellipsestext = "...";
    var moretext = "read more";
    var lesstext = "read less";
    $('.overview_readmoretext').each(function() {
        var content = $(this).html();
        
        var showChar = $(this).data('showchar');
        if(showChar == null){ showChar = 650; }
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ ' </span><span class="overview_morecontent"><span>' + h + '</span>  <a href="" class="readmoretext">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".readmoretext").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});


// Flex Slider

$(window).load(function() {
  $('#innerpage-slider').flexslider({
    animation: "fade",
    controlNav: false,
    directionNav: true,
    slideshow: true
  });
  
  $('.home-mobile-slider').flexslider({
    animation: "fade",
    slideshow: true
  });
});
    /*
    -----------------------
    -----------------------
        prettyPhoto
    -----------------------
    -----------------------
    */
    $(document).ready(function(){
      $("a[data-rel^='prettyPhoto']").prettyPhoto({
          deeplinking:false,
          default_width: 600,
          default_height: 400,
          overlay_gallery: false
      });

      $("a[data-rel^='gallerySitemap']").prettyPhoto({
          deeplinking:false,
          default_width: 600,
          default_height: 400,
          overlay_gallery: false
      });

      $("a[data-rel^='vtours']").prettyPhoto({
          deeplinking:false,
          default_width: 660,
          default_height: 500,
          overlay_gallery: false
      });

      $("a[data-rel^='gallery']").prettyPhoto({
          deeplinking:false,
          overlay_gallery: false
      });

      $("a[data-rel^='curriculam']").prettyPhoto({
          deeplinking:false,
          default_width: 690,
          default_height: 475,
          overlay_gallery: false
      });
    });




    /*
    -----------------------
    -----------------------
        Form Validation with jQuery VAlidator
    -----------------------
    -----------------------
    */

  $().ready(function() {
    // validate the comment form when it is submitted
    $("#contact-us").validate();
  });



// Hide Loader
$(window).load(function () {
  //$("#preloader").hide();
  $("#home-slider-preloader").hide();
});

//========================
// BX Slider
//========================
$('.home-slider').bxSlider({
  auto: true,
  pause: 6000,
  mode: 'fade',
  pager: true,
  controls: false
});


    //========================
    // Back To Top
    //========================
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > $(window).height())
        {
            $("#backToTop").addClass('showit');
        }
        else
        {
            $("#backToTop").removeClass('showit');
        }

    });
    $("body, html").on("click", "#backToTop", function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 800);
    });


/*
-----------------------
-----------------------
  Teachers Grid View debouncedresize | Admin.php page
-----------------------
-----------------------
*/
      $(function() {
        Grid.init();
      });


      /*
-----------------------------------------------------
-----------------------------------------------------
 Modify link href | for Without flash virtual tours
-----------------------------------------------------
-----------------------------------------------------
*/
$(document).ready(function() {
    $(window).resize(function() {
        if($(window).width() <= 768) {
            $('a[data-xs-href]').each(function() { 
                $(this).attr('href', $(this).attr('data-xs-href'));
            });
        }
    }).resize(); // This will simulate a resize to trigger the initial run.
});
/*
-----------------------------------------------------
-----------------------------------------------------
 Modify link href | for Without flash virtual tours End
-----------------------------------------------------
-----------------------------------------------------
*/
