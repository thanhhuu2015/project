<?php

/**

 * The template for displaying archive pages

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package WP_Bootstrap_4

 */

get_header(); ?>
<?php cat_breadcrumbs() ?>
<div class="banner-top">
	<img src="<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/home/bg-02.jpg" alt="">
	<div class="heading-archive">
		<h1 class="title_main"><span> <?php the_archive_title() ?></span></h1>
	</div>
</div>


<div class="archive-page">	
	<div class="container">
		<div class="row">
		    <?php get_template_part( 'category-templates/one-column', get_post_format() );  ?>	
		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

</div>

<?php get_footer();  ?>