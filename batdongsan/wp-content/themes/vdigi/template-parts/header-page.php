<section class="v-header-page">
    <style>
        section.v-header-page .breadcrumb-style {
            padding: 0;
        }
        section.v-header-page ul#crumbs {
            font-family: var(--second-font);
            font-size: 15px;
            font-weight: 400;
        }

        section.v-header-page .breadcrumb-style span.current {
            font-size: 15px;
        }

        section.v-header-page .breadcrumb-style ul a {
            color: #fff;
            font-size: 15px;
            font-weight: 400;
        }
        section.v-header-page {
            background-image: url(<?php the_field( 'v_header_page_img', 'option' ); ?>) !important;
            background-attachment: fixed;
            transition: background 0s;
            background-size: 100%;
            background-repeat: no-repeat;

            color: #FFFFFF;
            background-color: var(--primary-color);
            text-align: center;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-bottom: 0;
            overflow: hidden;
            position: relative;
            background-position: 50% 0%;
            height: 180px;
        }

        section.v-header-page:before {
            background-color: var(--primary-color);
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            position: absolute;
            pointer-events: none;
            zoom: 1;
            filter: alpha(opacity=50);
            -webkit-opacity: 0.50;
            -moz-opacity: 0.50;
            opacity: 0.50;
            content: "";
        }

        .v-header-page__body {
            position: relative;
            z-index: 1;
            top: 12%;
        }

        h2.v-header-page__title {
            font-family: var(--second-font);
            font-size: 25px;
            line-height: 24px;
            margin-bottom: 0px;
        }

        .breadcrumb-style ul a {
            font-size: 17px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .breadcrumb-style span.current {
            font-size: 17px;
        }

        @media (max-width: 768px) {
            section.v-header-page {
                background-attachment: initial;
                height: 80px;
            }

            .v-header-page__body {
                top: 0%;
            }

            h2.v-header-page__title {
                font-size: 17px;
                margin-bottom: 0;
            }

            .breadcrumb-style ul a {
                font-size: 15px;
            }

            ul#crumbs {
                padding: 0px;
            }
        }
    </style>
    <div class="container">
        <div class="v-header-page__body text-white">
            <h2 class="v-header-page__title"><?php echo $args['page_title']; ?></h2>
            <?php if (!is_search()) cat_breadcrumbs(); ?>
        </div>
    </div>

</section>