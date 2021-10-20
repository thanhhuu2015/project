<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_4
 */
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/header-page', '', ['page_title' => get_the_title()]); ?>
    <div class="v-single-page">
        <div class="container">
            <div class="row py-lg-5 py-md-4 py-3">
                <?php get_template_part('single-templates/right-sidebar', get_post_type()); ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
<?php get_footer(); ?>