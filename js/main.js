jQuery(function() {
	jQuery('.hero h2').fitText(3, { minFontSize: '7px', maxFontSize: '40px' });

	jQuery('.hero h3').fitText(3, { minFontSize: '11px', maxFontSize: '14px' });

	jQuery('.work-carousel').jcarousel({
		list: '.carousel-wrap',
		items: '.carousel-item',
		wrap: 'circular'
	});
	jQuery('.jcarousel-prev').jcarouselControl({
        target: '-=1',
        carousel: jQuery('.work-carousel')
    });

    jQuery('.jcarousel-next').jcarouselControl({
        target: '+=1',
        carousel: jQuery('.work-carousel')
    });
    jQuery('.client-carousel').jcarousel({
		list: '.carousel-wrap',
		items: '.carousel-item',
		wrap: 'circular'
	});
	jQuery('.jcarousel-prev-1').jcarouselControl({
        target: '-=1',
        carousel: jQuery('.client-carousel')
    });

    jQuery('.jcarousel-next-1').jcarouselControl({
        target: '+=1',
        carousel: jQuery('.client-carousel')
    });
    // STicky Header

    // Check the initial Poistion of the Sticky Header
    var stickyHeaderTop = jQuery('#mainNav').offset().top + jQuery('#mainNav').outerHeight();
    var stickyHeaderTopScroll = jQuery('#mainNav').offset().top;

    var lastScrollTop = 0, delta = 10;

    jQuery(window).scroll(function () {
    	var st = jQuery(this).scrollTop();
    	if (Math.abs(lastScrollTop - st) <= delta){
    		return;
    	}
        if (st > lastScrollTop){
        	jQuery('#mainNav').removeClass('show');
        	if (st > stickyHeaderTop && st > stickyHeaderTopScroll) {
	            jQuery('#mainNav').addClass('fixed');
	            if(jQuery(window).width() > '68em'){
	            	jQuery('#header').css('paddingBottom', jQuery('#mainNav').outerHeight());
	            }
	        } else {
	        	jQuery('#header').css('paddingBottom', 0);
	            jQuery('#mainNav').removeClass('fixed');
	        }
        }
        else {
        	if (st > stickyHeaderTopScroll) {
	            jQuery('#mainNav').addClass('show');
	        } else{
	        	jQuery('#header').css('paddingBottom', 0);
	            jQuery('#mainNav').removeClass('show fixed');
	        }

        }
        lastScrollTop = st;
    });
});
function nextSlide(){
	setInterval(function(){
		var first = jQuery('.hero-slide').first();
		var next = jQuery('.active').next('.hero-slide');
		if(next.length === 1){
			jQuery('.hero-slide').removeClass('active');
			next.addClass('active');
		} else{
			jQuery('.hero-slide').removeClass('active');
			first.addClass('active');
		}
	}, 5000);
}

jQuery('.hero .arrows-next').on('click', function (e){
	e.preventDefault();
	var first = jQuery('.hero-slide').first();
	var next = jQuery('.active').next('.hero-slide');
	if(next.length === 1){
		jQuery('.hero-slide').removeClass('active');
		next.addClass('active');
	} else{
		jQuery('.hero-slide').removeClass('active');
		first.addClass('active');
	}
});

jQuery(window).on('load', nextSlide());


jQuery('.hero .arrows-prev').on('click', function(e){
	e.preventDefault();
	var last = jQuery('.hero-slide').last();
	var prev = jQuery('.active').prev('.hero-slide');
	if(prev.length === 1){
		jQuery('.hero-slide').removeClass('active');
		prev.addClass('active');
	} else{
		jQuery('.hero-slide').removeClass('active');
		last.addClass('active');
	}
});

jQuery('.item > h1').on('click', function(){
	//if(jQuery(window) < '40.5em'){
		jQuery('.item-wrap').slideUp();
		var clicked = jQuery(this);
		jQuery(this).next('.item-wrap').slideDown(600, function(){
			jQuery('html,body').animate({
	          scrollTop: clicked.offset().top
	        }, 400);
		});
	//}
});

jQuery('.toggle-menu').on('click', function(){
	jQuery('#mainNav').slideToggle().toggleClass('mobile-show');
});

jQuery(function() {
  jQuery('a[href*=#]:not([href=#])').click(function() {
  	jQuery('.mobile-show').slideToggle().toggleClass('.mobile-show');
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        setTimeout(function(){
        	jQuery('#mainNav').removeClass('show');
        }, 1500);
        return false;
      }
    }
  });
});

var map;
function initialize() {
	var myLatlng = new google.maps.LatLng(4.693087, -74.035059);
  var mapOptions = {
    zoom: 16,
    center: myLatlng,
    disableDefaultUI: true
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Organica'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);