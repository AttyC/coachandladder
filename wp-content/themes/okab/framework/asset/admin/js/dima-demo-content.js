jQuery(function ($) {

    $("#dima-demo-submit").find(".standard").live('click', function (e) {
        var _timeOutA = 10;
        var _timeOutB = 20;
        var _timeOutC = 25;
        var selected_demo = jQuery(this).data('demo-name');
        var demo_required = "";
        var loading, Importer;

        loading = function () {
            this.$el = $(this.context);
            this.$message = this.$el.find(".dima-progress-title");
        };

        Importer = function () {
        };
        /**
         * Display message depend on the demo name
         */
        switch (selected_demo) {
            case "okab":
                demo_required = DimaDemoAlert.msg_okab;
                break;
            case "business":
                demo_required = DimaDemoAlert.msg_business;
                break;
            case "business_rtl":
                demo_required = DimaDemoAlert.msg_business_rtl;
                break;
            case "construction":
                demo_required = DimaDemoAlert.msg_construction;
                break;
            case "restaurant":
                demo_required = DimaDemoAlert.msg_restaurant;
                break;
            case "shop":
                demo_required = DimaDemoAlert.msg_shop;
                break;
            case "hosting":
                demo_required = DimaDemoAlert.msg_hosting;
                break;
            case "magazine":
                demo_required = DimaDemoAlert.msg_magazine;
                break;
            case "minimal_blog":
                demo_required = DimaDemoAlert.msg_minimal_blog;
                break;
            case "photography":
                demo_required = DimaDemoAlert.msg_photography;
                break;
            case "app":
                demo_required = DimaDemoAlert.msg_app;
                break;
            case "minimal_portfolio":
                demo_required = DimaDemoAlert.msg_minimal_portfolio;
                break;
            default:
                demo_required = "";
        }

        //noinspection JSUnresolvedVariable
        DimaAdminConfirm("error", DimaDemoAlert.msg_warning + "<br>" + demo_required + DimaDemoAlert.msg_conferm, function () {
            Importer.init();
        });

        $.extend(Importer.prototype, {
            init: function () {
                this.data = {
                    action: 'dima_import_demo',
                    demo_type: selected_demo,
                    attempts: 1
                };
                this.StartImport();
            },

            StartImport: function () {

                loading.start();

                //noinspection JSUnresolvedVariable
                loading.message(DimaDemoAlert.msg_working);

                this.ImportProcess(function (response) {
                    //alert("DONE");
                    if (response.success === false)
                        return this.failure(response.data.message, response);
                    loading.complete();
                    $('#dima-demo-submit').prop('disabled', false);

                }.bind(this));

            },

            ImportProcess: function (success) {
                jQuery.post(ajaxurl, this.data, success).fail(function () {

                    loading.message(this.timeOutAlert(this.data.attempts + 1));

                    if (this.data.attempts >= _timeOutC) {
                        //noinspection JSUnresolvedVariable
                        return this.failure(DimaDemoAlert.msg_fail);
                    }
                    this.ImportProcess(success);
                }.bind(this));
            },

            complete: function () {
                loading.complete();
                $("#dima-demo-submit").prop("disabled", !1)
            },

            failure: function (message) {
                loading.fail(message);
                $("#dima-demo-submit").prop("disabled", !1);
            },

            timeOutAlert: function (attempts) {
                //console.log("Time");
                if (attempts > _timeOutB)
                //noinspection JSUnresolvedVariable
                    return DimaDemoAlert.msg_timeoutC;
                if (attempts > _timeOutA)
                //noinspection JSUnresolvedVariable
                    return DimaDemoAlert.msg_timeoutB;
                //noinspection JSUnresolvedVariable
                return DimaDemoAlert.msg_timeoutA;
            }
        });


        //Loading
        $.extend(loading.prototype, {
            context: '<div class="dima-main-progress">'
            + '<div class="dima-progress-warp">'
            + '<div class="dima-progress-content">'
            + '<div class="dima-progress-title"></div>'
            + '<div class="dima-progress-bar-outer">'
            + '<div class="dima-progress-bar-inner"></div>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '</div>',
            start: function () {
                //noinspection JSUnresolvedVariable
                this.message(DimaDemoAlert.msg_start);
                $('.pixeldima-demo-wrap').prepend(this.$el);
            },
            message: function (message) {
                this.$message.html(message)
            },

            complete: function () {
                //noinspection JSUnresolvedVariable
                this.message(DimaDemoAlert.msg_complete);
                setTimeout(function () {
                    this.$el.addClass("done");
                    this.close();
                }.bind(this), 400)
            },
            fail: function (message) {
                this.message(message);
                this.close();
            },
            close: function () {
                this.$el.delay(1500).fadeOut(250);
                setTimeout(function () {
                    this.$el.detach().removeClass("done").show();
                    this.message("")
                }.bind(this), 2e3)
            }
        });
        loading = new loading;
        Importer = new Importer;

        e.preventDefault();
    });

});