<section class="v-product v-section-pd">
    <div class="container">
        <div class="v-block-title text-center">
            <h2>Sản phẩm của chúng tôi</h2>
        </div>

        <div class="v-product-body">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'v_products',
                    'posts_per_page' => 8,
                    'post_status' => 'publish',
                    'orderby' => 'post_date',
                    'order' => 'DESC', //ASC
                );

                $posts = new WP_Query($args);
                if ($posts->have_posts()):
                    while ($posts->have_posts()):$posts->the_post();
                        $post_id = get_the_ID();
                        $post_image = get_the_post_thumbnail_url($post_id, 'full');
                        ?>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="v-product-item">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="v-product-thumb">
                                        <img src="<?php echo $post_image; ?>" alt="<?php the_title(); ?>"
                                             loading="lazy">
                                    </div>

                                    <div class="v-product-info text-center">
                                        <a href="<?php the_permalink(); ?>">
                                            <h3><?php echo get_the_title(); ?></h3>
                                        </a>
                                    </div>
                                </a>
                            </div> <!--/.v-product-item-->
                        </div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                <?php endif; ?>
                <div class="col-12 text-center mt-2">
                    <div class="v-product-action">
                        <a href="" class="v-btn">Xem tất cả <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div> <!--/.row -->
        </div>

    </div>
</section>