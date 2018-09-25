require('./bootstrap');

global.$ = global.jQuery = require('jquery');

jQuery(document).ready(function() {
    $('form.confirm').submit(function() {
        const text = $(this).data('confirm') || 'Sure?';

        return confirm(text);
    });
});