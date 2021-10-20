<div class="footer">
	<div class="container">
		<a href="<?php echo home_url(); ?>" class="footer-logo">
			<?php $logo = get_field('logo', 'options'); ?>
			<img src="<?php echo $logo['url']; ?>" alt="Logo Website">
		</a>
		<h2>Công ty tnhh nhôm kính tấn đạt</h2>
		<div class="footer-social">
			<?php if ( have_rows( 'social', 'option' ) ) : ?>
				<?php while ( have_rows( 'social', 'option' ) ) : the_row(); ?>
					<a href="<?php the_sub_field( 'facebook' ); ?>">
						<img src="<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/home/facebook-icon.png" alt="">
					</a>
					<a href="<?php the_sub_field( 'pinterest' ); ?>">
						<img src="<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/home/pinterest-icon.png" alt="">
					</a>
					<a href="<?php the_sub_field( 'instagram' ); ?>">
						<img src="<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/home/instagram-icon.png" alt="">
					</a>
					<a href="<?php the_sub_field( 'youtube' ); ?>">
						<img src="<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/home/youtube-icon.png" alt="">
					</a>
					<a href="<?php the_sub_field( 'twitter' ); ?>">
						<img src="<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/home/twitter-icon.png" alt="">
					</a>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="footer-add">
			<ul>
				<li><i class="fa fa-phone"></i> <?php the_field( 'dien_thoai', 'options' ); ?></li>
				<li><i class="fa fa-envelope"></i> <?php the_field( 'email', 'options' ); ?></li>
				<li><i class="fa fa-map-marker"></i> <?php the_field( 'dia_chi', 'options' ); ?></li>
			</ul>
		</div>
	</div>
</div>