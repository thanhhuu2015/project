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
<div class="archive-product">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 d-none d-lg-block">
				<div class="product-sidebar">
					<?php get_template_part( 'includes/sidebar-product' ); ?>
					<?php get_template_part( 'sidebar' ); ?>
				</div>
			</div>
			<!-- /.col-lg-3 -->
			<div class="col-lg-9 col-12">
				<?php if (have_posts()) : ?>

					<div class="blog-content">
						<div class="row">
							<?php while (have_posts()) : the_post(); ?>
								<!-- Begin: Nội dung blog -->
								<div class="col-6 col-lg-4">
									<div class="single-product">
										<div class="post__item">
											<div class="post__item__img">
												<a href="<?php the_permalink(); ?>">
													<?php if ( has_post_thumbnail() ) { ?>
														<img src="<?php the_post_thumbnail_url(); ?>" alt="">
													<?php } else { ?>
														<img src="<?php bloginfo('url'); ?>/wp-content/themes/wp-gooweb/assets/images/default-thumbnail.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
													<?php } ?>
												</a>
											</div>
											<!-- end images -->
											<div class="post__item__content">
												<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
												<div class="price"><span>Giá: </span> <strong><?php
												$price = get_field( 'price-product' );
												if(!$price){
													echo 'Liên Hệ';
												}
												else{
													echo $price;
												}
												?></strong></div>
											</div>
											<!-- end content -->
										</div>
									</div>

								</div>
							<?php endwhile; ?>
						</div>
						<!-- Phân Trang -->
						<?php get_template_part('category-templates/pagination/pagination'); ?>
						<!-- End Phân Trang -->
					<?php else :
						get_template_part('template-parts/content', 'none');
					endif; ?>
				</div>
			</div>
			<!-- /.col-lg-9 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</div>
<?php get_footer();  ?>