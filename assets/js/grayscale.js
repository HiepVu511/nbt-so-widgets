(function ($, window, document, undefined) {

	'use strict';

	$(function () {
		var revapi;

	    jQuery(document).ready(function() {
	    	// Grayscale hover effect
			jQuery('.nbtsow-grayscale').hover(function() {
			    jQuery(this).addClass('disabled');
			}, function() {
			    jQuery(this).removeClass('disabled');
			});

			// Initialize MagnificPopup class
  			jQuery('.nbtsow-mp').magnificPopup({
		      	type:'image',
		      	gallery: {
		          	enabled:true
		      	}
		    });

			// Accordion Woocommerce Menu
			jQuery('.nbtsow-wc-categories > .cat-item').first().find('a').addClass('active');
			jQuery('.nbtsow-wc-categories > .cat-item > a').on('click', function(e){
				e.preventDefault();

				jQuery('.nbtsow-wc-categories > .cat-item > a').removeClass('active');
				//slide up all the link lists
				jQuery('.nbtsow-wc-categories > .cat-item > .children').slideUp();
				if(!jQuery(this).siblings('.children').is(':visible'))
				{
				  jQuery(this).siblings('.children').slideDown();
				  jQuery(this).addClass('active');
				}
			});
	    });
	});

})(jQuery, window, document);