<div class="col-lg-9 col-12">
    <div id="primary" class="content-area">
        <main id="main" class="site-main my-4">
            <?php while (have_posts()) : the_post(); ?>
                <h1 class="_title_single_post"><?php the_title(); ?></h1>
                <div class="single__content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; // End of the loop.	?>

            <div class="v-single-social">
                <span>Chia sẻ:</span>
                <?php get_template_part('template-parts/social'); ?>
            </div> <!-- end social -->

            <?php
            if (get_post_type(get_the_ID()) == 'v_product'):
                get_template_part('template-parts/v-related-post');

            else:
                ?>
                <div class="v-single-related">
                    <?php get_template_part('template-parts/related-post'); ?>
                </div> <!-- end post related -->
            <?php endif; ?>
        </main><!-- #main -->

    </div><!-- #primary -->

</div>

<!-- /.col-lg-9 -->

<div class="col-lg-3 d-none d-lg-block">

    <?php get_sidebar(); ?>

</div>
<!-- /.col-lg-3 -->