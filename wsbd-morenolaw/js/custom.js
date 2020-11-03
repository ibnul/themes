// Sub menu smooth scroll


jQuery(document).ready(function () {



	// handle links with @href started with '#' only



	jQuery(document).on('click', 'a[href*="/#section-"]', function(e) {



		// target element id



		var link = jQuery(this).attr('href');

		var id = link.substring(link.lastIndexOf("/") + 1, link.length);



		// target element



		var $id = jQuery(id);



		if ($id.size() === 0) {



			return;



		}



		// prevent standard hash navigation (avoid blinking in IE)



		e.preventDefault();







		// top position relative to the document



		var pos = eval( jQuery(id).offset().top - 45 );







		// animated top scrolling

		jQuery('body, html').animate({scrollTop: pos});

		

		return false;



	});

	jQuery(document).on('click', 'a[href*="/#sec-"]', function(e) {



		// target element id



		var link = jQuery(this).attr('href');

		var id = link.substring(link.lastIndexOf("/") + 1, link.length);



		// target element



		var $id = jQuery(id);



		if ($id.size() === 0) {



			return;



		}



		// prevent standard hash navigation (avoid blinking in IE)



		e.preventDefault();







		// top position relative to the document



		var pos = eval( jQuery(id).offset().top - 90 );







		// animated top scrolling

		jQuery('body, html').animate({scrollTop: pos});

		

		return false;



	});
	
	
	//add tiny when scrollTop() > 0
	if( jQuery(window).scrollTop() > 0 ) {

		jQuery('#header').addClass('tiny');

	}
	
	
	// toggle tiny when scroll
	jQuery(window).on("scroll touchmove", function () {

		jQuery('#header').toggleClass('tiny', jQuery(document).scrollTop() > 0);

	});
	
	jQuery('.se-posts a').click(function(){
		jQuery('.publications-posts a').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('#se-posts').css('display', 'block');
		jQuery('#publications-posts').css('display', 'none');
		return false;
	});
	
	jQuery('.publications-posts a').click(function(){
		jQuery('.se-posts a').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('#publications-posts').css('display', 'block');
		jQuery('#se-posts').css('display', 'none');
		return false;
	});
	


});

