<div class="feature">
	<div class="container">
		<div class="row">
			<?php
			$taxonomies = get_terms( array(
				'taxonomy' => 'danh-muc',
				'posts_per_page' => 1,
				'hide_empty' => false,
				'parent' => 0
			) );
			if ( !empty($taxonomies) ) :
				foreach( $taxonomies as $category ) { ?>
					<div class="col-12 col-md-6 col-lg-4">
						<?php $img_thumb = get_field('danhmuc-img', $category); ?>
						<div class="feature-item">
							<div class="feature-item__img">
								<img src="<?php echo $img_thumb['url']; ?>" alt="" >
							</div>
							<div class="feature-item__content">
								<h2><?php echo $category->name; ?></h2>
								<p><?php the_field( 'danhmuc-desc',$category); ?></p>
								<a href="<?php bloginfo('url') ?>/danh-muc/<?php echo $category->slug; ?>">Xem thêm <i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>

					</div>
					<!-- end column -->
				<?php }
			endif;
			?>
		</div>
	</div>
</div>

