/**
 *
 */

(function ($) {

    /**
     * Site Layout
     */
    wp.customize('dima_layout_site', function (value) {
        value.bind(function (to) {
            if (to == "boxed") {
                var $_body = $('body');
                $_body.removeClass(to);
                $_body.addClass(to);
            } else {
                $('body').removeClass("boxed");
            }
        });
    });

    wp.customize('dima_font_color', function (value) {
        value.bind(function (to) {
            $('p').css('color', to ? to : '');
            $('.dima-navbar').css('background-color', to);
        });
    });

    wp.customize('dima_content_width', function (value) {
        value.bind(function (to) {
            $('.container').css('width', to + "%");
            $('.boxed .all_content').css('width', to + "%");
            $('.boxed .fix_nav.fixed').css('width', to + "%");
        });
    });
    //Top & Bottom Margin (px)
    wp.customize('dima_boxed_margin', function (value) {
        value.bind(function (to) {
            $('.boxed').css({'margin-top': to + "px", 'margin-bottom': to + "px"});
        });
    });
    //Body Background Color
    wp.customize('dima_body_background_color', function (value) {
        value.bind(function (to) {
            $('.boxed').css({'background-color': to});
        });
    });
    //Body Background Pattern
    wp.customize('dima_body_background_pattern', function (value) {
        value.bind(function (to) {
            $('.boxed').css({'background': 'url(' + to + ') repeat fixed'});
        });
    });

    //Body Background Image
    wp.customize('dima_body_background_image', function (value) {
        value.bind(function (to) {
            $('.boxed').css({
                'background': 'url(' + to + ') 0% 0% fixed',
                'background-size': 'cover !important'
            })
            ;
        });
    });

    wp.customize('dima_content_max_width', function (value) {
        value.bind(function (to) {
            $('.container,.boxed .all_content').css('max-width', to + "px");
            $('.boxed .fix_nav.fixed').css('max-width', to + "px");
        });
    });

    // Navbar
    wp.customize('dima_navbar_background_color', function (value) {
        value.bind(function (to) {
            $('.dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav .sub-menu, .dima-navbar-wrap.desk-nav .dima-navbar nav .dima-nav-end .sub-menu, .dima-navbar-wrap.desk-nav .dima-navbar, .dima-navbar-wrap.desk-nav .dima-navbar.dima-navbar-vertical, .dima-navbar-wrap.desk-nav.dima-navbar-top .dima-navbar nav').css('background-color', to);
        });
    });

    // TopBar
    wp.customize('dima_navbar_topbar_background', function (value) {
        value.bind(function (to) {
            $('.dima-topbar').css('background-color', to);
        });
    });
    wp.customize('dima_navbar_topbar_color', function (value) {
        value.bind(function (to) {
            $('.dima-topbar li a, .dima-topbar .card a,.dima-topbar i').css('color', to);
            $('.dima-menu li').css('border-color', to);
        });
    });

})(jQuery);