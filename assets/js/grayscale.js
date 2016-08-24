// Grayscale hover effect
jQuery('.nbtsow-grayscale').hover(function() {
    jQuery(this).addClass('disabled');
}, function() {
    jQuery( this ).removeClass( 'disabled' );
});

jQuery(document).ready(function() {
  jQuery('.nbtsow-mp').magnificPopup({
      type:'image',
      gallery: {
          enabled:true
      }
    });
});