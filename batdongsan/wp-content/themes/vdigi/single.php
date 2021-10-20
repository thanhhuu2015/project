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

<?php
$args = array('page_title' => get_the_title());
get_template_part('template-parts/header-page', '', $args);
?>

    <div class="container">
        <div class="row my-lg-5 my-md-4 my-3">
            <?php get_template_part( 'single-templates/right-sidebar', get_post_type() ); ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
<?php

get_footer();

