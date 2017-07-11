/*global window */
(function ($) {
    "use strict";
    /*-------------VARIABLES--------------*/
    var w = $(window),
        doc = $(document),
        windowWidth = w.width(),
        windowHeight = w.height();
    /*Modernizr Var*/
    /*!------------VARIABLES--------------*/
    window.PIXELDIMA = {};
    doc.ready(function (PIXELDIMA) {
        this.PIXELDIMA = PIXELDIMA || {}; //Main Namespace
        /**
         * [ Main Module (Okab) ]
         */
        function isRtl() {
            var attr_dir = $("body").attr("dir");
            return (attr_dir == "rtl");
        }

        PIXELDIMA.MENU = function () {
            /**
             * Our Private Functions
             **/
            var inline_cenet_logo = function () {
                var dima_header_style_split = $('.dima-navbar-center-active');
                if (dima_header_style_split.length) {
                    dima_header_menu_split();
                }
            };
            var menu_image = function () {

                $('.dima-navbar-wrap.desk-nav').find('.dima-mega-menu').each(function () {
                    var bigmenu = $(this),
                        custom_image = bigmenu.find('.dima-custom-item-image');
                    if (custom_image.length > 0) {
                        var image_item = custom_image.find('img').attr('src'),
                            height = custom_image.find('img').attr('height'),
                            background_position = (isRtl()) ? "left bottom" : "right bottom";
                        //------------------------------------------------
                        custom_image.next('.sub-menu').css({
                            'height': height + 'px',
                            'background-image': 'url(' + image_item + ')',
                            'background-repeat': 'no-repeat',
                            'background-position': background_position
                        });
                        custom_image.remove();
                    }
                });
            };
            var vertical_menu_content = function () {
                $('.vertical-menu').find('.dima-main').each(function () {
                    var content = $(this);
                    var footerH = $('.dima-footer').outerHeight();
                    content.css({
                        'min-height': (windowHeight - footerH) + 'px'
                    });

                });
            };
            var dima_header_menu_split = function () {
                var $dima_top_menu = $('.dima-navbar-center .dima-navbar');
                if ($dima_top_menu.length) {
                    //noinspection JSValidateTypes
                    var dima_nav = $('.desk-nav.dima-navbar-center nav'),
                        logo_container = $('.desk-nav.dima-navbar-center .logo-cenetr > .logo'),
                        logo_container_two = $('.desk-nav.dima-navbar-center .logo'),
                        dima_top_navigation_li_size = dima_nav.children('ul').children('li').size(),
                        dima_top_navigation_li_break_index = Math.round(dima_top_navigation_li_size / 2) - 1;
                    if (windowWidth > 989 && !logo_container.length && logo_container_two.length == 1) {
                        $('<li class="logo-cenetr"></li>').insertAfter($dima_top_menu.find('nav > ul >li:nth(' + dima_top_navigation_li_break_index + ')'));
                        logo_container_two.appendTo($dima_top_menu.find('.logo-cenetr'));
                    }
                    if (windowWidth <= 989 && logo_container.length == 1) {
                        logo_container_two.prependTo('.dima-navbar >.container');
                        $('.logo-cenetr').remove();
                    }
                }
            };
            /**
             * Setup Function
             */
            var init = function () {
                inline_cenet_logo();
                menu_image();
                vertical_menu_content();
            };
            /**
             * [Our Public Function Here]
             */
            var build = {
                init: init
            };
            return build;
        }();
        // handle the layout reinitialization on window resize
        PIXELDIMA.DOCONRESIZE = function () {
            var nav = function () {
                windowWidth = w.width();
            };
            var init = function () {
                nav();
            };
            var READY = {
                init: init
            };
            return READY;
        }();
        // runs callback functions
        PIXELDIMA.OKABREADY = function () {
            var init = function () {
                PIXELDIMA.MENU.init();
                w.resize(function () {
                    //PIXELDIMA.DOCONRESIZE.init();
                });

                var $target = $('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)')
                    .find('qty');
                if ($target && $target.prop('type') != 'date') {
                    //buttons
                    $('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)')
                        .addClass('buttons_added').append('<input type="button" value="+" class="plus" />')
                        .prepend('<input type="button" value="-" class="minus" />');

                    $('input.qty:not(.product-quantity input.qty)').each(
                        function () {
                            var min = parseFloat($(this).attr('min'));
                            if (min && min > 0 && parseFloat($(this).val()) < min) {
                                $(this).val(min);
                            }
                        }
                    );
                    $(document).on(
                        'click', '.plus, .minus', function () {
                            var $qty = $(this).closest('.quantity').find('.qty'),
                                Val = parseFloat($qty.val()),
                                max = parseFloat($qty.attr('max')),
                                min = parseFloat($qty.attr('min')),
                                step = $qty.attr('step');

                            if (!Val || Val === '' || Val === 'NaN') Val = 0;
                            if (max === '' || max === 'NaN') max = '';
                            if (min === '' || min === 'NaN') min = 0;
                            if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

                            if ($(this).is('.plus')) {
                                if (max && ( max == Val || Val > max )) {
                                    $qty.val(max);
                                } else {
                                    $qty.val(Val + parseFloat(step));
                                }
                            } else {
                                if (min && ( min == Val || Val < min )) {
                                    $qty.val(min);
                                } else if (Val > 0) {
                                    $qty.val(Val - parseFloat(step));
                                }
                            }

                            $qty.trigger('change');
                        }
                    );
                }
            };
            var READY = {
                init: init
            };
            return READY;
        }();
        /**
         * Call Our Setups Functions
         */
        PIXELDIMA.OKABREADY.init();
    });
}(jQuery));