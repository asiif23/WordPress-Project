(function(){

    jQuery(document).ready(function() {
        /* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */

        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('.scrollup').fadeIn();
            } else {
                jQuery('.scrollup').fadeOut();
            }
        });
        
        jQuery('.scrollup').click(function () {
            jQuery("html, body").animate({
                scrollTop: 0
            }, 700);
            return false;
        });

        /* ---------------------------------------------- /*
    * SLIDER
    /* ---------------------------------------------- */
        jQuery('.sliderhome').owlCarousel({
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            smartSpeed: 1000,
            items:1,
            navElement: 'div',
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
        }) 
    });
})(jQuery);