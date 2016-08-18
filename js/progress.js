(function($) {
    "use strict";

    /**
     * Table of Contents:
     *
     * 01 - Document Ready
     * 02 - Window Load
     * 03 - Window scroll
     * 04 - Platform detect
     * 05 - collapsed menu close on click
     * 06 - collapsed menu close on click
     * 07 - menufullpage
     * 08 - Waypoint Top Nav Sticky
     * 09 - Active Menu Item on Reaching Different Sections
     * 10 - home section on scroll parallax & fade
     * 11 - on click scrool to target with smoothness
     * 12 - Scroll navigation
     * 13 - scrollToTop
     * 14 - Background Parallax
     * 15 - Team Hover Effect
     * 16 - Home Resize Fullscreen
     * 17 - lightbox popup
     * 18 - Countdown
     * 19 - Owl Carousel
     * 20 - Flex Slider
     * 21 - maximage Fullscreen Parallax Background Slider
     * 22 - progress bar / horizontal skill bar
     * 23 - pie chart / circle skill bar
     * 24 - Funfact Number Counter
     * 25 - Masonry Isotope
     * 26 - Megafolio
     * 27 - Contact Form
     * 28 - Wow initialize
     * 29 - Fit Vids
     * 30 - YT Player for Video
     * 31 - Flickr Feed
     * 32 - accordion & toggles
     * 33 - Horizontal & Vertical Tab
     * 34 - Shop Plus Minus
     * 35 - tooltip
     * 36 - Checkout Ship to different address
     * 37 - Top search toggle
     * 38 - Twitter Feed
     * 39 - Mailchimp
     * 40 - Google-map
     * 41 - toggle Google map
     * -----------------------------------------------
     */



    /* ---------------------------------------------------------------------- */
    /* -------------------- 01 - Document Ready ----------------------------- */
    /* ---------------------------------------------------------------------- */
    $(document).ready(function() {
        $(window).trigger("resize");
        escope_progress_bar();
    });



    /* ---------------------------------------------------------------------- */
    /* ----------------------- 02 - Window Load ----------------------------- */
    /* ---------------------------------------------------------------------- */
    $(window).load(function() {
        //preloader
        $("#preloader").fadeOut(500);
        
        $(window).trigger("scroll");
        $(window).trigger("resize");
       
    });

   

    /* ---------------------------------------------------------------------- */
    /* ---------------- 22 - progress bar / horizontal skill bar ------------ */
    /* ---------------------------------------------------------------------- */
    function escope_progress_bar() {
        $('.progress-bar').appear();
        $(document.body).on('appear', '.progress-bar', function() {
            $('.progress-bar').each(function() {
                if (!$(this).hasClass('appeared')) {
                    var percent = $(this).data('percent');
                    var barcolor = $(this).data('barcolor');
                    $(this).append('<span class="percent">' + percent + '%' + '</span>');
                    $(this).css('background-color', barcolor);
                    $(this).css('width', percent + '%');
                    $(this).addClass('appeared');
                }
            });
        });
        $('.progress-bar-aa').each(function() {
            if (!$(this).hasClass('appeared')) {
                var percent = $(this).data('percent');
                var barcolor = $(this).data('barcolor');
                $(this).append('<span class="percent">' + percent + '%' + '</span>');
                $(this).css('background-color', barcolor);
                $(this).css('width', percent + '%');
                $(this).addClass('appeared');
            }
        });

    }

})(jQuery);