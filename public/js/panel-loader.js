/**
 * Created by James on 05-11-2016.
 */


/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2015 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
$.components.register("panel", {
    api: function() {
        $(document).on('click.site.panel', '[data-toggle="panel-refresh"]', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $panel = $this.closest('.panel');

            var api = $panel.data('panel-api');
            var callback = $this.data('loadCallback');

            if ($.isFunction(window[callback])) {
                api.load(window[callback]);
            } else {
                api.load();
            }
        });
    },

    init: function(context) {
        $('.panel', context).each(function() {
            var $this = $(this);

            var isClose = false;
            var isLoading = false;
            var $loading;
            var self = this;

            var api = {
                load: function(callback) {
                    var type = $this.data('loader-type');
                    if (!type) {
                        type = 'default';
                    }

                    $loading = $('<div class="panel-loading">' +
                        '<div class="loader loader-' + type + '"></div>' +
                        '</div>');

                    $loading.appendTo($this);

                    $this.addClass('is-loading');
                    $this.trigger('loading.uikit.panel');
                    isLoading = true;

                    if ($.isFunction(callback)) {
                        callback.call(self, this.done);
                    }
                },
                done: function() {
                    if (isLoading === true) {
                        $loading.remove();
                        $this.removeClass('is-loading');
                        $this.trigger('loading.done.uikit.panel');
                    }
                },

            };

            $this.data('panel-api', api);
        });
    }
});
