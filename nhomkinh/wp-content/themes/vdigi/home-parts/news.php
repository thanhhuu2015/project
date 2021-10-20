<div class="news">
	<div class="container">
		<div class="page-title">
			<h2>Tin tức</h2>
		</div>
		<!-- end title -->
		<div class="news-content">
			<div class="row">
				<div class="col-12 col-lg-4">
					<div class="two-column">
						<?php
						$vnkings = new WP_Query(array(
							'post_type'=>'post',
							'post_status'=>'publish',
							'cat' => 1,
							'orderby' => 'ID',
							'order' => 'DESC',
							'posts_per_page'=> 2));
							?>
							<?php while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
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
										<?php the_excerpt(); ?>
									</div>
								</div>
							<?php endwhile ; wp_reset_query() ;
							?>
					</div>
					</div>
					<!-- end item -->
					<div class="col-12 col-lg-4">
						<div class="one-column">
							<?php
							$vnkings = new WP_Query(array(
								'post_type'=>'post',
								'post_status'=>'publish',
								'cat' => 1,
								'offset' => 2,
								'orderby' => 'ID',
								'order' => 'DESC',
								'posts_per_page'=> 1));
								?>
								<?php while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
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
											<?php the_excerpt(); ?>
										</div>
									</div>
								<?php endwhile ; wp_reset_query() ;
								?>
						</div>
						</div>
						<!-- end item -->
						<div class="col-12 col-lg-4">
							<div class="two-column">
								<?php
								$vnkings = new WP_Query(array(
									'post_type'=>'post',
									'post_status'=>'publish',
									'cat' => 1,
									'offset' => 3,
									'orderby' => 'ID',
									'order' => 'DESC',
									'posts_per_page'=> 2));
									?>
									<?php while ($vnkings->have_posts()) : $vnkings->the_post(); ?>
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
												<?php the_excerpt(); ?>
											</div>
										</div>
									<?php endwhile ; wp_reset_query() ;
									?>
							</div>
							</div>
						</div>
						<div class="news-btn">
							<a href="<?php bloginfo('url') ?>/tin-tuc">Xem thêm</a>
						</div>
					</div>
				</div>
			</div>