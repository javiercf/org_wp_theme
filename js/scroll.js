if (jQuery(window).width() > 900){
	jQuery(function(){
		jQuery('.content-container, .news-container').jScrollPane();
	});

	jQuery(function(){
		jQuery('.content-container, .news-container').each(
			function(){
				var api = jQuery(this).data('jsp');
				var throttleTimeout;
				jQuery(window).bind('resize', function(){
					if (!throttleTimeout) {
						throttleTimeout = setTimeout(function(){
							api.reinitialise();
							throttleTimeout = null;
						},50);
					}
				});
			})
	});
}