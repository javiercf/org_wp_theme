function nextSlide(){setInterval(function(){var e=jQuery(".hero-slide").first(),r=jQuery(".active").next(".hero-slide");1===r.length?(jQuery(".hero-slide").removeClass("active"),r.addClass("active")):(jQuery(".hero-slide").removeClass("active"),e.addClass("active"))},5e3)}function initialize(){var e=new google.maps.LatLng(4.693087,-74.035059),r={zoom:16,center:e,disableDefaultUI:!0};map=new google.maps.Map(document.getElementById("map-canvas"),r);var a=new google.maps.Marker({position:e,map:map,title:"Organica"})}jQuery(function(){jQuery(".hero h2").fitText(3,{minFontSize:"7px",maxFontSize:"40px"}),jQuery(".hero h3").fitText(3,{minFontSize:"11px",maxFontSize:"14px"}),jQuery(".work-carousel").jcarousel({list:".carousel-wrap",items:".carousel-item",wrap:"circular"}),jQuery(".jcarousel-prev").jcarouselControl({target:"-=1",carousel:jQuery(".work-carousel")}),jQuery(".jcarousel-next").jcarouselControl({target:"+=1",carousel:jQuery(".work-carousel")}),jQuery(".client-carousel").jcarousel({list:".carousel-wrap",items:".carousel-item",wrap:"circular"}),jQuery(".jcarousel-prev-1").jcarouselControl({target:"-=1",carousel:jQuery(".client-carousel")}),jQuery(".jcarousel-next-1").jcarouselControl({target:"+=1",carousel:jQuery(".client-carousel")});var e=jQuery("#mainNav").offset().top+jQuery("#mainNav").outerHeight(),r=jQuery("#mainNav").offset().top,a=0,o=10;jQuery(window).scroll(function(){var t=jQuery(this).scrollTop();Math.abs(a-t)<=o||(t>a?(jQuery("#mainNav").removeClass("show"),t>e&&t>r?(jQuery("#mainNav").addClass("fixed"),jQuery(window).width()>"68em"&&jQuery("#header").css("paddingBottom",jQuery("#mainNav").outerHeight())):(jQuery("#header").css("paddingBottom",0),jQuery("#mainNav").removeClass("fixed"))):t>r?jQuery("#mainNav").addClass("show"):(jQuery("#header").css("paddingBottom",0),jQuery("#mainNav").removeClass("show fixed")),a=t)})}),jQuery(".hero .arrows-next").on("click",function(e){e.preventDefault();var r=jQuery(".hero-slide").first(),a=jQuery(".active").next(".hero-slide");1===a.length?(jQuery(".hero-slide").removeClass("active"),a.addClass("active")):(jQuery(".hero-slide").removeClass("active"),r.addClass("active"))}),jQuery(window).on("load",nextSlide()),jQuery(".hero .arrows-prev").on("click",function(e){e.preventDefault();var r=jQuery(".hero-slide").last(),a=jQuery(".active").prev(".hero-slide");1===a.length?(jQuery(".hero-slide").removeClass("active"),a.addClass("active")):(jQuery(".hero-slide").removeClass("active"),r.addClass("active"))}),jQuery(".item > h1").on("click",function(){jQuery(".item-wrap").slideUp();var e=jQuery(this);jQuery(this).next(".item-wrap").slideDown(600,function(){jQuery("html,body").animate({scrollTop:e.offset().top},400)})}),jQuery(".toggle-menu").on("click",function(){jQuery("#mainNav").slideToggle().toggleClass("mobile-show")}),jQuery(function(){jQuery("a[href*=#]:not([href=#])").click(function(){if(jQuery(".mobile-show").slideToggle().toggleClass(".mobile-show"),location.pathname.replace(/^\//,"")===this.pathname.replace(/^\//,"")&&location.hostname===this.hostname){var e=jQuery(this.hash);if(e=e.length?e:jQuery("[name="+this.hash.slice(1)+"]"),e.length)return jQuery("html,body").animate({scrollTop:e.offset().top},1e3),setTimeout(function(){jQuery("#mainNav").removeClass("show")},1500),!1}})});var map;google.maps.event.addDomListener(window,"load",initialize);