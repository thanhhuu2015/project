<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WP_Bootstrap_4
*/
get_header(); ?>
<?php cat_breadcrumbs() ?>
<div class="single-page single-product">
	<div class="banner-top">
		<img src="<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/home/bg-01.jpg" alt="">
		<h1 class="title_main"><span>Chi tiết sản phẩm</span></h1>
	</div>
	<div class="container">
		
		<div class="single-product__content">
			<div class="row">
				<div class="col-12 col-lg-6">
					<div class="single-product__slider">
						<div class="slider slider-for" id="sanpham-for">
							<?php $sanpham_galleary_images = get_field( 'sanpham_galleary' ); ?>
							<?php if ( $sanpham_galleary_images ) {  ?>
								<?php foreach ( $sanpham_galleary_images as $sanpham_galleary_image ): ?>
									<div class="sanpham-single__item">
										<a href="<?php echo $sanpham_galleary_image['url']; ?>" data-fancybox="gallery">
											<img src="<?php echo $sanpham_galleary_image['sizes']['thumbnail']; ?>" alt="<?php echo $sanpham_galleary_image['alt']; ?>" />
										</a>

									</div>
								<?php endforeach; ?>
							<?php } else { ?>
								<div class="sanpham_not_galleary">
									<?php if ( has_post_thumbnail() ) { ?>
										<img src="<?php the_post_thumbnail_url(); ?>" alt="">
									<?php } else { ?>
										<img src="<?php bloginfo('url'); ?>/wp-content/themes/vdigi/assets/images/default.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
									<?php } ?>
								</div>
							<?php } ?>
						</div>
						<!-- end for -->
						<div class="slider slider-nav" id="sanpham-nav">
							<?php $sanpham_galleary_images = get_field( 'sanpham_galleary' ); ?>
							<?php if ( $sanpham_galleary_images ) :  ?>
								<?php foreach ( $sanpham_galleary_images as $sanpham_galleary_image ): ?>
									<div class="sanpham-single__item">
										<img src="<?php echo $sanpham_galleary_image['sizes']['thumbnail']; ?>" alt="<?php echo $sanpham_galleary_image['alt']; ?>" />
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<!-- end nav -->
					</div>
					<!-- end slider -->
				</div>
				<div class="col-12 col-lg-6">
					<div class="single-product__description">
						<h2 class="product-title"><?php the_title(); ?></h2>
						<div class="product-price">
							<span>Giá bán: </span> <strong><?php
							$price = get_field( 'price-product' );
							if(!$price){
								echo 'Liên Hệ';
							}
							else{
								echo $price;
							}
							?></strong>
						</div>
						<div class="product-description">
							<?php the_field( 'description-product' ); ?>
						</div>
						<div class="product-add">
							<div class="product-buy">
								<?php $hotline = get_field( 'hotline', 'option' ); ?>
								<a href="tel:<?php echo preg_replace('/\s+/', '', $hotline); ?>" target="_blank">
									<img src="<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/home/muangay.png" alt="">
								</a>
							</div>
							<?php get_template_part( 'template-parts/social'); ?>
						</div>
					</div>
					<!-- end description -->
				</div>
			</div>
			<!-- end top -->
			<div class="single-product__main">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="#home" class="nav-link active" data-toggle="tab"><i class="fa fa-arrow-circle-right"></i> Nội dung chi tiết</a>
					</li>
					<li class="nav-item">
						<a href="#profile" class="nav-link" data-toggle="tab"><i class="fa fa-comment"></i> Bình luận</a>
					</li>
				</ul>
				<!-- end tab -->
				<div class="tab-content">
					<div class="tab-pane fade show active" id="home">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="_single_content">
								<?php the_content(); ?>
							</div>
						<?php endwhile; // End of the loop.	?>
					</div>
					<div class="tab-pane fade" id="profile">
						<?php get_template_part( 'template-parts/comment-fb'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php get_template_part( 'includes/relate-product'); ?>
	</div>
	<!-- /.container -->
</div>
<?php
get_footer();