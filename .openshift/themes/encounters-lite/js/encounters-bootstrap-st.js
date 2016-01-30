// lets add some bootstrap styling to WordPress elements starting with the tables

jQuery(function($){
	//$( 'table' ).addClass( 'table' );
	$( '#submit' ).addClass( 'btn btn-primary btn-small' );
	$( '#wp-calendar' ).addClass( 'table table-striped table-bordered' );
	
});

// lets add an active class to our toggle accordion
jQuery(function($) {

    $('.accordion').on('show', function (e) {
         $(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
    });
    
    $('.accordion').on('hide', function (e) {
        $(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
    });
        
});
