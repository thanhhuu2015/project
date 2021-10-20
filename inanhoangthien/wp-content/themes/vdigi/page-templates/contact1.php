<?php
/*
Template Name: Liên hệ 1
*/
get_header(); ?>

<?php get_template_part('template-parts/header-page', '', ['page_title' => 'Liên hệ']); ?>

    <div class="contact_5">
        <div class="container">
            <div class="contact_5__top">
                <div class="left">
                    <h2>Để lại lời nhắn cho chúng tôi</h2>
                    <?php echo do_shortcode('[contact-form-7 id="228" title="Form Liên Hệ 2"]') ?>
                </div>
                <!-- end left -->
                <div class="right">
                    <h2>Liên hệ</h2>
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
                            <?php if ($dien_thoai = get_field('dien_thoai', 'options')): ?>
                                <p>
                                    Điện thoại: <?php the_field('dien_thoai', 'options'); ?>
                                </p>

                            <?php endif; ?>
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
                    <h2>Hỗ trợ 24/7</h2>
                </div>
                <!-- end right -->
            </div>
            <!-- end top -->
        </div>
    </div>
    <!-- end contact -->

<?php get_footer(); ?>