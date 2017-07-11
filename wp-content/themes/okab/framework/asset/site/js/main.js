/*global window */
(function ($) {
    "use strict";

    /*-------------VARIABLES--------------*/
    var w = $(window),
        doc = $(document),
        windowWidth = w.width(),
        nav = $(".dima-nav").outerHeight(),
        windowHeight = w.height(),
        isTouch = Modernizr.touch,
        isTransitions = Modernizr.csstransitions;
    /*!------------VARIABLES--------------*/
    window.PIXELDIMA = {};

    doc.ready(function (PIXELDIMA) {

        this.PIXELDIMA = PIXELDIMA || {}; //Main Namespace
        /**
         * [ Main Module (Okab) ]
         */
        PIXELDIMA.NAV = function () {
            /**
             * Our Private Functions
             **/

            var myMenu = function () {
                submenu();
                mobileNav();
                fixNav();
                MobilesubMenu();
                searchBox();
                onePage();
            };

            var submenu = function () {
                var desk_nav_menu = $('.desk-nav ul.dima-nav,.desk-nav ul.dima-nav-end');
                var desk_childe_li = 'li.menu-item-has-children';
                //var desk_childe_ul = 'li.menu-item-has-children ul';
                var dima_hover = 'dima-hover';
                var dima_action = 'dima-action';
                var timer = {};

                function ShowSubMenu(element) {
                    element.addClass(dima_hover).siblings(desk_childe_li).removeClass(dima_hover);
                    if (Modernizr && Modernizr.touchevents) {
                        element.siblings(desk_childe_li).data(dima_action, 0);
                        element.find('.' + dima_hover).removeClass(dima_hover).data(dima_action, 0);
                    }
                }

                function HideSubMenu(element) {
                    element.find('.' + dima_hover).removeClass(dima_hover);
                }

                function hoverIn(e) {
                    clearTimeout(timer.id);
                    var li = $(e.target).closest('li');
                    if (li.hasClass('menu-item-has-children')) {
                        ShowSubMenu(li);
                    }
                }

                function hoverOut(e) {
                    clearTimeout(timer.id);
                    var Menu = $.contains(document.getElementsByClassName('desk-nav')[0], e.toElement);
                    var ms = ( Menu ) ? 400 : 800;
                    var ul = $(this).closest('ul');
                    timer.id = setTimeout(function () {
                        HideSubMenu(ul);
                    }, ms);
                }

                function touchIn(e) {
                    var li = $(e.target).closest('li');
                    li.data(dima_action, li.data(dima_action) + 1);
                    if (li.hasClass('menu-item-has-children') && li.data(dima_action) === 1) {
                        e.preventDefault();
                        e.stopPropagation();
                        ShowSubMenu(li);
                    }
                }

                function touchOut(e) {
                    $(desk_childe_li).data(dima_action, 0);
                    HideSubMenu(desk_nav_menu);
                }

                if (Modernizr && Modernizr.touchevents) {
                    $(desk_childe_li).data(dima_action, 0);
                    desk_nav_menu.on('touchstart click', desk_childe_li, touchIn);
                    desk_nav_menu.on('touchstart click', function (e) {
                        e.stopPropagation();
                    });
                    $('body').on('touchstart click', touchOut);
                } else {
                    desk_nav_menu.hoverIntent({
                        over: hoverIn,
                        out: hoverOut,
                        selector: desk_childe_li
                    });
                    desk_nav_menu.on('focusin', desk_childe_li, hoverIn);
                    desk_nav_menu.on('focusout', desk_childe_li, hoverOut);
                }
            };
            var mobileNav = function () {
                var d = $(".dima-nav"),
                    i = $("a.dima-btn-nav");
                /**
                 * [Click Mobile button]
                 */
                i.click(function (event) {
                    event.preventDefault();
                    if (i.hasClass("btn-active")) {
                        d.slideUp();
                        i.removeClass("btn-active");
                    } else {
                        i.addClass("btn-active");
                        d.slideDown();
                    }
                });
                $('.mobnav-subarrow').click(function () {
                    $(this).parent().toggleClass("xpopdrop");
                });
            };
            var fixNav = function () {
                $.fn.fix_navbar = function () {
                    var $dima_nw = $('.dima-navbar-wrap');
                    var $navbar = $('.dima-navbar');
                    var $floating = $('.dima-floating-menu');
                    var $navbarwarp = $dima_nw;
                    var navbarTop = $dima_nw.offset().top - $('#wpadminbar').outerHeight();
                    if (windowHeight < navbarTop) {
                        navbarTop = windowHeight;
                    }
                    $(window).scroll(function () {
                        if ($(this).scrollTop() > navbarTop) {
                            $navbar.addClass('fix_nav');
                            $navbarwarp.addClass('fixed');
                            $floating.removeClass('container');
                        } else {
                            $navbar.removeClass('fix_nav');
                            $navbarwarp.removeClass('fixed');
                            $floating.addClass('container');
                        }
                    });
                };

                $.fn.show_navbar = function (el) {
                    el = $(this);
                    var $dima_nav = $('.dima-navbar');
                    var $navbarwarp = $('.dima-navbar-wrap');
                    var $floating = $('.dima-floating-menu');
                    var offsetBy = el.attr("data-offsetBy");
                    var oFFset = $(offsetBy).outerHeight() || 0;

                    if (typeof offsetBy === "undefined") {
                        oFFset = parseInt(el.attr("data-offsetby-px")) || 0;
                    }
                    var topBar = $('.dima-topbar').outerHeight() || 0;
                    var $navbar = $dima_nav;
                    var menuVal = $dima_nav.outerHeight() || 0;

                    var offsetTop = topBar + oFFset + menuVal;
                    $(window).scroll(function () {
                        if ($(this).scrollTop() >= offsetTop) {
                            $navbar.addClass('fix_nav animated fadeInDown');
                            $navbarwarp.addClass('fixed');
                            $floating.removeClass('container');
                        } else {
                            $navbar.removeClass('fix_nav animated fadeInDown');
                            $navbarwarp.removeClass('fixed');
                            $floating.addClass('container');
                        }
                    });
                };
            };
            var MobilesubMenu = function () {
                var dima_sub_icon = $('.mobile-nav .sub-icon'),
                    dima_active = "dima-active",
                    m = dima_sub_icon.find(".sub-menu");

                /**
                 * Mobile
                 */
                dima_sub_icon.find('>a').each(function (n) {
                    $(this).after('<div class="dima-sub-toggle" data-toggle="collapse" data-target=".sub-menu.sm-' + n + '"><span class="sub-icon"></span></div>')
                });
                m.each(function (n) {
                    $(this).addClass("sm-" + n + " collapse");
                });
                $(".dima-sub-toggle").on("click", function (n) {
                    n.preventDefault();
                    $(this).toggleClass(dima_active).closest("li").toggleClass(dima_active)
                });
            };
            var searchBox = function () {
                //search box event
                var bool = true;
                $(".search-btn").click(function (e) {

                    e.preventDefault();
                    var parent = $($(this).parents('.dima-navbar'));
                    if (bool) {
                        parent.find(".search-box").stop().slideDown(250, "easeOutExpo");
                        $(".search-box").find("input[type=text]").focus();
                        bool = false;
                    } else {
                        parent.find(".search-box").stop().slideUp(250, "easeOutExpo");
                        bool = true;
                    }
                });

                function closeSearch() {
                    $(".search-box").stop().slideUp(250, "easeOutExpo");
                }

                //close search btn event
                $(".close-search-box").click(function (e) {
                    e.preventDefault();
                    closeSearch();
                    bool = true;
                });
            };
            var onePage = function () {
                $("a[data-scrollto]").click(function () {
                    event.preventDefault();
                    var divScrollToAnchor = $(this).attr('data-scrollto');

                    var topOffsetScroll = 0;

                    $('html, body').stop().animate({
                        'scrollTop': $(divScrollToAnchor).offset().top - topOffsetScroll
                    }, 750, 'easeOutQuint');
                    return false;
                });
            };
            /**
             * Setup Function
             */
            var init = function () {
                myMenu();
                $("html").imagesLoaded(); // Detect when images have been loaded.
            };

            return {
                init: init
            };
        }();

        PIXELDIMA.SHOP = function () {
            var toggleBox = function () {
                $('a.show-box').click(function () {
                    var Val = $(this).attr("data-show");
                    $(Val).slideToggle();
                    return false;
                });
                $('.radio').click(function () {
                    var Val = $(this).attr("data-show");
                    $('.toHide').hide();
                    $(Val).slideToggle();
                });
                $('.checkbox').click(function () {
                    var Val = $(this).attr("data-show");
                    $(Val).slideToggle();
                });
            };

            var shopBtn = function () {

                $(".minus").click(function () {
                    var inputEl = $(this).parent().children().next();
                    var qty = inputEl.val();
                    if ($(this).parent().hasClass("minus"))
                        qty++;
                    else
                        qty--;
                    if (qty < 0)
                        qty = 0;
                    inputEl.val(qty);
                });


                $(".plus").click(function () {
                    var inputEl = $(this).parent().children().next();
                    var qty = inputEl.val();
                    if ($(this).hasClass("plus"))
                        qty++;
                    else
                        qty--;
                    if (qty < 0)
                        qty = 0;
                    inputEl.val(qty);
                });

                $('.add_to_cart_button').click(function () {
                    var $add_to_cart_button = $(this);
                    $add_to_cart_button.find('i').removeClass('fa-shopping-bag').addClass('fa-check');
                });
            };
            var sliderRange = function () {
                var $slider_rang = $("#slider-range");
                $slider_rang.slider({
                    range: true,
                    min: 0,
                    max: 40,
                    values: [5, 30],
                    slide: function (event, ui) {
                        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                    }
                });
                $("#amount").val("$" + $slider_rang.slider("values", 0) +
                    " - $" + $slider_rang.slider("values", 1));
            };

            var init = function () {
                toggleBox();
                shopBtn();
                sliderRange();
            };

            return {
                init: init
            };
        }();

        // Handles scrollable contents using jQuery sly and perfect scrollbar  
        PIXELDIMA.SCROLL = function () {
            var localScroll = function () {
                var top_offset = $('.dima-navbar').height() - 1;
                var $desk = $(".dima-one-page-navigation-active .desk-nav .dima-nav");
                var $mobile = $(".dima-one-page-navigation-active .mobile-nav .dima-nav");
                if ($('.dima-navbar').hasClass('dima-navbar-vertical')) {
                    top_offset = 0;
                }

                $desk.localScroll({
                    target: "body",
                    axis: "y",
                    duration: 800,
                    margin: true,
                    offset: -(top_offset)
                });
                $desk.find('a').on('click', function () {
                    var $self = $(this);
                    var hrefVal = $self.attr('href');
                    if ((hrefVal.length > 2 && hrefVal.match(/^#[^?&\/]*/g)) || hrefVal == "/") {
                        if (!$self.parent().hasClass('active')) {
                            $self.parent().addClass('active').siblings('.dima-nav li').removeClass('active');
                        }
                    }
                });

                $mobile.localScroll({
                    target: "body",
                    axis: "y",
                    duration: 800,
                    margin: true
                });

                $(".dima-one-page-navigation-active section").each(function () {
                    var id = $(this).attr('id');
                    $(".dima-one-page-navigation-active .desk-nav .dima-nav").hide();
                    var $self = $(".dima-one-page-navigation-active .desk-nav .dima-nav a[href='#" + id + "']");

                    if (id !== undefined) {
                        $(this).waypoint({
                            handler: function () {
                                if (!$self.parent().hasClass('active')) {
                                    $self.parent().addClass('active').siblings('.dima-nav li').removeClass('active');
                                }
                            },
                            offset: "0%",
                            triggerOnce: false
                        });
                    }
                });
                $("[data-scroll-link]").each(function () {

                    var $self = $(this);
                    var hrefVal = $self.attr('href');

                    if ((hrefVal.length > 2 && hrefVal.match(/^#[^?&\/]*/g)) || hrefVal == "/") {

                        var top_offset = $('.dima-navbar').height() - 1;
                        if ($('.dima-navbar').hasClass('dima-navbar-vertical')) {
                            top_offset = 0;
                        }
                        $.localScroll({
                            target: "body",
                            axis: "y",
                            duration: 800,
                            margin: true,
                            offset: -(top_offset)
                        });
                    }
                });
            };
            var callingSly = function () {
                var slyOptions = {
                    scrollBy: 200,
                    speed: 600,
                    smart: 0,
                    easing: 'easeOutQuart',
                    scrollBar: '.scrollbar',
                    dynamicHandle: 1,
                    dragHandle: 1,
                    clickBar: 1,
                    contentEditable: 1,
                    mouseDragging: 1,
                    touchDragging: 1,
                    releaseSwing: 1,
                    swingSpeed: 0.1,
                    elasticBounds: 1,
                    cycleBy: null,
                    cycleInterval: 4000
                };

                var sly = new Sly('#sly-frame', slyOptions);
                sly.init();
            };
            var perfectScrollbar = function () {
                //$(".quick-view-content").perfectScrollbar();
                $('.quick-view-content').perfectScrollbar('update');
            };

            var parallax = function () {

                $('.background-image-hide,.background-image-holder').each(function () {
                    //noinspection JSValidateTypes
                    var imgSrc = $(this).attr('data-bg-image');
                    if (typeof imgSrc !== typeof undefined) {
                        $(this).css('background-image', 'url("' + imgSrc + '")');
                        //noinspection JSValidateTypes
                        $(this).children('img').hide();
                    }
                });

                $('.parallax-background').each(function () {
                    var $start = $(this).attr('data-parallax-start');
                    var $center = $(this).attr('data-parallax-center');
                    var $bottom = $(this).attr('data-parallax-end');

                    if ($start === undefined) $start = '0%';
                    if ($center === undefined) $center = '50%';
                    if ($bottom === undefined) $bottom = '100%';

                    $(this).attr('data-bottom-top', 'background-position: 50% ' + $start + ';');
                    $(this).attr('data-center', 'background-position: 50% ' + $center + ';');
                    $(this).attr('data-top-bottom', 'background-position: 50% ' + $bottom + ';');
                    $(this).attr('data-direction', 'vertical');
                });


                // Init Skrollr
                if (!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)) {
                    var skr = skrollr.init({
                        forceHeight: false,
                        smoothScrolling: true
                    });
                    // Refresh Skrollr after resizing our sections
                    skr.refresh($(".homeSlide"));
                }
            };

            var init = function () {
                localScroll();
                parallax();
                perfectScrollbar();
                callingSly();
                $.scrollToTop();
            };

            return {
                init: init
            };
        }();

        PIXELDIMA.ANIMATION = function () {
            var animations = function () {
                var elm = $("[data-animate]");

                elm.each(function () {
                    var elm = $(this),
                        dataDelay = elm.attr("data-delay") || 0,
                        offsetVal = elm.attr("data-offset") || "100%",
                        trgger = elm.attr("data-trgger") || "false",
                        a = 0;
                    var dataAnimate = elm.attr("data-animate");
                    if (a = dataDelay ? Number(dataDelay) + 10 : 300, !elm.hasClass("animated")) {
                        $(this).addClass('opacity-zero');
                        //noinspection JSUnresolvedFunction
                        elm.waypoint(function () {
                            var $this = $(this);
                            setTimeout(function () {
                                $this.addClass('show animated ' + dataAnimate);
                            }, a);
                        }, {
                            offset: offsetVal,
                            triggerOnce: trgger
                        });
                    }

                })
            };
            var notAnimations = function () {
                var elm = $("[data-animate]");
                elm.each(function () {
                    var elm = $(this),
                        dataDelay = elm.attr("data-delay") || 0,
                        offsetVal = elm.attr("data-offset") || "100%",
                        trgger = elm.attr("data-trgger") || "false",
                        a = 0;
                    if (a = dataDelay ? Number(dataDelay) + 300 : 300, !elm.hasClass("animated")) {
                        $(this).addClass('opacity-zero');
                        //noinspection JSUnresolvedFunction
                        elm.waypoint(function () {
                            var $this = $(this);
                            setTimeout(function () {
                                $this.animate({
                                    opacity: 1
                                }, {
                                    step: function (now, fx) {
                                        var X = 100 * now;
                                        $(fx.elem).css("filter", "alpha(opacity=" + X + ")");
                                    }
                                });
                            }, a);
                        }, {
                            offset: offsetVal,
                            triggerOnce: trgger
                        });
                    }

                })
            };

            var init = function () {

                if (!Modernizr.mq('only all and (max-width: 480px)')) {
                    if (isTransitions) {
                        animations();
                    } else {
                        notAnimations();
                    }
                }
            };

            return {
                init: init
            };
        }();

        PIXELDIMA.SLIDE = function () {
            var flexSlider = function () {
                var $slide = $('#slider');
                var $animation = $slide.attr("data-flex-animation");
                $('#carousel').flexslider({
                    animation: "slide",
                    controlNav: false,
                    //controlNav: "thumbnails",
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 100,
                    itemMargin: 20,
                    minItems: getGridSize(),
                    maxItems: getGridSize(),
                    asNavFor: '#slider'
                });
                function getGridSize() {
                    return (window.innerWidth < 600) ? 2 :
                        (window.innerWidth < 900) ? 3 : 4;
                }

                $slide.flexslider({
                    animation: $animation,
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    sync: "#carousel"
                });
            };
            var init = function () {
                flexSlider();
            };
            return {
                init: init
            };
        }();

        PIXELDIMA.LIGHTBOX = function () {
            var lightBox = function () {
                var image_box = $('[data-lightbox="image"]'),
                    iframe_box = $('[data-lightbox="iframe"]'),
                    ajax_box = $('[data-lightbox="ajax"]'),
                    gallery_box = $('[data-lightbox="gallery"]'),
                    _test = $('[data-lightbox]');

                if (_test.length) {
                    if (_test.parent().find('img').length) {
                        image_box.magnificPopup({
                            type: 'image',
                            closeOnContentClick: !0,
                            closeBtnInside: !1,
                            fixedContentPos: !0,
                            mainClass: 'mfp-fade',
                            zoom: {
                                enabled: true,
                                duration: 500,
                                opener: function (element) {
                                    return element.parent().find('img');
                                }
                            },
                            image: {
                                verticalFit: !0
                            }
                        });
                    } else {
                        image_box.magnificPopup({
                            type: 'image',
                            closeOnContentClick: !0,
                            closeBtnInside: !1,
                            fixedContentPos: !0,
                            mainClass: 'mfp-fade',
                            image: {
                                verticalFit: !0
                            }
                        });
                    }

                    gallery_box.each(function () {
                        $(this).magnificPopup({
                            delegate: 'a.dima-gallery-item',
                            type: 'image',
                            overflowY: 'scroll',
                            closeOnContentClick: !0,
                            closeBtnInside: !1,
                            fixedContentPos: !0,
                            image: {
                                verticalFit: !0
                            },
                            mainClass: 'mfp-fade',
                            zoom: {
                                enabled: true,
                                duration: 500,
                                opener: function (element) {
                                    return element.parent().find('img');
                                }
                            },
                            gallery: {
                                enabled: !0,
                                navigateByImgClick: !0,
                                preload: [0, 1]
                            }
                        });
                    });
                    //iframe ( map, youtube ...)
                    iframe_box.magnificPopup({
                        disableOn: 500,
                        type: 'iframe',
                        mainClass: 'mfp-zoom-in',
                        removalDelay: 160,
                        preloader: 0,
                        fixedContentPos: 0
                    });

                    //Stop suggested video from youtube
                    $('a[href*="youtube.com/watch"]').magnificPopup({
                        type: 'iframe',
                        iframe: {
                            patterns: {
                                youtube: {
                                    index: 'youtube.com',
                                    id: 'v=',
                                    src: '//www.youtube.com/embed/%id%?rel=0&autoplay=1'
                                }
                            }
                        }
                    });

                    //Ajax
                    ajax_box.magnificPopup({
                        type: 'ajax',
                        closeBtnInside: 0,
                        alignTop: 1,
                        cache: 1,
                        overflowY: 'scroll',
                        mainClass: "mfp-zoom-in",
                        callbacks: {
                            ajaxContentAdded: function () {
                                PIXELDIMA.SLIDE.flexSlider();
                                PIXELDIMA.SHOP.init();
                                PIXELDIMA.UI.init();
                                PIXELDIMA.SCROLL.init();
                            }
                        }
                    });
                }
            };

            var init = function () {
                lightBox();
            };

            var build = {
                init: init,
                lightBox: lightBox
            };
            return build;
        }();

        PIXELDIMA.MEDIA = function () {
            var bigVedio = function () {
                var $elm = $('.video-wrap');
                if ($elm.length) {
                    // initialize BigVideo
                    $elm.each(function () {
                        var BV = new $.BigVideo({
                                container: $elm,
                                forceAutoplay: isTouch
                            }),
                            V = $elm.attr('data-video-wrap'),
                            img = $elm.attr('data-img-wrap');
                        if (typeof V != typeof undefined) {
                            if (!isTouch) {
                                BV.init();
                                BV.show(V, {
                                    ambient: true,
                                    doLoop: true
                                });
                            } else {
                                BV.init();
                                BV.show(img);
                            }
                        }
                    });
                }
            };

            function dima_play_video($overlay, parent) {
                var src,
                    src_splitted,
                    src_autoplay,
                    $wrapper = $overlay.parent(parent),
                    $video_iframe = $wrapper.find("iframe"),
                    is_embedded = $video_iframe.length ? !0 : !1;
                if (is_embedded) {
                    if (src = $video_iframe.attr("src"), src_splitted = src.split("?"), -1 !== src.indexOf("autoplay=")) return;
                    src_autoplay = "undefined" != typeof src_splitted[1] ? src_splitted[0] + "?autoplay=1&amp;" + src_splitted[1] : src_splitted[0] + "?autoplay=1", $video_iframe.attr({
                        src: src_autoplay
                    })
                } else $wrapper.find("video").get(0).play();
                $overlay.fadeTo(500, 0, function () {
                    $overlay.hide()
                })
            }

            $(".all_content").on("click", ".video-overlay", function (event) {
                event.preventDefault();
                dima_play_video($(this), ".post-img")
            });

            var mediaElement = function () {
                var $elm = $('.audio-video');
                if ($elm.length) {
                    $.each(['video/x-ms-wmv', 'audio/x-ms-wma'], function (i, type) {
                        if (!$.inArray(type, mejs.plugins.silverlight[0].types)) {
                            mejs.plugins.silverlight[0].types.push(type);
                        }
                    });
                    $elm.each(function (element) {
                        $(this).mediaelementplayer({
                            //pluginPath         : _wpmejsSettings.pluginPath,
                            startVolume: 1,
                            //features           : ['playpause', 'progress'],
                            audioWidth: '100%',
                            audioHeight: '49',
                            videoWidth: '100%',
                            videoHeight: '100%',
                            pauseOtherPlayers: true,
                            alwaysShowControls: true,

                            //hideVideoControlsOnLoad: true,
                            //startLanguage:'en',
                            success: function (mejs) {

                                var play = true;
                                var $container = $(element).find('.mejs-container');
                                var $controls = $(element).find('.mejs-controls');

                                var controlsOn = function () {
                                    $controls.stop().animate({opacity: 1}, 150);
                                };
                                var controlsOff = function () {
                                    $controls.stop().animate({opacity: 0}, 150);
                                };

                                mejs.addEventListener('canplay', function () {
                                    if (mejs.attributes.autoplay && play) {
                                        mejs.play();
                                        play = false;
                                    }
                                    if (mejs.attributes.muted) {
                                        mejs.setMuted(true);
                                    }
                                });

                                mejs.addEventListener('ended', function () {
                                    if (mejs.attributes.loop)
                                        mejs.play();
                                });

                                if ($container.hasClass('mejs-video')) {
                                    mejs.addEventListener('playing', function () {
                                        $container.hover(controlsOn, controlsOff);
                                    });
                                    mejs.addEventListener('pause', function () {
                                        $container.off('mouseenter mouseleave');
                                        controlsOn();
                                    });
                                }

                            },

                            error: function () {
                                console.log('MEJS media error.');
                            }

                        });
                    })
                }
            };
            var init = function () {
                bigVedio();
                mediaElement();
            };
            return {
                init: init
            };
        }();
        PIXELDIMA.UI = function () {
            var countUp = function () {
                $(".countUp").each(function () {

                    //noinspection JSUnresolvedFunction
                    $(this).waypoint({
                        handler: function () {
                            $(this).find(".number-count").countTo({
                                formatter: function (e) {
                                    return e = e.toFixed(), e = e.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                                }
                            });
                        },
                        offset: "100%",
                        triggerOnce: true
                    });
                });
            };
            var progress = function () {
                //progress bar animation
                setTimeout(function () {
                    //noinspection JSUnresolvedFunction
                    $(".progress .progress-bar").waypoint(function () {
                        $(this).each(function () {
                            var el = $(this),
                                perc = el.attr("aria-valuenow"),
                                current_percent = 0,

                                progress = setInterval(function () {
                                    if (current_percent >= perc) {
                                        clearInterval(progress);
                                    } else {
                                        current_percent += 1;
                                        el.css("width", (current_percent) + "%");
                                    }
                                }, 1);
                        });

                        //progress bar color
                        $('.progress').append(function () {
                            var elm = $(this),
                                color = elm.attr("data-color-val");
                            elm.find('.progress-bar').css('background-color', color);
                            elm.find('.progress-bar .percent').css('background-color', color);
                            elm.find('span').css('border-top-color', color);
                        });
                    }, {
                        offset: "100%",
                        triggerOnce: true
                    });

                    //noinspection JSUnresolvedFunction
                    $(".dial").waypoint(function () {

                        var elm = $(this),
                            width = elm.attr("data-width"),
                            perc = elm.attr("value");

                        elm.knob({
                            'value': 0,
                            'min': 0,
                            'max': 100,
                            "skin": "tron",
                            "readOnly": true,
                            "thickness": 0.09,
                            "displayInput": false,
                            "bgColor": "rgba(255,255,255,0)",
                            "linecap": ""
                        });

                        $({
                            value: 0
                        }).animate({
                            value: perc
                        }, {
                            duration: 1000,
                            easing: 'swing',
                            progress: function () {
                                elm.val(Math.ceil(this.value)).trigger('change');
                            }
                        });

                        //circular progress bar color
                        $(this).append(function () {
                            elm.parents('.circular-bar').find('.circular-bar-content').css('top', -(width / 2 + 10));
                            elm.parents('.circular-bar').find('.circular-bar-content label').text(perc + '%');
                        });
                    }, {
                        offset: "100%",
                        triggerOnce: true
                    });
                }, 300);
            };
            var tabs = function () {

                var $tab_id = $("#dima-tab-nav");
                $('[data-toggle="tooltip"]').tooltip({
                    animation: true,
                    html: !1,
                    delay: {
                        show: 0,
                        hide: 0
                    }
                });

                $('[data-toggle="popover"]').popover();

                $tab_id.find("a:first").tab("show"); // Select first tab
                $tab_id.find("a").click(function (e) {
                    e.preventDefault();
                    $(this).tab("show");
                });
            };

            var notification = function () {
                $(".dima-alert button.close").click(function () {
                    $(this).parent().fadeOut(200, "easeOutExpo");
                });
            };
            var datepicker = function () {
                var elm = $("[data-datepicker]");
                elm.each(function () {
                    $(this).datepicker({
                        beforeShow: function (textbox, instance) {
                            $('#ui-datepicker-div').css('min-width', $(this).outerWidth());
                        },
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        dateFormat: 'dd/mm/yy'
                    })
                        .datepicker('widget').wrap('<div class="ll-skin-melon"/>');
                });
            };
            var element_bg = function () {
                var elm = $("[data-element-bg]");
                elm.each(function () {
                    var b = $(this).attr("data-element-bg");
                    $(this).css({
                        "background-image": "url(" + b + ")",
                        "background-position": "100% 100%",
                        "background-repeat": "no-repeat"
                    });
                });

            };

            var init = function () {
                countUp();
                progress();
                tabs();
                datepicker();
                notification();
                element_bg();
            };
            return {
                init: init
            };
        }();

        // Handles portfolio AJAX and filter using jQuery isotope
        PIXELDIMA.PORTFOLIO = function () {
            //AJAX
            var openAjax = function () {
                $(".ajax-portfolio .isotope-item a[data-load]").click(function (d) {
                    var id = $(this).parents(".isotope-item").attr("id");
                    var url = $(this).attr("href");
                    d.preventDefault();

                    if ($(".portfolio-ajax-expanded").is(":visible")) {
                        closeAjax();
                        setTimeout(function () {
                            loadAjax(url, id);
                        }, 700);
                    } else {
                        loadAjax(url, id);
                    }

                })
            };
            var loadAjax = function (url, id) {
                $.ajax({
                    url: url,
                    type: "get",
                    cache: false,
                    data: {},
                    beforeSend: function () {
                        $("#ajax-loader").fadeIn();
                    },
                    success: function (data) {
                        $('.portfolio-ajax-expanded').html(data);
                    },
                    complete: function () {
                        PIXELDIMA.SLIDE.flexSlider();
                        PIXELDIMA.LIGHTBOX.init();
                        initAjax(id);
                        openItem();
                    }
                });
            };
            var closeAjax = function () {
                $(".portfolio-ajax-expanded")
                    .find(".portfolio-ajax-content").slideUp(600, function () {
                    $(".portfolio-ajax-expanded").css({
                        display: "none"
                    });
                });
            };
            var openItem = function () {
                $("#ajax-loader").fadeOut();
                setTimeout(function () {
                    var $ajax_portfolio = $(".portfolio-ajax-expanded");
                    $.when($ajax_portfolio.slideDown(900, "easeOutQuad"))
                        .then(
                            $("html,body").stop(!0).animate({
                                scrollTop: $ajax_portfolio.offset().top - 150
                            }, 900, "easeOutQuad")
                        );
                }, 400);
            };
            var initAjax = function () {

                $("#next-portfolio, #prev-portfolio").click(function (d) {
                    var id = $(this).attr("data-id");
                    var url = $("#" + id).find("a[data-load]").attr("href");
                    closeAjax();
                    setTimeout(function () {
                        loadAjax(url, id);
                    }, 700);
                    d.preventDefault()
                });

                $(".close-ajax-portfolio").click(function (d) {
                    $(".portfolio-ajax-expanded")
                        .find(".portfolio-ajax-content").slideUp(600, function () {
                        $(".portfolio-ajax-expanded").css({
                            display: "none"
                        });
                    });
                    d.preventDefault();
                })
            };
            //!AJAX
            var filterIsotop = function () {

                var $container = $('.dima-isotope-container');

                $container.imagesLoaded(function () {
                    $container.isotope({
                        filter: '*',
                        layoutMode: "masonry",
                        //transitionDuration: '0.8s',
                        itemSelector: '.isotope-item',
                        masonry: {
                            columnWidth: '.isotope-item'
                            //isFitWidth: true
                            //gutter: 1,
                        },
                        percentPosition: true
                    });
                });

                $('.filters a').click(function () {
                    var li_p = $(this).parent();
                    $('.filters  .current').removeClass('current');
                    $(li_p).addClass('current');
                    //for columns protfolio without margin
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector
                    });
                    return false
                });
            };

            var init = function () {
                openAjax();
                filterIsotop();

            };

            return {
                init: init,
                filterIsotop: filterIsotop
            };
        }();
        PIXELDIMA.EVENT = function () {
            var event = function () {
                var $dima_nav = $('.dima-navbar');
                //Fix The Navbar
                if (windowWidth > 960) {
                    if ($dima_nav.hasClass('fix-one')) {
                        $(".fix-one").fix_navbar();
                    }
                    //this will apply for offset-by
                    if ($dima_nav.hasClass('fix-two')) {
                        $(".fix-two").show_navbar();
                    }
                }
                //Add class active Based on URL http://css-tricks.com/snippets/jquery/add-active-navigation-class-based-on-url/
                $('.sidebar li a[href^="' + location.pathname.split("/")[2] + '"]').parent().addClass('active');

                $("[data-height]").each(function () {
                    var h = $(this).attr("data-height");
                    $(this).css("height", h);
                });
                $("[data-bg]").each(function () {
                    var bg = $(this).attr("data-bg");
                    $(this).css("background-image", 'url(' + bg + ')');
                });
                $("[data-bg-color]").each(function () {
                    var bg = $(this).attr("data-bg-color");
                    $(this).css("background-color", bg);
                });

            };
            var init = function () {
                event();
            };

            return {
                init: init
            };
        }();

        // handle the layout reinitialization on window resize
        PIXELDIMA.DOCONRESIZE = function () {

            var nav = function () {
                var $dima_nav = $('.dima-navbar');
                windowWidth = w.width();
                if ($dima_nav.hasClass('fix-one')) {
                    $(".fix-one").fix_navbar();
                }
                if ($dima_nav.hasClass('fix-two')) {
                    $(".fix-two").show_navbar();
                }
            };

            var responsiveFlexSlider = function () {
                var height_flex = $(".flexslider .slides").outerHeight();
                if (height_flex < windowHeight) {
                    $('.flexslider').height(height_flex);
                } else {
                    $('.flexslider').height(windowHeight);
                }
            };

            var init = function () {
                nav();
                parentSize();
                //noinspection JSUnresolvedFunction
                responsiveFlexSlider();
            };
            return {
                init: init
            };
        }();

        // runs callback functions
        PIXELDIMA.OKABREADY = function () {

            var init = function () {
                //Please don't change the order
                PIXELDIMA.SLIDE.init();
                PIXELDIMA.LIGHTBOX.init();
                PIXELDIMA.MEDIA.init();
                PIXELDIMA.ANIMATION.init();
                PIXELDIMA.NAV.init();
                PIXELDIMA.SCROLL.init();
                PIXELDIMA.SHOP.init();
                PIXELDIMA.PORTFOLIO.init();
                PIXELDIMA.EVENT.init();
                PIXELDIMA.UI.init();
                w.resize(function () {
                    PIXELDIMA.DOCONRESIZE.init();
                });
            };

            return {
                init: init
            };
        }();
        /**
         * Call Our Setups Functions
         */
        PIXELDIMA.OKABREADY.init();
    });

}(jQuery));

(function ($) {
    /*
     Plugin Name: scrollToTop for jQuery.
     */
    $.extend({
        scrollToTop: function () {
            var _isScrolling = false;
            $("#scrollToTop").click(function (e) {
                e.preventDefault();
                $("body, html").animate({
                    scrollTop: 0
                }, 500);
                return false;
            });

            // Show/Hide Button on Window Scroll event.
            $(window).scroll(function () {
                var $id_top = $("#scrollToTop");
                if (!_isScrolling) {
                    _isScrolling = true;
                    //noinspection JSValidateTypes
                    if ($(window).scrollTop() > 150) {
                        $id_top.stop(true, true).removeClass("off");
                        $id_top.stop(true, true).addClass("on");
                        _isScrolling = false;
                    } else {
                        $id_top.stop(true, true).removeClass("on");
                        $id_top.stop(true, true).addClass("off");
                        _isScrolling = false;
                    }
                }
            });
        }
    });
}(jQuery));


