<section class="v-header-page">
    <style>
        section.v-header-page .breadcrumb-style {
            padding: 0;
            margin: 0;
        }

        section.v-header-page ul#crumbs {
            font-family: var(--primary-font);
            font-size: 15px;
            font-weight: normal;
        }

        section.v-header-page .breadcrumb-style span.current {
            font-size: 15px;
            text-transform: lowercase;
        }

        section.v-header-page .breadcrumb-style ul a {
            color: #fff;
            font-size: 14px;
            font-weight: normal;
        }

        section.v-header-page {
            background: url(<?php the_field( 'v_header_page_img', 'option' ); ?>) !important;
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
            height: 16rem;
        }

        section.v-header-page:before {
            background-color: rgb(0 0 0 / 50%);
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
            top: 0;
        }

        h2.v-header-page__title {
            font-family: var(--second-font);
            font-size: 22px;
            line-height: 24px;
            margin-bottom: 0px;
        }

        .breadcrumb-style ul a {
            font-size: 16px;
            font-weight: normal;
            color: var(--primary-color);
        }

        .breadcrumb-style span.current {
            font-size: 17px;
        }

        .v-breadcrumbs-on-page {
            background: rgb(0 0 0 / 5%);
        }

        .v-breadcrumbs-on-page .breadcrumb-style {
            margin-bottom: 0;
        }

        .v-breadcrumbs-on-page ul#crumbs {
            padding: 8px 0;
        }

        @media (max-width: 768px) {
            section.v-header-page {
                background-attachment: initial;
                height: 70px;
            }

            .v-header-page__body {
                top: 0%;
            }

            h2.v-header-page__title {
                font-size: 16px;
                margin-bottom: 0;
                display: none;
            }

            .breadcrumb-style ul a {
                font-size: 15px;
            }

            ul#crumbs {
                padding: 0px;
            }

            section.v-header-page .breadcrumb-style ul a,
            section.v-header-page .breadcrumb-style span.current {
                font-size: 14px;
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