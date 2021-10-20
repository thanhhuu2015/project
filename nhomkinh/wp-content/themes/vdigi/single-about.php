<?php
/*
* Template Name: Giới Thiệu
* Template Post Type: post
*/
get_header();  ?>
<?php while ( have_posts() ) : the_post(); ?>
  <?php cat_breadcrumbs() ?>
  <section class="about-page">
    <div class="banner-top">
      <img src="<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/home/bg-01.jpg" alt="">
      <div class="container">
        <div class="about-page__title">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="about-page__content">
        <?php the_content(); ?>
      </div>
      <?php get_template_part( 'template-parts/social'); ?>
    </div> <!-- end container -->
  </section>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>