(function ($) {
    "use strict";
    // Minimal main.js from Electro template
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);
})(jQuery);
