jQuery(document).ready(function($) {


    jQuery(window).load(function() {
        setTimeout(()=>{
            jQuery("#ct-loadding").hide();
        },1100)
    });




// 
const relatePostContent = jQuery('._related__post .row').text().length;
if(relatePostContent < 30){
    jQuery('._related__post').hide();
}
// active menu
let listItem = jQuery('#mega-menu-menu-1 > li');
listItem.append('<span class="active-menu"></span>');


    // 
    jQuery('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
    });
    jQuery('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        arrows: true,
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });


    // Stick Menu

    jQuery(window).scroll(function() {



        var scroll = jQuery(window).scrollTop();

        if (scroll >= 300) {

            jQuery(".header__menu").addClass("fixed");

            jQuery(".header__mobile").addClass("fixed");

        } else {

            jQuery(".header__menu").removeClass("fixed");

            jQuery(".header__mobile").removeClass("fixed");

        }



    });



    // Back To Top

    var offset = 300,

    offset_opacity = 1200,

    scroll_top_duration = 700,

    jQueryback_to_top = jQuery('.cd-top');

    jQuery(window).scroll(function() {

        (jQuery(this).scrollTop() > offset) ? jQueryback_to_top.addClass('cd-is-visible'): jQueryback_to_top.removeClass('cd-is-visible cd-fade-out');

        if (jQuery(this).scrollTop() > offset_opacity) {

            jQueryback_to_top.addClass('cd-fade-out');

        }

    });

    //smooth scroll to top

    jQueryback_to_top.on('click', function(event) {

        event.preventDefault();

        jQuery('body,html').animate({

            scrollTop: 0,

        }, scroll_top_duration

        );

    });



    // Test OWL

    jQuery("#owl-spnb").owlCarousel({

        loop: true,

        autoplay: true,

        autoplayTimeout: 4000,

        autoplayHoverPause: true,

        responsive: {

            0: {

                items: 1

            },

            600: {

                items: 2,

                nav: false

            },

            1000: {

                items: 4,

                nav: true

            }

        },

        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]

    });



});