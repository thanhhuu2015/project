	<div class="sidebar-product">
		<h3 class="sidebar-product__title">Danh mục</h3>
		<ul class="sidebar-product__list">
			<?php
			$taxonomies = get_terms( array(
				'taxonomy' => 'danh-muc',
				'posts_per_page' => 1,
				'hide_empty' => false,
				'parent' => 0
			) );
			if ( !empty($taxonomies) ) :
				foreach( $taxonomies as $category ) { ?>
					<li><a href="<?php bloginfo('url') ?>/danh-muc/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
				<?php }
			endif;
			?>
		</ul>
		<!-- list post -->
	</div>

	


