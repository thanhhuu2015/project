<div class="product cuanhomkinh">
	<div class="container">
		<div class="page-title">
			<h2>Cửa nhôm kính</h2>
		</div>
		<!-- end title -->
		<div class="product-content">
			<div class="row">
				<?php
				$vnkings = new WP_Query(array(
					'post_type'=>'san-pham',
					'post_status'=>'publish',
					'orderby' => 'ID',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'danh-muc',
							'field' => 'id',
							'terms' => 26,
						)),
					'order' => 'DESC',
					'posts_per_page'=> 3));
					?>
					<?php while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
						<div class="col-6 col-lg-4">
							<div class="post__item">
								<div class="post__item__img">
									<a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) { ?>
											<img src="<?php the_post_thumbnail_url(); ?>" alt="">
										<?php } else { ?>
											<img src="<?php bloginfo('url'); ?>/wp-content/themes/wp-gooweb/assets/images/default-thumbnail.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
										<?php } ?>
									</a>
									<a href="<?php the_permalink(); ?>" class="post-btn">Chi tiết <i class="fa fa-angle-right"></i></a>
								</div>
								<!-- end images -->
								<div class="post__item__content">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</div>
								<!-- end content -->
							</div>
						</div>
					<?php endwhile ; wp_reset_query() ;
					?>
					<!-- end loop post -->
				</div>
				<div class="product-list">
					<a href="<?php bloginfo('url'); ?>/danh-muc/cua-nhom-kinh">Xem tất cả</a>
				</div>
			</div>
		</div>
	</div>