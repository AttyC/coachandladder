/**
 * @version: 1.0.0
 * @author   pixelDima
 * @link     http://pixeldima.com
 */

(function ($) {

    "use strict";

    $(document).ready(function () {

        dima_megamenu.megamenu_ismega_update();
        dima_megamenu.update_megamenu_fields();
        $('.dima-remove-megamenu-background').dima_background_display();

        dima_media();
    });

    var dima_megamenu = {

        megamenu_ismega_update: function () {

            $(document).on('click', '.target-menu-item-megamenu-ismega', function () {
                var parent_li_item = $(this).parents('.menu-item:eq( 0 )');

                if ($(this).is(':checked')) {
                    parent_li_item.addClass('dima-megamenu');
                } else {
                    parent_li_item.removeClass('dima-megamenu');
                }

               dima_megamenu.update_megamenu_fields();
            });
        },

        update_megamenu_fields: function () {
            var menu_li_items = $('.menu-item');

            menu_li_items.each(function (i) {

                var megamenu_ismega = $('.target-menu-item-megamenu-ismega', this);

                if (!$(this).is('.menu-item-depth-0')) {
                    var check_against = menu_li_items.filter(':eq(' + (i - 1) + ')');

                    if (check_against.is('.dima-megamenu')) {
                        megamenu_ismega.attr('checked', 'checked');
                        $(this).addClass('dima-megamenu');
                    } else {
                        megamenu_ismega.attr('checked', '');
                        $(this).removeClass('dima-megamenu');
                    }
                } else {
                    if (megamenu_ismega.attr('checked')) {
                        $(this).addClass('dima-megamenu');
                    }

                }
            });
        }

    };

    $.fn.dima_background_display = function () {
        var _id;
        return this.click(function (e) {
            e.preventDefault();
            _id = this.id.replace('dima-media-remove-', '');
            $('#target-menu-item-megamenu-background-' + _id).val('');
            $('#dima-media-img-' + _id).attr('src', '').css('display', 'none');
        });
    };

    function dima_media() {
        var _uploader;
        var wp_media_post_id;

        $(document.body).on('click', '.dima-open-media', function (e) {

            e.preventDefault();

            wp_media_post_id = this.id.replace('dima-media-upload-', '');

            var _button = $(this);
            var set_to_post_id = _button.data('id');


            if (_uploader) {
                _uploader.open();
                return;
            } else {
                wp.media.model.settings.post.id = set_to_post_id;
            }

            _uploader = wp.media.frames._frame = wp.media({
                className: 'media-frame dima-media-frame',
                frame: 'select',
                multiple: false,
                library: {
                    type: 'image'
                }
            });

            _uploader.on('select', function () {
                var media_attachment = _uploader.state().get('selection').first().toJSON();
                $('#target-menu-item-megamenu-background-' + wp_media_post_id).val(media_attachment.url);
                $('#dima-media-img-' + wp_media_post_id).attr('src', media_attachment.url).css('display', 'block');
            });

            _uploader.open();
        });

    }

})(jQuery);