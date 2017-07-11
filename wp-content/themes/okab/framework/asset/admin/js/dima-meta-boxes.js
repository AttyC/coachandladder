jQuery(document).ready(function ($) {
    /**
     * [Posts]
     */
    var video_target = $('#dima-meta-box-video'),
        video_checkbox = $('#post-format-video'),
        quote_target = $('#dima-meta-box-quote'),
        quote_checkbox = $('#post-format-quote'),
        link_target = $('#dima-meta-box-link'),
        link_checkbox = $('#post-format-link'),
        gallery_target = $('#dima-meta-box-gallery'),
        post_gallery_target = $('#dima-post-images'),
        gallery_checkbox = $('#post-format-gallery'),
        audio_target = $('#dima-meta-box-audio'),
        audio_checkbox = $('#post-format-audio');

    var post_format_box = $('#post-formats-select input');
    Hide_All_Meta_Boxes();
    post_format_box.change(function () {
        Hide_All_Meta_Boxes();
        if ($(this).val() == 'quote') {
            quote_target.css('display', 'block');
        } else if ($(this).val() == 'link') {
            link_target.css('display', 'block');
        } else if ($(this).val() == 'audio') {
            audio_target.css('display', 'block');
        } else if ($(this).val() == 'video') {
            video_target.css('display', 'block');
        } else if ($(this).val() == 'gallery') {
            gallery_target.css('display', 'block');
            post_gallery_target.css('display', 'block');
        }
    });

    if (quote_checkbox.is(':checked')) quote_target.css('display', 'block');
    if (link_checkbox.is(':checked')) link_target.css('display', 'block');
    if (audio_checkbox.is(':checked')) audio_target.css('display', 'block');
    if (video_checkbox.is(':checked')) video_target.css('display', 'block');
    if (gallery_checkbox.is(':checked')) gallery_target.css('display', 'block');
    if (gallery_checkbox.is(':checked')) post_gallery_target.css('display', 'block');

    function Hide_All_Meta_Boxes() {
        video_target.css('display', 'none');
        quote_target.css('display', 'none');
        link_target.css('display', 'none');
        audio_target.css('display', 'none');
        gallery_target.css('display', 'none');
        post_gallery_target.css('display', 'none');
    }

    //=====================================================
    //

    var post_gallery_frame;
    var $image_gallery_ids = $('#post_image_gallery');
    var $post_images = $('#post_images_container').find('ul.post_images');

    $('.add_post_images').on('click', 'a', function (event) {
        var $el = $(this);

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if (post_gallery_frame) {
            post_gallery_frame.open();
            return;
        }

        // Create the media frame.
        post_gallery_frame = wp.media.frames.product_gallery = wp.media({
            // Set the title of the modal.
            title: $el.data('choose'),
            button: {
                text: $el.data('update')
            },
            states: [
                new wp.media.controller.Library({
                    title: $el.data('choose'),
                    filterable: 'all',
                    multiple: true
                })
            ]
        });

        // When an image is selected, run a callback.
        post_gallery_frame.on('select', function () {
            var selection = post_gallery_frame.state().get('selection');
            var attachment_ids = $image_gallery_ids.val();

            selection.map(function (attachment) {
                attachment = attachment.toJSON();

                if (attachment.id) {
                    attachment_ids = attachment_ids ? attachment_ids + ',' + attachment.id : attachment.id;
                    var attachment_image = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;

                    $post_images.append('<li class="image" data-attachment_id="' + attachment.id + '"><img src="' + attachment_image + '" /><ul class="actions"><li><a href="#" class="delete" title="' + $el.data('delete') + '">' + $el.data('text') + '</a></li></ul></li>');
                }
            });

            $image_gallery_ids.val(attachment_ids);
        });

        post_gallery_frame.open();
    });

    // Image ordering
    $post_images.sortable({
        items: 'li.image',
        cursor: 'move',
        scrollSensitivity: 40,
        forcePlaceholderSize: true,
        forceHelperSize: false,
        helper: 'clone',
        opacity: 0.65,
        placeholder: 'dima-metabox-sortable-placeholder',
        start: function (event, ui) {
            ui.item.css('background-color', '#f6f6f6');
        },
        stop: function (event, ui) {
            ui.item.removeAttr('style');
        },
        update: function () {
            var attachment_ids = '';

            $('#post_images_container').find('ul li.image').css('cursor', 'default').each(function () {
                var attachment_id = jQuery(this).attr('data-attachment_id');
                attachment_ids = attachment_ids + attachment_id + ',';
            });

            $image_gallery_ids.val(attachment_ids);
        }
    });

    // Remove images
    $('#post_images_container').on('click', 'a.delete', function () {
        $(this).closest('li.image').remove();

        var attachment_ids = '';

        $('#post_images_container').find('ul li.image').css('cursor', 'default').each(function () {
            var attachment_id = jQuery(this).attr('data-attachment_id');
            attachment_ids = attachment_ids + attachment_id + ',';
        });

        $image_gallery_ids.val(attachment_ids);

        // remove any lingering tooltips
        $('#tiptip_holder').removeAttr('style');
        $('#tiptip_arrow').removeAttr('style');

        return false;
    });


});