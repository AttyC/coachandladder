jQuery(document).ready(function ($) {
    window.DimaRowView = window.VcRowView.extend({
        buildDesignHelpers: function () {
            var color = this.model.getParam('bg_color'),
                image = this.model.getParam('bg_image'),
                pattern = this.model.getParam('bg_pattern'),
                $column_toggle = this.$el.find('> .vc_controls .column_toggle'),
                $color = '';

            this.$el.find('> .controls .vc_row_color').remove();
            this.$el.find('> .controls .vc_row_image').remove();
            if (color) {
                $color = $('<span class="vc_row_color" style="background-color:' + color + '"></span>');
                $color.insertAfter($column_toggle);
            }
            if (pattern) {
                $.ajax({
                    type: 'POST',
                    url: window.ajaxurl,
                    data: {
                        action: 'dima_get_media_post',
                        content: pattern
                    },
                    dataType: 'JSON'
                }).done(function (data) {
                    if ($color == '') {
                        $color = $('<span class="vc_row_color"></span>');
                        $color.insertAfter($column_toggle);
                    }
                    if (data.back_url != '') $color.addClass('image_viewer').html($('<span class="vc_row_image" style="' + data.back_url + '"></span>'));
                });
            }
            if (image) {
                $.ajax({
                    type: 'POST',
                    url: window.ajaxurl,
                    data: {
                        action: 'dima_get_media_post',
                        content: image
                    },
                    dataType: 'JSON'
                }).done(function (data) {
                    if ($color == '') {
                        $color = $('<span class="vc_row_color"></span>');
                        $color.insertAfter($column_toggle);
                    }
                    if (data.back_url != '') $color.addClass('image_viewer').html($('<span class="vc_row_image" style="' + data.back_url + '"></span>'));
                    if (data.back_icon != '') $color.html($('<span class="vc_row_image" title="' + (data.back_mime).replace("oembed/", "") + '">' + data.back_icon + '</span>'));
                });
            }
        },
        ready: function (e) {
            window.DimaRowView.__super__.ready.call(this, e);
            if (this.$content.closest('.wpb_dima_slider').length) {
                var row_inner = this.$content.closest('.wpb_vc_row_inner.wpb_sortable');
                row_inner.prepend("<h3>Slide</h3>");
            }
            return this;
        }
    });

    window.DimaColumnView = window.VcColumnView.extend({
        buildDesignHelpers: function () {
            var color = this.model.getParam('bg_color'),
                image = this.model.getParam('bg_image'),
                pattern = this.model.getParam('bg_pattern'),
                $column_add = this.$el.find('> .bottom-controls .column_add'),
                $column_edit = this.$el.find('> .vc_controls .column_edit'),
                $column_delete = this.$el.find('> .vc_controls .column_delete'),
                $color = '';
            $column_edit.insertAfter($column_add);
            $column_delete.insertAfter($column_edit);
            this.$el.find('> .bottom-controls .vc_column_color').remove();
            this.$el.find('> .bottom-controls .vc_column_image').remove();
            if (color) {
                $color = $('<span class="vc_control vc_column_color" style="background-color:' + color + '"></span>');
                $color.insertAfter($column_delete);
            }
            if (pattern) {
                $.ajax({
                    type: 'POST',
                    url: window.ajaxurl,
                    data: {
                        action: 'dima_get_media_post',
                        content: pattern
                    },
                    dataType: 'JSON'
                }).done(function (data) {
                    if ($color == '') {
                        $color = $('<span class="vc_row_color"></span>');
                        $color.insertAfter($column_delete);
                    }
                    if (data.back_url != '') $color.addClass('image_viewer').html($('<span class="vc_row_image" style="' + data.back_url + '"></span>'));
                });
            }
            if (image) {
                $.ajax({
                    type: 'POST',
                    url: window.ajaxurl,
                    data: {
                        action: 'dima_get_media_post',
                        content: image
                    },
                    dataType: 'JSON'
                }).done(function (data) {
                    if ($color == '') {
                        $color = $('<span class="vc_control vc_column_color"></span>');
                        $color.insertAfter($column_delete);
                    }
                    if (data.back_url != '') $color.addClass('image_viewer').html($('<span class="vc_column_image" style="' + data.back_url + '"></span>'));
                    if (data.back_icon != '' && data.back_mime != undefined) $color.html($('<span class="vc_column_image" title="' + (data.back_mime).replace("oembed/", "") + '">' + data.back_icon + '</span>'));
                });
            }
        }
    });


});