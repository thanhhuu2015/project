<div class="col-12">
    <?php if (have_posts()) : ?>
        <div class="blog-content">
            <div class="list-article-content blog-posts">
                <?php while (have_posts()) : the_post(); ?>
                    <!-- Begin: Nội dung blog -->
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
                        <!-- end content -->
                    </div>
                <?php endwhile; ?>
                <!-- Phân Trang -->
                <?php get_template_part('category-templates/pagination/pagination'); ?>
                <!-- End Phân Trang -->
            <?php else :
                get_template_part('template-parts/content', 'none');
            endif; ?>
        </div>
    </div>
</div>
<!-- /.col-lg-9 -->