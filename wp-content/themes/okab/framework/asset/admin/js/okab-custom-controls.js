/**
 *
 */

jQuery(document).ready(function ($) {
    var $target_boxed = $('#customize-control-dima_layout_site'),
        $font_body_target = $('#customize-control-dima_custom_font'),
        $topbar_display_target = $('#customize-control-dima_navbar_topbar'),
        $buttom_small_footer_display_target = $('#customize-control-dima_footer_bottom'),
        $buttom_footer_copyright_target = $('#customize-control-dima_footer_content_display'),
        $blog_style_targ_setting_target = $('#customize-control-dima_blog_style'),
        $blog_masonry_targ_setting_target = $('#customize-control-dima_blog_layout'),
        $blog_related_post_target = $('#customize-control-dima_post_related_display'),
        $dima_blog_enable_post_meta_target = $('#customize-control-dima_blog_enable_post_meta'),
        $shop_product_tabs_target = $('#customize-control-dima_shop_product_tap_display'),
        $shop_product_trelated_target = $('#customize-control-dima_shop_related_products_display'),
        $shop_product_upsell_target = $('#customize-control-dima_shop_cart_display'),
        $shop_product_cross_target = $('#customize-control-dima_shop_upsells_display'),
        $news_display_setting_target = $('#customize-control-dima_news_display'),
        $news_query_cat_targ_setting_target = $('#customize-control-dima_news_query'),
        $control_dima_header_navbar_position_target = $('#customize-control-dima_header_navbar_animation'),
        $Navbar_Transparent = $('#customize-control-dima_header_navbar_transparent'),
        $Navbar_position = $('#customize-control-dima_logo_position'),
        $demos = $('#customize-control-dima_demo_name'),
        $opengraph_setting_target = $('#customize-control-dima_open_graph_meta_tag');

    /* Boxed-Full */

    var $boxed_display = [{
        val: 'boxed',
        target: '#customize-control-dima_body_background_pattern,' +
        '#customize-control-dima_body_background_image,' +
        '#customize-control-dima_boxed_margin,' +
        '#customize-control-dima_body_background_color'
    }];
    dima_customizer_initial_display($target_boxed.find('input:checked'), $boxed_display);
    dima_customizer_change_display($target_boxed.find('input'), $boxed_display);

    /* Font ON-OFF */
    var $font_body_display = [{
        val: '1',
        target: '#customize-control-dima_body_font_list,' +
        '#customize-control-dima_body_subsets_list,' +
        '#customize-control-dima_heading_font_list,' +
        '#customize-control-dima_logo_font_list,' +
        '#customize-control-dima_body_weights_list,' +
        '#customize-control-dima_navbar_weights_list,' +
        '#customize-control-dima_heading_weights_list,' +
        '#customize-control-dima_logo_weights_list,' +
        '#customize-control-dima_navbar_font_list'
    }];
    dima_customizer_initial_display($font_body_target.find('input:checked'), $font_body_display);
    dima_customizer_change_display($font_body_target.find('input'), $font_body_display);

    var $dima_blog_enable_post_meta = [{
        val: '1',
        target: '#customize-control-dima_blog_enable_post_meta_cat,' +
        '#customize-control-dima_blog_enable_post_meta_viwe'
    }];
    dima_customizer_initial_display($dima_blog_enable_post_meta_target.find('input:checked'), $dima_blog_enable_post_meta);
    dima_customizer_change_display($dima_blog_enable_post_meta_target.find('input'), $dima_blog_enable_post_meta);


    var $topbar_display = [{
        val: '1',
        target: '#customize-control-dima_navbar_topbar_color,' +
        '#customize-control-dima_navbar_topbar_background,' +
        '#customize-control-dima_navbar_option_address_display_topbar,' +
        '#customize-control-dima_navbar_option_tel_display_topbar,' +
        '#customize-control-dima_navbar_option_today_display_topbar,' +
        '#customize-control-dima_navbar_option_myaccount_display_topbar,' +
        '#customize-control-dima_navbar_option_social_display_topbar,' +
        '#customize-control-dima_navbar_option_address_text_topbar,' +
        '#customize-control-dima_navbar_option_tel_text_topbar,' +
        '#customize-control-dima_navbar_option_today_text_topbar'
    }];
    dima_customizer_initial_display($topbar_display_target.find('input:checked'), $topbar_display);
    dima_customizer_change_display($topbar_display_target.find('input'), $topbar_display);
    /**
     * Footer
     */

    var $buttom_small_footer_display = [{
        val: '1',
        target: '#customize-control-dima_footer_bottom_center,' +
        '#customize-control-dima_footer_menu_display,' +
        '#customize-control-dima_footer_content_display,' +
        '#customize-control-dima_footer_content_text,' +
        '#customize-control-dima_footer_content_bottom_bg,' +
        '#customize-control-dima_footer_content_body_color,' +
        '#customize-control-dima_footer_content_link_color'
    }];
    dima_customizer_initial_display($buttom_small_footer_display_target.find('input:checked'), $buttom_small_footer_display);
    dima_customizer_change_display($buttom_small_footer_display_target.find('input'), $buttom_small_footer_display);

    var $buttom_footer_copyright = [{
        val: '1',
        target: '#customize-control-dima_footer_content_text'
    }];
    dima_customizer_initial_display($buttom_footer_copyright_target.find('input:checked'), $buttom_footer_copyright);
    dima_customizer_change_display($buttom_footer_copyright_target.find('input'), $buttom_footer_copyright);


    /*--Blog--*/

    var $blog_style_targ_setting = [{
        val: 'standard',
        target: '#²,' + 'label[for="dima_blog_layoutmini"]'
    }];
    dima_customizer_initial_display($blog_style_targ_setting_target.find('input:checked'), $blog_style_targ_setting);
    dima_customizer_change_display($blog_style_targ_setting_target.find('input'), $blog_style_targ_setting);

    var $blog_style_targ = [{
        val: 'masonry',
        target: '#customize-control-dima_blog_masonry_columns'
    }];
    dima_customizer_initial_display($blog_style_targ_setting_target.find('input:checked'), $blog_style_targ);
    dima_customizer_change_display($blog_style_targ_setting_target.find('input'), $blog_style_targ);


    var $blog_masonry_targ_setting = [{
        val: 'no-sidebar',
        target: '#customize-control-dima_blog_masonry_columns input[value="4"]'
    }];
    dima_input_display($blog_masonry_targ_setting_target.find('input:checked'), $blog_masonry_targ_setting);
    dima_input_display_change($blog_masonry_targ_setting_target.find('input'), $blog_masonry_targ_setting);

    var $blog_related_post = [{
        val: '1',
        target: '#customize-control-dima_post_related_is_slide,' +
        '#customize-control-dima_post_related_is_slide,' +
        '#customize-control-dima_post_related_count,' +
        '#customize-control-dima_post_related_columns'
    }];
    dima_customizer_initial_display($blog_related_post_target.find('input:checked'), $blog_related_post);
    dima_customizer_change_display($blog_related_post_target.find('input'), $blog_related_post);

    /*Shop*/
    var $shop_product_tabs = [{
        val: '1',
        target: '#customize-control-dima_shop_description_tap_display,' +
        '#customize-control-dima_shop_info_tap_display,' +
        '#customize-control-dima_shop_reviews_tap_display'
    }];
    dima_customizer_initial_display($shop_product_tabs_target.find('input:checked'), $shop_product_tabs);
    dima_customizer_change_display($shop_product_tabs_target.find('input'), $shop_product_tabs);

    var $shop_product_trelated = [{
        val: '1',
        target: '#customize-control-dima_shop_related_product_columns,' +
        '#customize-control-dima_shop_related_product_count'
    }];
    dima_customizer_initial_display($shop_product_trelated_target.find('input:checked'), $shop_product_trelated);
    dima_customizer_change_display($shop_product_trelated_target.find('input'), $shop_product_trelated);


    var $shop_product_upsell = [{
        val: '1',
        target: '#customize-control-dima_shop_cart_columns,' +
        '#customize-control-dima_shop_cart_count'
    }];
    dima_customizer_initial_display($shop_product_upsell_target.find('input:checked'), $shop_product_upsell);
    dima_customizer_change_display($shop_product_upsell_target.find('input'), $shop_product_upsell);


    var $shop_product_cross = [{
        val: '1',
        target: '#customize-control-dima_shop_upsells_columns,' +
        '#customize-control-dima_shop_upsells_count'
    }];
    dima_customizer_initial_display($shop_product_cross_target.find('input:checked'), $shop_product_cross);
    dima_customizer_change_display($shop_product_cross_target.find('input'), $shop_product_cross);


    /*--Breaking News--*/
    var $news_display_setting = [{
        val: '1',
        target: '#customize-control-dima_news_title,' +
        '#customize-control-dima_news_count,' +
        '#customize-control-dima_news_animation,' +
        '#customize-control-dima_news_title_bg,' +
        '#customize-control-dima_news_title_text_color,' +
        '#customize-control-dima_news_text_bg,' +
        '#customize-control-dima_news_text_color,' +
        '#customize-control-dima_news_cat_list,' +
        '#customize-control-dima_news_tag_list,' +
        '#customize-control-dima_news_query'
    }];
    dima_customizer_initial_display($news_display_setting_target.find('input:checked'), $news_display_setting);
    dima_customizer_change_display($news_display_setting_target.find('input'), $news_display_setting);

    var $news_query_cat_targ_setting = [{
        val: 'categorie',
        target: '#customize-control-dima_news_cat_list,' +
        'label[for="customize-control-dima_news_cat_list"]'
    }];
    dima_customizer_initial_display($news_query_cat_targ_setting_target.find('input:checked'), $news_query_cat_targ_setting);
    dima_customizer_change_display($news_query_cat_targ_setting_target.find('input'), $news_query_cat_targ_setting);

    var $news_query_tags_targ_setting = [{
        val: 'tag',
        target: '#customize-control-dima_news_tag_list,' +
        'label[for="customize-control-dima_news_tag_list"]'
    }];
    dima_customizer_initial_display($news_query_cat_targ_setting_target.find('input:checked'), $news_query_tags_targ_setting);
    dima_customizer_change_display($news_query_cat_targ_setting_target.find('input'), $news_query_tags_targ_setting);


    var $opengraph_setting = [{
        val: '1',
        target: '#customize-control-dima_opengraph_image'
    }];
    dima_customizer_initial_display($opengraph_setting_target.find('input:checked'), $opengraph_setting);
    dima_customizer_change_display($opengraph_setting_target.find('input'), $opengraph_setting);

    var $navbar_offset = [{
        val: 'fixed-top-offset',
        target: '#customize-control-dima_header_navbar_offset_by_id,' +
        '#customize-control-dima_header_navbar_offset_by_px'
    }];
    dima_customizer_initial_display($control_dima_header_navbar_position_target.find('input:checked'), $navbar_offset);
    dima_customizer_change_display($control_dima_header_navbar_position_target.find('input'), $navbar_offset);


    var $model = $('#customize-control-dima_header_navbar_position');
    var $navbar_animation = [{
        val: ["static-top", "fill-width", "floating"],
        target: '#customize-control-dima_header_navbar_animation,' +
        '#customize-control-dima_logo_position'
    }];
    dima_customizer_initial_display($model.find('input:checked'), $navbar_animation);
    dima_customizer_change_display($model.find('input'), $navbar_animation);

    var $related_projects = $('#customize-control-dima_projects_related_display');
    var $_related_projects = [{
        val: "1",
        target: '#customize-control-dima_projects_related_columns,' +
        '#customize-control-dima_projects_related_count,' +
        '#customize-control-dima_projects_related_style,' +
        '#customize-control-dima_projects_related_img_hover,' +
        '#customize-control-dima_projects_related_border,' +
        '#customize-control-dima_projects_related_elm_hover'
    }];
    dima_customizer_initial_display($related_projects.find('input:checked'), $_related_projects);
    dima_customizer_change_display($related_projects.find('input'), $_related_projects);

    var $menu_tran = $Navbar_Transparent;
    var $_menu_tran = [{
        val: "1",
        target: '#customize-control-dima_transparent_navbar_background_color,' +
        '#customize-control-dima_transparent_navbar_text_color'
    }];
    dima_customizer_initial_display($menu_tran.find('input:checked'), $_menu_tran);
    dima_customizer_change_display($menu_tran.find('input'), $_menu_tran);

    var $_menu_position = $Navbar_position;
    var $menu_position = [{
        val: "logo-on-top",
        target: '#customize-control-dima_logo_on_top_background_color'
    }];
    dima_customizer_initial_display($_menu_position.find('input:checked'), $menu_position);
    dima_customizer_change_display($_menu_position.find('input'), $menu_position);


    var $_demos = [{
        val: "okab",
        target: '#customize-control-dima_dark_style'
    }];
    dima_customizer_initial_display($demos.find('input:checked'), $_demos);
    dima_customizer_change_display($demos.find('input'), $_demos);


    function dima_customizer_initial_display(value, targets) {
        $.each(targets, function (index, item) {

            if (item.val.constructor === Array) {
                if (is_part_of_array(value.val(), item.val)) {
                    $(item.target).show()
                } else {
                    $(item.target).attr('data-hide', 'true');
                }
            } else if (item.val == value.val()) {
                $(item.target).show()
            } else {
                $(item.target).attr('data-hide', 'true');
            }
        });
    }

    // Watch Customizer Setting //
    function dima_customizer_change_display(elm, targets) {
        elm.change(function () {
            var $value = $(this).val();
            $.each(targets, function (index, item) {
                if (item.val.constructor === Array) {
                    if (is_part_of_array($value, item.val)) {
                        $(item.target).removeAttr('data-hide');
                    } else {
                        $(item.target).attr('data-hide', 'true');
                    }
                } else if (item.val == $value) {
                    $(item.target).removeAttr('data-hide');
                } else {
                    $(item.target).attr('data-hide', 'true');
                }
            });
        });
    }

    /**
     * [dima_input_display description]
     * @param  {[type]} value   [description]
     * @param  {[type]} targets [description]
     * @return {[type]}         [description]
     */
    function dima_input_display(value, targets) {
        $.each(targets, function (index, item) {
            if (item.val == value.val()) {
                $(item.target).parent().removeAttr('data-hide');
            } else {
                $(item.target).parent().attr('data-hide', 'true');
            }
        });
    }

    function dima_input_display_change(elm, targets) {
        elm.change(function () {
            var $value = $(this).val();
            $.each(targets, function (index, item) {
                if (item.val == $value) {
                    $(item.target).parent().removeAttr('data-hide');
                } else {
                    $(item.target).parent().attr('data-hide', 'true');
                }
            });
        });
    }

    // Check if a value  exists in an array.
    function is_part_of_array(elmOnTheTable, table) {
        for (var i in table) {
            if (table[i] === elmOnTheTable) {
                return true;
            }
        }
        return false;
    }

    var $font_id_target = '#accordion-section-dima_customizer_section_typography select';

    // Target select whene get change //
    var $fontSelect = $($font_id_target);
    $fontSelect.each(function () {
        show_font_weights($(this));
        //show_font_subsets($(this));
    }).change(function () {
        show_font_weights($(this));
        //show_font_subsets($(this));
    });

    $font_body_target.find('input').change(function () {
        $fontSelect.each(function () {
            show_font_weights($(this));
        });
    });

    //  Show Font Weights depend on the font name  //
    function show_font_weights(select) {
        var _id = select.data('customize-setting-link').replace(/font/, 'weights');
        var _font = $('option:selected', select).val();
        var _font_OS = 'Open Sans';
        //Thoses font not included in google font api yet
        var _arabic_font = ['Noto Naskh Arabic', 'Noto Kufi Arabic', 'Noto Nastaliq Urdu', 'Droid Arabic Naskh', 'Droid Arabic Kufi', 'Lateef'];
        //valu
        var _font_weights_list = "";
        var _def_font_weights = _wpCustomizeSettings.settings.dima_navbar_font_and_weight_list.transport[_font_OS].variants;

        if (jQuery.inArray(_font, _arabic_font) === -1) {
            _font_weights_list = _wpCustomizeSettings.settings.dima_navbar_font_and_weight_list.transport[_font].variants;
        }

        var _isCustomFontChecked = $font_body_target.find('input[value="1"]').is(':checked');
        if (_isCustomFontChecked) {
            $('#customize-control-' + _id + ' .dima-multicheck').each(function () {
                var $this = $(this);
                if (!is_part_of_array($this.val(), _font_weights_list)) {
                    $this.parent().addClass('dima-customize-disabled');
                    $this.attr("disabled", true);
                } else {
                    $this.parent().removeClass('dima-customize-disabled');
                    $this.removeAttr("disabled");
                }
            });
        } else {
            $('#customize-control-' + _id + ' .dima-multicheck').each(function () {
                var $this = $(this);
                if (!is_part_of_array($this.val(), _def_font_weights)) {
                    $this.parent().attr('data-hide', 'true');
                } else {
                    $this.parent().removeAttr('data-hide');
                }
            });
        }
    }

    //  Show Font subsets depend on the font name  //
    /*function show_font_subsets(select) {
     var _id = select.data('customize-setting-link').replace(/font/, 'subsets');
     var _font = $('option:selected', select).val();
     //Thoses font not included in google font api yet
     //var _arabic_font = ['Noto Naskh Arabic', 'Noto Kufi Arabic', 'Noto Nastaliq Urdu', 'Droid Arabic Naskh', 'Droid Arabic Kufi', 'Lateef'];
     var _variants = "";
     //if (jQuery.inArray(_font, _arabic_font) === -1) {
     _variants = _wpCustomizeSettings.settings.dima_navbar_font_and_weight_list.transport[_font].subsets;
     // }

     $('#customize-control-' + _id + ' .dima-multicheck').each(function () {
     var $this = $(this);
     if (!is_part_of_array($this.val(), _variants)) {
     $this.parent().addClass('dima-customize-disabled');
     $this.attr("disabled", true);
     } else {
     $this.parent().removeClass('dima-customize-disabled');
     $this.removeAttr("disabled");
     }
     });
     }*/

    // add description into the controler  //
    function dima_customizer_separator(elm) {
        var subTitle = '<li class="customize-control dima-customize-control-subtitle">' +
            '<span class="dima-customize-subtitle">' +
            '</span>' +
            '</li>';

        $('#customize-control-' + elm).before(subTitle);

    }

    //dima_customizer_separator('dima_body_weights_list');
    dima_customizer_separator('dima_navbar_text_uppercase');
    dima_customizer_separator('dima_heading_text_uppercase');
    dima_customizer_separator('dima_logo_text_uppercase');
    dima_customizer_separator('dima_logo_position');
    dima_customizer_separator('dima_navbar_background_color');
    dima_customizer_separator('dima_transparent_navbar_background_color');
    dima_customizer_separator('dima_navbar_topbar');
    dima_customizer_separator('dima_news_display');
    dima_customizer_separator('dima_footer_bottom');
    dima_customizer_separator('dima_shop_layout');
    dima_customizer_separator('dima_shop_product_tap_display');
    dima_customizer_separator('dima_shop_related_products_display');
    dima_customizer_separator('dima_heading_text_style');
    dima_customizer_separator('dima_logo_text_style');
    dima_customizer_separator('dima_navbar_text_style');
    dima_customizer_separator('dima_iphone_icon');
    dima_customizer_separator('dima_open_graph_meta_tag');


    /*Font Style*/
    $('span.dima_customize_font_style').click(function () {
        var list_checkbox = $(this).find('input');
        $(this).toggleClass('dima_font_style_checkbox');
        if (list_checkbox.is(':checked')) {
            list_checkbox.prop('checked', false);
        } else {
            list_checkbox.prop('checked', true);
        }
        list_checkbox.change();
    });

    $('input.dima_font_style_checkbox[type=checkbox]').live('change', function () {

        var $_this = $(this),
            $options_list = $_this.closest('span').siblings('input.dima_customize_font_style_list'),
            value = $_this.val(),
            current_val = $options_list.val(),
            values = ( current_val != 'false' ) ? current_val.split('|') : [],
            query = $.inArray(value, values),
            result = '';

        if ($_this.prop('checked') == true) {

            if (current_val.length) {

                if (query < 0) {
                    values.push(value);

                    result = values.join('|');
                }
            } else {
                result = value;
            }
        } else {

            if (current_val.length !== 0) {

                if (query >= 0) {
                    values.splice(query, 1);

                    result = values.join('|');
                } else {
                    result = current_val;
                }
            }
        }

        $options_list.val(result).trigger('change');
    });

    //radio Image
    $('.customize-control-radio-image label').click(function () {
        var list_checkbox = $(this).find('input');
        $(this).parent().find('.dima_radio_image_checkbox').removeClass("dima_radio_image_checkbox");
        $(this).addClass('dima_radio_image_checkbox');
        if (list_checkbox.is(':checked')) {
            list_checkbox.prop('checked', false);
        } else {
            list_checkbox.prop('checked', true);
        }
        list_checkbox.change();
    });

    /**
     * Alpha color
     */

    $('.dima-color-control').each(function () {
        var $control = $(this), palette = null;
        //var value = $control.val().replace(/\s+/g, '');
        // Manage Palettes
        var palette_input = $control.attr('data-palette');
        if (palette_input == 'false' || palette_input == false) {
            palette = false;
        } else if (palette_input == 'true' || palette_input == true) {
            palette = true;
        } else {
            palette = $control.attr('data-palette').split(",");
        }
        $control.wpColorPicker({ // change some things with the color picker
            clear: function (event, ui) {
                // TODO reset Alpha Slider to 100
            },
            change: function (event, ui) {
                // send ajax request to wp.customizer to enable Save & Publish button
                var _new_value = $control.val();
                var key = $control.attr('data-customize-setting-link');
                wp.customize(key, function (obj) {
                    obj.set(_new_value);
                });
                // change the background color of our transparency container whenever a color is updated
                var $transparency = $control.parents('.wp-picker-container:first').find('.transparency');
                // we only want to show the color at 100% alpha
                $transparency.css('backgroundColor', ui.color.toString('no-alpha'));
            },
            palettes: palette // remove the color palettes
        });

    }); // each
});
(function ($) {
})(jQuery);