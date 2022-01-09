(function ($, api) {
    'use strict';

    jQuery(function () {

        var $body = jQuery('body'), $document = jQuery(document);

        $document.on('click', '#corposet-header-menu-li', function () {
            var $this = jQuery(this);
            api.preview.send($this.attr('data-customizer-event'));
        });

        $document.on('click', '#corposet-footer-widget-to-add', function () {
            var $this = jQuery(this);
            api.preview.send($this.attr('data-customizer-event'));
        });
        
        
    });

}(jQuery, wp.customize));

