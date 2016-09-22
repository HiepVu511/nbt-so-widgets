(function ($, window, document, undefined) {

	'use strict';

	$(function () {
		var revapi;

	    jQuery(document).ready(function() {
	    	// Grayscale hover effect
			// jQuery('.nbtsow-grayscale').hover(function() {
			//     jQuery(this).addClass('disabled');
			// }, function() {
			//     jQuery(this).removeClass('disabled');
			// });

			// Initialize MagnificPopup class
  			jQuery('.nbtsow-mp').magnificPopup({
		      	type:'image',
		      	gallery: {
		          	enabled:true
		      	}
		    });

			// Accordion Woocommerce Menu
			// jQuery('.nbtsow-wc-categories > .cat-item').first().find('a').addClass('active');
			jQuery('.nbtsow-wc-categories > .has-children > .fa').on('click', function(){

				jQuery('.nbtsow-wc-categories > .cat-item > a').removeClass('active');
				//slide up all the link lists
				jQuery('.nbtsow-wc-categories > .cat-item > .children').slideUp();
				if(!jQuery(this).siblings('.children').is(':visible'))
				{
				  jQuery(this).siblings('.children').slideDown();
				  jQuery(this).addClass('active');
				}
			});

			jQuery( '.nbtsow-faqs' ).accordion({
				event: 'mouseup',
			});

			function trustView(elem){
				if( jQuery(elem).length ) {
					var bottomOfObject = jQuery(elem).offset().top;
					var bottomOfWindow = jQuery(window).scrollTop() + jQuery(window).height();
	        		if(bottomOfWindow > bottomOfObject){
						return true;
					}
	        	}
			}						
			function addClassGrayScale(addClass, elem){
				if (trustView(elem) === true) {
					jQuery(addClass).addClass('disabled');
				}
			}
			jQuery(window).on('scroll', function() {
				addClassGrayScale('.nbtsow-grayscale-collection .nbtsow-grayscale', '.nbtsow-grayscale-collection .nbtsow-grayscale');
			});

	    });
	});

})(jQuery, window, document);