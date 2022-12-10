;(function ($) {

    var darkClass = 'wp-dark-mode-active';

    var app = {

        ready: function () {
            app.handleExcludes();
            //app.initDarkmode();

            $(document).on('change', '.wp-dark-mode-switch', app.handleToggle);
            $(window).on('darkmodeInit', app.checkDarkMode);

        },

        /** initialize object holder */
        darkMode: null,

        initDarkmode: function () {
            var is_saved = sessionStorage.getItem('wp_dark_mode_frontend');

            if (1 == is_saved) {
                $('html').addClass('wp-dark-mode-active');
                app.checkDarkMode();
                $(window).trigger('darkmodeInit');
            }
        },

        /** handle dark mode toggle */
        handleToggle: function () {
            app.handleExcludes();

            $('html').toggleClass(darkClass);
            app.checkDarkMode();

            var is_saved = $(this).is(':checked') ? 1 : 0;

            sessionStorage.setItem('wp_dark_mode_frontend', is_saved);
        },

        /** check if the darkmode is active or not on initialize */
        checkDarkMode: function () {
            if ($('html').hasClass(darkClass)) {
                $('.wp-dark-mode-switch').prop('checked', true);

            } else {
                $('.wp-dark-mode-switch').prop('checked', false);
            }
        },

        handleExcludes: function () {
            $('.wp-dark-mode-ignore').find('*').addClass('wp-dark-mode-ignore');
        }

    };

    $(document).ready(app.ready);


})(jQuery);