<section class="v-main-banner">
    <div class="v-main-slider">
        <div class="v-ovl"></div>
        <div class="container">
            <div class="v-slider-action">
                <div class="v-slider-action-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="v-slider-desc">
                                <span>Bất động sản đất nền</span>
                                <h3>Bình Dương</h3>
                            </div>
                            <div class="v-slider-form">
                                <form role="search" method="get" class="search-form"
                                      action="<?php echo home_url('/'); ?>">
                                    <div class="v-cate-choose">
                                        <input type="checkbox" id="form-dat-nen" name="cat" value="dat-nen" checked>
                                        <label for="form-dat-nen">Đất nền</label>
                                        <input type="checkbox" id="form-du-an" name="cat" value="du-an">
                                        <label for="form-du-an">Dự án</label>
                                    </div>
                                    <div class="v-key-form">
                                        <input type="text" name="s" placeholder="Nhập nội dung tìm kiếm ..."/>
                                        <!--  <input type="hidden" name="post_type" value="v_bds">-->
                                        <!--  <input type="hidden" name="taxonomy" value="v_category_of_bds">-->
                                        <input type="submit" value="Tìm kiếm"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo get_template_directory_uri() . '/assets/js/slider/jssor.slider.min.js' ?>"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('.v-slider-form input[type="checkbox"]').on('change', function () {
                    $('.v-slider-form input[name="' + this.name + '"]').not(this).prop('checked', false);
                });
            });

            window.jssor_1_slider_init = function () {
                var jssor_1_SlideshowTransitions = [{
                    $Duration: 500,
                    $Delay: 30,
                    $Cols: 8,
                    $Rows: 4,
                    $Clip: 15,
                    $SlideOut: false,
                    $Formation: $JssorSlideshowFormations$.$FormationStraightStairs,
                    $Assembly: 2049,
                    $Easing: $Jease$.$OutQuad
                },
                    {
                        $Duration: 500,
                        $Delay: 80,
                        $Cols: 8,
                        $Rows: 4,
                        $Clip: 15,
                        $SlideOut: false,
                        $Easing: $Jease$.$OutQuad
                    },
                    {
                        $Duration: 1000,
                        x: -0.2,
                        $Delay: 40,
                        $Cols: 12,
                        $SlideOut: false,
                        $Formation: $JssorSlideshowFormations$.$FormationStraight,
                        $Assembly: 260,
                        $Easing: {
                            $Left: $Jease$.$InOutExpo,
                            $Opacity: $Jease$.$InOutQuad
                        },
                        $Opacity: 2,
                        $Outside: false,
                        $Round: {
                            $Top: 0.5
                        }
                    },
                    {
                        $Duration: 2000,
                        y: -1,
                        $Delay: 60,
                        $Cols: 15,
                        $SlideOut: false,
                        $Formation: $JssorSlideshowFormations$.$FormationStraight,
                        $Easing: $Jease$.$OutJump,
                        $Round: {
                            $Top: 1.5
                        }
                    },
                    {
                        $Duration: 1200,
                        x: 0.2,
                        y: -0.1,
                        $Delay: 20,
                        $Cols: 8,
                        $Rows: 4,
                        $Clip: 15,
                        $During: {
                            $Left: [0.3, 0.7],
                            $Top: [0.3, 0.7]
                        },
                        $Formation: $JssorSlideshowFormations$.$FormationStraightStairs,
                        $Assembly: 260,
                        $Easing: {
                            $Left: $Jease$.$InWave,
                            $Top: $Jease$.$InWave,
                            $Clip: $Jease$.$OutQuad
                        },
                        $Round: {
                            $Left: 1.3,
                            $Top: 2.5
                        }
                    }
                ];

                var jssor_1_options = {
                    $AutoPlay: 1,
                    $Idle: 2000,
                    $SlideEasing: $Jease$.$InOutSine,
                    $DragOrientation: 3,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$,
                        $SpacingX: 16,
                        $SpacingY: 16
                    }
                };

                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                //make sure to clear margin of the slider container element
                jssor_1_slider.$Elmt.style.margin = "";

                /*#region responsive code begin*/

                /*
                    parameters to scale jssor slider to fill parent container

                    MAX_WIDTH
                        prevent slider from scaling too wide
                    MAX_HEIGHT
                        prevent slider from scaling too high, default value is original height
                    MAX_BLEEDING
                        prevent slider from bleeding outside too much, default value is 1
                        0: contain mode, allow up to 0% to bleed outside, the slider will be all inside parent container
                        1: cover mode, allow up to 100% to bleed outside, the slider will cover full area of parent container
                        0.1: flex mode, allow up to 10% to bleed outside, this is better way to make full window slider, especially for mobile devices
                */

                var MAX_WIDTH = 1920;
                var MAX_HEIGHT = 1080;
                var MAX_BLEEDING = 1;

                function ScaleSlider() {
                    var containerElement = jssor_1_slider.$Elmt.parentNode;
                    var containerWidth = containerElement.clientWidth;

                    if (containerWidth) {
                        var originalWidth = jssor_1_slider.$OriginalWidth();
                        var originalHeight = jssor_1_slider.$OriginalHeight();

                        var containerHeight = containerElement.clientHeight || originalHeight;

                        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
                        var expectedHeight = Math.min(MAX_HEIGHT || containerHeight, containerHeight);

                        //scale the slider to expected size
                        jssor_1_slider.$ScaleSize(expectedWidth, expectedHeight, MAX_BLEEDING);

                        //position slider at center in vertical orientation
                        jssor_1_slider.$Elmt.style.top = ((containerHeight - expectedHeight) / 2) + "px";

                        //position slider at center in horizontal orientation
                        jssor_1_slider.$Elmt.style.left = ((containerWidth - expectedWidth) / 2) + "px";
                    } else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }

                function OnOrientationChange() {
                    ScaleSlider();
                    window.setTimeout(ScaleSlider, 800);
                }

                ScaleSlider();

                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", OnOrientationChange);
                /*#endregion responsive code end*/
            };
        </script>
        <style>
            .v-main-slider {
                position: relative;
            }

            .v-slider-action {
                position: relative;
            }

            .v-slider-action-inner {
                width: 100%;
                position: absolute;
                top: 120px;
                left: 0;
                z-index: 9;
                color: #fff;
            }

            .v-slider-action span {
                font-family: var(--third-font);
                font-size: 28px;
                text-transform: uppercase;
            }

            .v-slider-action h3 {
                font-family: var(--third-font);
                text-transform: uppercase;
                font-size: 55px;
                line-height: 60px;
                margin: 5px 0 10px;
            }

            .v-slider-form .v-cate-choose {
                width: 180px;
                height: 46px;
                background: #212529bd;
                border-radius: 5px;
                margin-bottom: 20px;
            }

            .v-slider-form .v-cate-choose label {
                font-family: var(--second-font);
                font-size: 15px;
                line-height: 46px;
                text-align: center;
                color: #fff;
                border-radius: 5px;
                width: 88px;
            }

            .v-slider-form .v-cate-choose input[type=checkbox]:checked + label {
                color: var(--primary-color);
                background: #fff
            }

            .v-slider-form input[type="checkbox"] {
                display: none;
            }

            .v-slider-form .v-key-form {
                position: relative;
                display: flex;
                align-items: center;
            }

            .v-slider-form .v-key-form input[type="text"] {
                display: block;
                width: 100%;
                padding: 13px 15px;
                font-size: 15px;
                line-height: 1.5;
                background-clip: padding-box;
                outline: 0;
                box-shadow: none;
                height: 70px;
                background-color: #fff;
                color: var(--primary-color);
                border: 1px solid #fff;
                border-radius: 5px;
            }

            .v-slider-form .v-key-form input[type="submit"] {
                position: absolute;
                right: 15px;
                width: 170px;
                height: 46px;
                background-color: var(--second-color);
                font-family: var(--second-font);
                font-size: 15px;
                color: #fff;
                text-transform: uppercase;
                border: none;
                outline: 0;
                border-radius: 5px;
                cursor: pointer;
            }

            .v-slider-form input:-ms-input-placeholder { /* Internet Explorer 10-11 */
                color: #a09e9e;
            }

            .v-slider-form input::placeholder {
                color: #a09e9e;
            }


            @media (max-width: 1200px) {
                .v-main-slider {
                    height: 50vh;
                }

                .v-slider-action {
                    width: 100%;
                    top: 15%;
                    left: 0;
                }

                .v-slider-action span {
                    font-size: 16px;
                }

                .v-slider-action h2 {
                    font-size: 65px;
                    line-height: 78px;
                    margin-bottom: 10px;
                }
            }

            @media (max-width: 768px) {
                .v-main-slider {
                    height: 32vh;
                }

                .v-slider-action-inner {
                    top: 40px;
                }
            }

            @media (max-width: 767px) {
                .v-main-slider {
                    height: 40vh;
                }

                .v-slider-action-inner {
                    top: 25px;
                }

                .v-slider-desc{
                    text-align: center;
                }

                .v-slider-action h3 {
                    font-size: 35px;
                    margin: 0px 0 1px;
                }

                .v-slider-form .v-key-form input[type="text"] {
                    height: 50px;
                }

                .v-slider-form .v-key-form input[type="submit"] {
                    right: 6px;
                    width: 90px;
                    height: 36px;
                }

                .v-slider-form .v-cate-choose {
                    width: 180px;
                    height: 46px;
                    background: #212529bd;
                    border-radius: 5px;
                    margin-bottom: 15px;
                }

            }

            /* jssor slider loading skin spin css */
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            /*jssor slider bullet skin 106 css*/
            .jssorb106 {
                position: absolute;
            }

            .jssorb106 .i {
                position: absolute;
                cursor: pointer;
            }

            .jssorb106 .i .b {
                fill: #000;
                fill-opacity: 0.5;
                stroke: #fff;
                stroke-width: 1800;
                stroke-miterlimit: 10;
                stroke-opacity: 0.8;
            }

            .jssorb106 .i:hover .b {
                fill: #fff;
                fill-opacity: 1;
                stroke: #2b1908;
                stroke-opacity: 1;
            }

            .jssorb106 .iav .b {
                fill: #fff;
                fill-opacity: 1;
                stroke-width: 1800;
                stroke: #46d1d3;
                stroke-opacity: 0.6;
            }

            .jssorb106 .i.idn {
                opacity: .3;
            }

            .jssora051 {
                display: block;
                position: absolute;
                cursor: pointer;
                z-index: 12;
                display: none;
            }

            .jssora051 .a {
                fill: none;
                stroke: #fff;
                stroke-width: 360;
                stroke-miterlimit: 10;
            }

            .jssora051:hover {
                opacity: .8;
            }

            .jssora051.jssora051dn {
                opacity: .5;
            }

            .jssora051.jssora051ds {
                opacity: .3;
                pointer-events: none;
            }

            #jssor_1 {
                position: relative;
                margin: 0 auto;
                top: 0px;
                left: 0px;
                width: 1366px;
                height: 600px;
                overflow: hidden;
                visibility: hidden;
            }


            @media (max-width: 768px) {
                #jssor_1 {
                    height: 200px;
                }

                #jssor_1 img {
                    -o-object-fit: contain;
                    object-fit: contain;
                    max-height: 265px;
                }
            }
        </style>

        <div style="position:relative;top:0;left:0;width:100%;height:100%;overflow:hidden;">
            <div id="jssor_1" <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin"
                 style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;"
                     src="<?php echo IMAGE_URL; ?>/spin.svg"/>
            </div>
            <div data-u="slides"
                 style="cursor:default;position:relative;top:0px;left:0px;width:1366px;height:768px;overflow:hidden;">
                <?php if (have_rows('slider-home', 'option')) : ?>
                    <?php while (have_rows('slider-home', 'option')) : the_row();
                        $image = get_sub_field('image_slider');
                        $name = the_sub_field('v_slider_title');;
                        $link = the_sub_field('link_images'); ?>
                        <div>
                            <a href="<?php echo $link; ?>" style="z-index: 8; position: relative; ">
                                <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" title="slide-home"/>
                            </a>
                        </div>
                    <?php
                    endwhile;
                endif; ?>
            </div>
            <a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">web design</a>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb106" style="position:absolute;bottom:16px;right:16px;"
                 data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:12px;height:12px;">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="b"
                              d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                    </svg>
                </div>
            </div>
            <!-- Arrow Navigator -->
            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;"
                 data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;"
                 data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jssor_1_slider_init();
    </script>
</section>