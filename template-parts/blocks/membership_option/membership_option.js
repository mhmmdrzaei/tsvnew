(function($){

    var initializeBlock = function( $block ) {
   //      $block.find('.slides').slick({
   //          dots: false,
   //          infinite: true,
   //          speed: 300,
   //          slidesToShow: 1,
   //          centerMode: true,
   //          variableWidth: true,
   //          adaptiveHeight: true,
			// focusOnSelect: true
   //      });    



    }




    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.membership_option').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=membership_option', initializeBlock );
    }




})(jQuery);


