jQuery(function() {
	jQuery('.hero h2').fitText(2, { minFontSize: '14px', maxFontSize: '53px' });

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
	            jQuery('#header').css('paddingTop', jQuery('#mainNav').outerHeight());
	        } else {
	        	jQuery('#header').css('paddingTop', 0);
	            jQuery('#mainNav').removeClass('fixed');
	        }
        }
        else {
        	if (st > stickyHeaderTopScroll) {
	            jQuery('#mainNav').addClass('show');
	        } else{
	        	jQuery('#header').css('paddingTop', 0);
	            jQuery('#mainNav').removeClass('show fixed');
	        }

        }
        lastScrollTop = st;
    });

});
jQuery('.hero .arrows-next').on('click', function(e){
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