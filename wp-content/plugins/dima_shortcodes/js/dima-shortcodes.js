//shortcode
(function ($) {
    /**
     * Google Maps
     */
    map = function (selected, params) {
        var _ID = selected.attr("id"),
            _lat = params.lat,
            _lng = params.lng,
            _ZoomControl = params.zoomControl,
            _Coordinates = new google.maps.LatLng(_lat, _lng),
            _drag = params.drag,
            _height = params.height,
            _width = params.width,
            _hue = params.hue,
            _zoom = parseInt(params.zoom);
        var Styles = [{
            featureType: 'all',
            elementType: 'all',
            stylers: [{
                hue: (_hue) ? _hue : null
            }]
        }, {
            featureType: 'water',
            elementType: 'all',
            stylers: [{
                hue: (_hue) ? _hue : null
            }, {
                saturation: 0
            }, {
                lightness: 50
            }]
        }, {
            featureType: 'poi',
            elementType: 'all',
            stylers: [{
                visibility: 'off'
            }]
        }];
        $(selected).css({
            paddingBottom: _height,
            width: _width,
            margin: '0 auto'
        });
        var mapOptions = {
            scrollwheel: false,
            draggable: (_drag === true),
            zoomControl: (_ZoomControl === true),
            disableDoubleClickZoom: false,
            disableDefaultUI: true,
            zoom: _zoom,
            center: _Coordinates,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var _MapStyle = new google.maps.StyledMapType(Styles, {
            name: 'Styled Map'
        });
        var _Map = new google.maps.Map(document.getElementById(_ID), mapOptions);
        _Map.mapTypes.set('map_style', _MapStyle);
        _Map.setMapTypeId('map_style');
        var G_ID = $('#' + _ID).parent().attr('id');
        if ($("#" + G_ID + " .dima-gmap-marker").length > 0) {
            _marker(_Map, G_ID)
        }

    };
    var _marker = function (_Map, _ID) {
        $('#' + _ID + ' .dima-gmap-marker').each(function (index, elm) {
            var params = $(elm).data('dima-params'),
                _markers, _infoWindows;
            _markers = new google.maps.Marker({
                map: _Map,
                position: new google.maps.LatLng(params.lat, params.lng),
                infoWindowIndex: index,
                icon: params.image
            });
            _infoWindows = new google.maps.InfoWindow({
                content: params.info,
                maxWidth: 200
            });
            google.maps.event.addListener(_markers, 'click', function () {
                if (params.info !== '') {
                    _infoWindows.open(_Map, this);
                }
            });
        });
    };
    //flex slide
    var _slider = function (element, params) {
        jQuery(element).css('height', 'auto').flexslider({
            selector: '.slides > .slide-item',
            animation: params.animation,
            controlNav: params.controlNav,
            directionNav: params.directionNav,
            slideshowSpeed: params.slideshowSpeed,
            animationSpeed: params.animationSpeed,
            slideshow: params.slideshow,
            randomize: params.random,
            pauseOnHover: true,
            useCSS: true,
            touch: true,
            video: true,
            //smoothHeight: true,
            easing: 'easeInOutExpo'
        });
    };

    //owl slide
    var _owl = function (element, params) {
        var _elm = jQuery(element);
        //console.log(params.items);
        //console.log(params.is_rtl);
        _elm.owlCarousel({
            items: params.items,
            margin: parseInt(params.items_margin),
            nav: params.navigation,
            navText: ["<i class='fa fa-chevron-right'></i>", "<i class='fa fa-chevron-left'></i>"],
            dots: params.pagination,
            smartSpeed: 500,
            autoplaySpeed: 500,
            //itemClass: 'owl-item',
            dotsSpeed: 400,
            //mouseDrag: false,
            autoplay: params.auto_play,
            rtl: params.is_rtl,
            lazyLoad: false,
            loop: params.loop,
            responsiveClass: true,
            responsive: {
                250: {
                    items: params.items_phone
                },
                480: {
                    items: params.items_phone
                },
                768: {
                    items: params.items_tablet
                },
                989: {
                    items: params.items_tablet
                },
                1199: {
                    items: params.items
                }
            }
        });
        if (params.mouse_wheel) {
            _elm.bind('mousewheel', '.owl-stage', function (e) {
                e.preventDefault();
                if (e.originalEvent.wheelDelta > 0) {
                    _elm.trigger('next.owl.carousel');
                } else {
                    _elm.trigger('prev.owl.carousel', [300]);
                }
                e.preventDefault();
            });
        }
    };

    var PostHover = function () {
        $('.link_overlay,.post-icon').each(function () {
            var _h = $(this).height();
            var h = $(this).find('.icons-media').height();
            var _top = (_h - h) / 2 + 15 + 25;
            var len = $(this).find('.icons-media > li').length;
            //console.log(_top);
            if (len === 1) {
                $(this).find('ul').css({
                    'width': '50px'
                });
            }
            $(this).find('ul').css({
                'top': _top
            })
        });
        $('.work-info').each(function () {
            var h = $(this).parent().outerHeight();
            var _bottom = h - ((h / 2) + 75);

            $(this).css({
                'bottom': _bottom
            })
        });
    };

    $(document).ready(function () {
        //google maps
        $('[data-dima-element="google_map"]').each(function (index, element) {
            var elm = $(element).find(".dima-gmap-in");
            var params = $(element).data('dima-params') || {};
            map(elm, params);
        });
        //Flex Slide
        $('[data-dima-element="slider"]').each(function (index, element) {
            var params = $(element).data('dima-params') || {};
            _slider(element, params);
        });

        //Owl Slide
        $('[data-dima-element="owl_slider"]').each(function (index, element) {
            var params = $(element).data('dima-params') || {};
            _owl(element, params);
        });
        //PostHover();
    });
}(jQuery));