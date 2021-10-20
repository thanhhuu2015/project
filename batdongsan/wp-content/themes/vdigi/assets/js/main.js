jQuery(document).ready(function ($) {


    // Stick Menu

    jQuery(window).scroll(function () {


        var scroll = jQuery(window).scrollTop();

        if (scroll >= 300) {

            jQuery(".header__main").addClass("fixed");

            jQuery(".header__mobile").addClass("fixed");

        } else {

            jQuery(".header__main").removeClass("fixed");

            jQuery(".header__mobile").removeClass("fixed");

        }


    });


    // Back To Top

    var offset = 300,

        offset_opacity = 1200,

        scroll_top_duration = 700,

        jQueryback_to_top = jQuery('.cd-top');

    jQuery(window).scroll(function () {

        (jQuery(this).scrollTop() > offset) ? jQueryback_to_top.addClass('cd-is-visible') : jQueryback_to_top.removeClass('cd-is-visible cd-fade-out');

        if (jQuery(this).scrollTop() > offset_opacity) {

            jQueryback_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top

    jQueryback_to_top.on('click', function (event) {

        event.preventDefault();

        jQuery('body,html').animate({

                scrollTop: 0,

            }, scroll_top_duration
        );

    });

    // Search mobile
    $(".v-header-right__search_icon").click(function () {
        if ($(".v-form-search").hasClass('active')) {
            $(".v-form-search").removeClass('active');
        } else {
            $(".v-form-search").addClass('active');
        }
    });


    // Test OWL

    jQuery("#owl-feature").owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: true
            }
        },
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });

    jQuery("#owl-project").owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        nav: false,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1,
            },
            1000: {
                items: 2,
            }
        },
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });

    jQuery("#owl-brand").owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeout: 4000,
        dots: false,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2
            },
            600: {

                items: 4,

                nav: false

            },

            1000: {

                items: 6,

                nav: true

            }

        },

        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]

    });

    jQuery("#owl-single-related").owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: true
            }
        },
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });

    function sliderSingleBds() {
        var sync1 = $("#v-owl-bds-sub");
        var sync2 = $("#v-owl-bds-thumb");
        var syncedSecondary = true;

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: false,
            autoplay: true,
            dots: false,
            loop: false,
            responsiveRefreshRate: 200,
        }).on('changed.owl.carousel', syncPosition);

        sync2.on('initialized.owl.carousel', function () {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
            .owlCarousel({
                items: 4,
                margin: 10,
                dots: false,
                nav: true,
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: 4,
                responsiveRefreshRate: 100,
                responsive: {
                    0: {
                        items: 3
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    },
                },
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            //if you set loop to false, you have to restore this next line
            //var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            //end block

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function (e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });
    }

    sliderSingleBds();
});