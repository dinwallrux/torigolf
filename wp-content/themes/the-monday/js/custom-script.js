jQuery(document).ready(function($){
    
  $('.wp-full-overlay-sidebar-content').prepend('<div class="user_sticky_note"><h3 class="sticky_title">Need help?</h3><span class="sticky_info_row">View documentation: here</span><span class="sticky_info_row">Support forum: here</span><span class="sticky_info_row">View Video tutorials: here</span><span class="sticky_info_row">Email us: support@accesspressthemes.com</span><span class="sticky_info_row">More Details: here</span></div>');
    
    //var waypoint = new Waypoint({ element: document.getElementById(''), handler: function() { $('#myStat').circliful(); } });
    
  //Circle counter  
  $('#circle-counter')
    .fadeOut(0) // immediately hide element
    .waypoint(function(direction) {
      if (direction === 'down') {
        $(this.element).fadeIn()
      }
      else {
        $(this.element).fadeOut()
      }
    }, {
      offset: 'bottom-in-view'
  });
  
  // .cloader function
  $('.skill-loader').each(function () {
     var that = $(this);
     var percent = that.attr("data-percentage");
     var color = that.attr("color");

     that.waypoint({
         handler: function (direction) {
             that.ClassyLoader({
                 percentage: percent,
                 diameter: 70,
                 lineWidth: 11,
                 speed: 30,
                 lineColor: color,
                 remainingLineColor: 'rgba(240, 240, 240, 1)',
             });
         },
         offset: '95%',
         triggerOnce: true
     });
  });

    // Static Counter
    
    $('.counter').counterUp({
        delay: 20,
        time: 2000
    });
    
if ( $( "#slideshow" ).length ) {
	$('#slideshow').superslides({
		play: $('#slideshow').data('speed'),
		animation: 'fade',
		pagination: true,
	});
}

// Portfoilos section

$('#protfolios-gallery-container').imagesLoaded( function() {  
    $('#protfolios-gallery-container').isotope({ 
        filter: '*',
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows',
        animationOptions: {
            duration: 750,
            easing: 'liniar',
            queue: false,
        }
    }); 

    $('.protfolios-filter a').click(function(){ 
        var selector = $(this).attr('data-filter');
		$('.protfolios-filter li').removeClass('active');
		$(this).parent().addClass('active');	        
        $('#protfolios-gallery-container').isotope({ 
            filter: selector,
            layoutMode: 'fitRows',
            animationOptions: {
                duration: 750,
                easing: 'liniar',
                queue: false,
            } 
        }); 
      return false; 
    });
    });
    

    
    
    //Parallax effect
    $(window).on('load', function(){
    $('.cta-style-1').parallax('50%', 0.4, true);
    $('#section-subscribe').parallax('50%', 0.4, true);
    $('#section-blog').parallax('50%', 0.4, true);
    $('.footer-widgets-wrapper').parallax('50%', 0.4, true);
    $('#section-testimonials').parallax('30%', 0.4, true);
    });
    
    //Top up arrow
    $("#scroll-up").hide();
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 1000) {
				$('#scroll-up').fadeIn();
			} else {
				$('#scroll-up').fadeOut();
			}
		});
		$('a#scroll-up').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

  /*Responsive menu*/
  $('.nav-toggle').click(function() {
    $('.mainnav').slideToggle('slow');
    $(this).parent('.home-nav').toggleClass('active');
});  

});