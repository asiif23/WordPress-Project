
(function ($, api) {
    'use strict';

    api.bind('ready', function () {

        api.previewer.bind('corposet-header-menu-event', function () {
            var corposet_header_menu_event = api.panel('nav_menus');

            if (!corposet_header_menu_event.expanded()) {
                corposet_header_menu_event.expand();
            }
        });

        api.previewer.bind('corposet-footer-sidebar-event', function () {
            var corposet_footer_sidebar_event = wp.customize.section('sidebar-widgets-footer_widget_area');

            if (!corposet_footer_sidebar_event.expanded()) {
                corposet_footer_sidebar_event.expand();
            }
        });
        
        
    });
}(jQuery, wp.customize));
