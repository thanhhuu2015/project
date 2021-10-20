<section class="v-service v-section-pd">
    <div class="container">
        <div class="v-block-title text-center">
            <h2 class="text-white">Dịch vụ của chúng tôi</h2>
        </div>

        <div class="v-service-body">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'v_services',
                    'posts_per_page' => 8,
                    'post_status' => 'publish',
                    'orderby' => 'post_date',
                    'order' => 'DESC', //ASC
                );

                $posts = new WP_Query($args);
                if ($posts->have_posts()):
                    ?>
                    <div class="v-project-slider owl-carousel owl-theme">
                        <?php
                        while ($posts->have_posts()):$posts->the_post();
                            $post_id = get_the_ID();
                            $post_image = get_the_post_thumbnail_url($post_id, 'full');
                            ?>
                            <div class="v-service-item">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="v-service-thumb">
                                        <img src="<?php echo $post_image; ?>" alt="<?php the_title(); ?>"
                                             loading="lazy">
                                    </div>

                                    <div class="v-service-info">
                                        <a href="<?php the_permalink(); ?>">
                                            <h3><?php echo get_the_title(); ?></h3>
                                        </a>
                                        <p><?php echo get_the_excerpt(); ?></p>
                                    </div>

                                    <div class="v-service-action text-right">
                                        <a href="<?php the_permalink(); ?>" class="v-btn-more">
                                            <i class="far fa-minus"></i>Xem thêm
                                        </a>
                                    </div>
                                </a>
                            </div> <!--/.v-service-item-->
                        <?php endwhile;
                        wp_reset_query(); ?>
                    </div> <!--/.v-project-slider-->
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>