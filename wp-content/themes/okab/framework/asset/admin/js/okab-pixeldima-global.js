/**
 *
 */

(function ($) {

       window.DimaAdminConfirm = function(type, message, callback) {

        $('body').append('<div class="pixeldima-admin-popup is-visible" role="alert">' +
            '<div class="pixeldima-admin-popup-inner">' +
            '<div class="pixeldima-admin-popup-container">' +
            '<p>' + message + '</p>' +
            '<ul class="pixeldima-admin-buttons">' +
            '<li><a class="yes ' + type + '" href="#0">Yes</a></li>' +
            '<li><a class="no" href="#0">No</a></li>' +
            '</ul>' +
            '<a href="#0" class="pixeldima-admin-popup-close img-replace"></a>' +
            '</div>' +
            '</div>' +
            '</div>');

        $('.pixeldima-admin-buttons a').on('click', function(e) {

            $('.pixeldima-admin-popup').remove();

            if ( $(this).hasClass('yes') ) {
                callback();
            }

        });

        //close popup
        $('.pixeldima-admin-popup').on('click', function(event){
            if( $(event.target).is('.pixeldima-admin-popup-close') || $(event.target).is('.pixeldima-admin-popup') ) {
                event.preventDefault();
                $(this).removeClass('is-visible');
            }
        });

        //close popup when clicking the esc keyboard button
        $(document).keyup(function(event){
            if(event.which=='27'){
                $('.pixeldima-admin-popup').removeClass('is-visible');
            }
        });


    };
    
})(jQuery);