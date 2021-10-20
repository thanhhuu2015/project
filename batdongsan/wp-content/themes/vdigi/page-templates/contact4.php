<?php
/*
Template Name: Liên hệ 4
*/
get_header(); ?>

<?php
$args = array('page_title' => 'Liên hệ');
get_template_part('template-parts/header-page', '', $args);
?>

<div class="contact_4">
    <div class="container mt-lg-5 mt-md-4 mt-4">

        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="contact_title"><h1>Liên hệ</h1></div>

                <ul class="content_contact">
                    <li>
                        <div class="title_content">
                            <h5><i class="fa fa-home" aria-hidden="true"></i>Địa chỉ</h5>
                        </div>
                        <span><?php the_field('dia_chi', 'options'); ?></span>
                    </li>

                    <li>
                        <div class="title_content">
                            <h5>
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                Điện thoại
                            </h5>
                        </div>

                        <p>Hotline:
                            <?php the_field('hotline', 'options'); ?>

                        </p>
                        <p>
                            Điện thoại: <?php the_field('dien_thoai', 'options'); ?>
                        </p>
                    </li>

                    <li>
                        <div class="title_content">
                            <h5><i class="fas fa-envelope" aria-hidden="true"></i>Email</h5>
                        </div>
                        <p>
                            <?php the_field('email', 'options'); ?>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8 offset-lg-1 col-md-12">
                <div class="contact_title"><h1>Để lại lời nhắn</h1></div>

                <div class="form__contact">
                    <?php echo do_shortcode('[contact-form-7 id="9" title="Form liên hệ"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/v-map', '', ['width' => '100%', 'height' => '400px']); ?>
</div>
<?php get_footer(); ?>
<style>
    .contact_title h1 {
        font-family: var(--third-font);
        color: var(--second-color);
        margin-bottom: 2.5rem;
    }

    .contact_4 .title_content {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: end;
        -ms-flex-align: end;
        align-items: flex-end;
        margin-bottom: 1rem;
    }

    .contact_4 .title_content i {
        margin-right: 1rem;
        font-size: 16px;
    }

    .contact_4 .title_content h5 {
        font-size: 16px;
        color: var(--primary-color);
        margin: 0;
    }

    ul.content_contact li span {
        font-size: 15px;
        color: var(--primary-color);
        font-family: var(--second-font);
    }

    ul.content_contact {
        list-style: none;
        padding: 0;
    }

    ul.content_contact li {
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        position: relative;
    }

    ul.content_contact li:after {
        position: absolute;
        content: '';
        height: 1px;
        width: 100%;
        background: #3333;
        top: 100%;
        left: 0;
    }

    ul.content_contact li:last-child:after {
        content: none;
    }

    ul.content_contact li p {
        font-size: 15px;
        color: var(--primary-color);
        font-family: var(--second-font);
        line-height: 24px;
        margin: 0;
    }

    /*end contact info*/

    /*form*/

    .wpcf7-form-control-wrap {
        width: 100%;
    }

    .contact_4 .form__contact .group_input {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: .2rem;
        align-items: baseline;
    }
    .contact_4 .form__contact .group_input label {
        width: 40%;text-transform: initial;
        font-size: 16px;
    }

    .contact_4 .form__contact .group_input {
        margin-bottom: 2.5rem;
    }

    .contact_4 .form__contact .group_input input,.contact_4 .form__contact .group_input select{
        height: 4.5rem;
        outline: unset;
    }

    .contact_4 .form__contact .group_input input ,.contact_4 .form__contact .group_input select{
        width: 100%;
        border: 1px solid #3333;
        font-size: 15px;
        font-family: var(--primary-font);
    }


    .contact_4 .form__contact .group_input span:first-child input {
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
        padding-left: 1rem;
        border-right: 0;
    }

    .contact_4 .form__contact .group_input span:last-child input {
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
        padding-left: 1rem;
    }

    .contact_4 .form__contact  input.wpcf7-form-control.vfrom-text {
        font-family: var(--primary-font);
        width: 100%;
        font-size: 15px;
        border: 1px solid #3333;
        height: 4.5rem;
        padding-left: 1rem;
        border-radius: 5px;
    }

    .contact_4 .form__contact input.wpcf7-form-control.wpcf7-submit {
        width: 40%;
        border: unset;
        border-radius: 5px;
        height: 4.5rem;
        font-family: var(--second-font);
        text-transform: uppercase;
        color: #fff;
        background: var(--second-color);
        margin-top: 30px;
    }

    .contact_4 .form__contact {
        margin-bottom: 30px;
    }
    .contact_4 .form__contact .v-form-submit input[type="submit"] {
        margin: 0;
    }

    .contact_4 iframe {
        width: 100%;
        margin-bottom: -7px;
    }

    /*---------------- TABLET RESPONSIVE ------------------*/
    @media (max-width: 768px) {
        .contact_4 .form__contact .group_input label {
            width: 60%;
        }
        .contact_4__item .row > div {
            margin-bottom: 3rem;
        }

        .contact_4 input.wpcf7-form-control.wpcf7-submit {
            margin-bottom: 3rem;
        }

    }


    /*---------------- MOBILE RESPONSIVE ------------------*/
    @media (max-width: 575px) {
        ._maps iframe {
            height: 20rem;
        }

        .contact_4__item h3 {
            font-size: 2rem;
        }

        .form_contact_3__row .left {
            margin-right: 1rem;
        }

        .form_contact_3__row .left input {
            font-size: 1.4rem;
        }
    }
</style>