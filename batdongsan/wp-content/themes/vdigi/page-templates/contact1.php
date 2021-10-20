<?php
/*
Template Name: Liên hệ 1
*/
get_header(); ?>

<?php
$args = array('page_title' => 'Liên hệ');
get_template_part('template-parts/header-page', '', $args);
?>
    <div class="contact_5">
        <div class="container">
            <div class="contact_5__top">
                <div class="left">
                    <h2>Để lại lời nhắn cho chúng tôi</h2>
                    <?php echo do_shortcode('[contact-form-7 id="260" title="Form Liên Hệ 1"]') ?>
                </div>
                <!-- end left -->
                <div class="right">
                    <h2>Liên hệ</h2>
                    <?php the_field('contact', 'options'); ?>
                </div>
                <!-- end right -->
            </div>
            <!-- end top -->
        </div>
        <div class="contact_5__bottom">
            <h2>Bản đồ</h2>
            <div class="_maps">
                <!--                    --><?php //the_field('ban_do', 'option'); ?>
                <?php get_template_part('template-parts/v-map', '', ['width' => '100%', 'height' => '400px']); ?>
            </div>
        </div>
        <!-- end bottom -->

    </div>
    <!-- end contact -->

<?php get_footer(); ?>