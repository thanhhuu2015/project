jQuery(document).ready(function ($) {
    /**
     * Check home page
     */
    const checkHome = window.location.href;
    // const siteCheck = vSiteUrl + '/home/';
    const siteCheck = vSiteUrl + '/';
    // if (checkHome == siteCheck) {
    //     $('.v-header-main').removeClass('d-lg-block');
    //     $('.v-header-main').removeClass('d-xl-block')
    // }

    jQuery("img").attr('loading', 'lazy');

    /**
     * Stick Menu
     */
    jQuery(window).scroll(function () {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 300) {
            jQuery(".header__menu").addClass("fixed");
            jQuery(".header__mobile").addClass("fixed");
        } else {
            jQuery(".header__menu").removeClass("fixed");
            jQuery(".header__mobile").removeClass("fixed");
        }
    });

    /**
     * Back To Top
     */
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

    /**
     * Smooth scroll to top
     */
    jQueryback_to_top.on('click', function (event) {
        event.preventDefault();
        jQuery('body,html').animate({
                scrollTop: 0,
            }, scroll_top_duration
        );
    });

    /**
     * Menu mobile
     */
    $(".hamburger-menu").on("click", menuMobile); //Menu mobile
    $(".js-open-cate").on("click", openCate);   // Sub menu mobile
    $(".has-drop-ft").on("click", dropFooterMb);  // Menu Footer mobile

    function menuMobile() {
        $(".hamburger-menu .bar").toggleClass("animate"),
            $(".drop-mb").hasClass("active") ?
                (
                    $(".drop-mb").removeClass("active"),
                        $(".drop-mb").slideUp(function () {
                            $("html,body").css({
                                overflow: "auto"
                            })
                        })) :
                (
                    $(".drop-mb").addClass("active"),
                        $(".drop-mb").slideDown(function () {
                            $("html,body").css({
                                overflow: "hidden"
                            })
                        })
                )
    }

    function openCate() {
        var isSlide = !1;
        var o = $(this);
        return isSlide || (isSlide = !0, o.hasClass("active") ? (o.removeClass("active"),
                $(".ct-list-cate").stop(!0, !0).slideUp(function () {
                    isSlide = !1
                })) :
            (o.addClass("active"),
                $(".ct-list-cate").stop(!0, !0).slideDown(function () {
                    isSlide = !1
                }))), window.addEventListener("click", function (o) {
            (isSlide = !0, closeCate()) || isSlide || document.getElementById("cateMenu").contains(o.target)
        }), !1
    }

    function closeCate() {
        $(".js-open-cate").removeClass("active"),
            $(".ct-list-cate").stop(!0, !0).slideUp(function () {
                isSlide = !1
            })
    }

    function dropFooterMb() {
        $(window).innerWidth() < 824 && ($(this).hasClass("active") ? ($(this).removeClass("active"),
            $(this).next().stop(!0, !0).slideUp(200)) : ($(".has-drop-ft").removeClass("active"),
            $(".top-ft-content .ct ul").stop(!0, !0).slideUp(200),
            $(this).addClass("active"),
            $(this).next().stop(!0, !0).slideDown(200)))
    }

    /**
     * ================ SLIDER ===================
     */
    jQuery(".v-project-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        },
        navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>']
    });

    jQuery("#v-video-slider").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        items: 3,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 3,
            }
        },
        navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>']
    });

    jQuery('.v-video-item').each(function (i, el) {
        if (i === 0) {
            var video_id = $(this).data('id').split('v=')[1];
            var url = 'https://www.youtube.com/embed/' + video_id;
            $('#v-video-show iframe').attr('src', url);
        }
    });
    // Lấy Thumbnail Đầu Tiên Làm Default
    jQuery('.v-video-item').click(function () {
        var video_id = $(this).data('id').split('v=')[1];
        // console.log(video_id);
        var url = 'https://www.youtube.com/embed/' + video_id;
        $('#v-video-show iframe').attr('src', url);
    });
    // Get ID Youtube Khi Click Item và Set ID src iframe

    jQuery(".v-news-slider").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                margin: 0,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 2,
            }
        },
        navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>']
        // navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });

    jQuery(".v-testimonial-list").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3500,
        autoplayHoverPause: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
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
        navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>']
    });

});

/**
 * Mở video bằng js: Video about
 */
jQuery(".v-js-video-play").on("click", openVideoHome);
var playerCrs;

function openVideoHome() {
    jQuery("#playerCrs").remove();
    var e = $(this).attr("data").split('v=')[1];

    function o(e) {
        e.target.playVideo()
    }

    function n(e) {
        0 === e.data && ($(".slide-video .item span").fadeIn(), $("#playerCrs").remove());
        $('.v-js-video-play').css({'display': 'block', 'z-index': '2'});
    }

    return $(this).fadeOut(), $(this).parent().append('<div id="playerCrs"></div>'), 0 < $("#playerCrs").length && (
        player = new YT.Player("playerCrs", {
            width: "100%",
            height: "310px",
            videoId: e,
            playerVars: {rel: 0, showinfo: 0, autoplay: 1, controls: 1},
            // playerVars: {
            //     'autoplay': 1,
            //     'controls': 0,
            //     'autohide': 1,
            //     'wmode': 'opaque',
            //     'origin': 'http://hoangthienbox.vdigi.vn/'
            // },
            events: {onReady: o, onStateChange: n}
        })), !1
}

function loadScriptPlayYoutube() {
    if (typeof (YT) == 'undefined' || typeof (YT.Player) == 'undefined') {
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }
}

jQuery(function () {
    loadScriptPlayYoutube();
})