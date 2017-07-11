jQuery(document).ready(function ($) {

    var $pluginEnable = $('#dima_uc_enable');
    var $pluginSettings = $('#meta-box-settings');

    $pluginEnable.change(function () {
        if ($pluginEnable.is(':checked')) {
            $pluginSettings.show();
        } else {
            $pluginSettings.hide();
        }
    });

});

jQuery(document).ready(function ($) {

    $('#submit').click(function () {
        $(this).addClass('saving').val('Updating');
    });

    $('.wp-color-picker').wpColorPicker();
});