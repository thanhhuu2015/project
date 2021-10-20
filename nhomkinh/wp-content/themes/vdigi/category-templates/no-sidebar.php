<div class="col-12">	

	<?php

	if ( have_posts() ) : ?>

		<div class="heading-archive">

		  <?php the_archive_title( '<h1>', '</h1>' ); ?>

	    </div>

	    <div class="blog-content">

            <div class="row">

			    <?php

				/* Start the Loop */

				while ( have_posts() ) : the_post();

					get_template_part( 'category-templates/loop/content', get_post_format() );

				endwhile; ?>

            </div>

        </div>

		<!-- Phân Trang -->

		<?php get_template_part( 'category-templates/pagination/pagination' );  ?>

		<!-- End Phân Trang -->

	<?php else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>


</div>
<!-- /.col-12 -->