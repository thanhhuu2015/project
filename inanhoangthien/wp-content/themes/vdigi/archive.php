<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WP_Bootstrap_4
 */

?>

<?php get_header(); ?>

<?php
get_template_part('template-parts/header-page', '', ['page_title' => get_the_archive_title()]);
?>

    <div class="container">
        <div class="row my-5">
            <?php get_template_part('category-templates/no-sidebar', get_post_format()); ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
<?php
get_footer();
?>