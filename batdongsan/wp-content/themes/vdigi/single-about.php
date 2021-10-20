<?php

/*

 * Template Name: Giới Thiệu

 * Template Post Type: post

 */

get_header(); ?>

<?php
$args = array('page_title' => get_the_title());
get_template_part('template-parts/header-page', '', $args);
?>

<?php while (have_posts()) : the_post(); ?>

    <section class="post__about v-p">
        <div class="container">
            <div class="row">
                <div class="col-12 my-lg-5 my-md-4 my-3">
                    <div class="about__post__content v-font-site-base">
                        <?php the_content(); ?>
                    </div>
                    <?php get_template_part('template-parts/social'); ?>
                </div> <!-- end col 12 -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>