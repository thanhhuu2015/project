<section class="v-news v-section-pd">
    <div class="container">
        <div class="v-news-body">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="v-news-left">
                        <div class="v-block-title">
                            <h2>Chia sẽ kiến thức</h2>
                        </div>

                        <div class="v-news-list">
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 2,
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
                                    <div class="v-news-item">
                                        <div class="v-news-item-img">
                                            <a href="<?php the_permalink(); ?>">
                                                <img loading="lazy" src="<?php echo $post_image; ?>"
                                                     alt="<?php echo get_the_title(); ?>">
                                            </a>
                                        </div>

                                        <div class="v-news-item-info">
                                            <a href="<?php the_permalink(); ?>">
                                                <h4><?php echo get_the_title(); ?></h4>
                                            </a>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                            <div class="v-news-meta">
                                                <p><i class="fas fa-user"></i>Hoàng Thiện</p>
                                            </div>
                                        </div>
                                    </div> <!-- /. v-news-item-->
                                <?php endwhile;
                                wp_reset_query(); ?>
                            <?php endif; ?>

                            <div class="v-news-action text-lg-right text-center">
                                <a href="" class="v-btn">Xem thêm <i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-12">
                    <div class="v-video">
                        <div class="v-block-title">
                            <h2>Video</h2>
                        </div>

                        <div class="v-video-list">
                            <div id="v-video-show">
                                <iframe width="100%" src="" frameborder="0" allowfullscreen=""></iframe>
                            </div>
                            <div id="v-video-list">
                                <div id="v-video-slider" class="owl-carousel">
                                    <?php if (have_rows('vhome_video', 'option')) : ?>
                                        <?php while (have_rows('vhome_video', 'option')) : the_row(); ?>
                                            <?php if (get_sub_field('vhome_video_img')): ?>
                                                <div class="v-video-item"
                                                     data-id=" <?php the_sub_field('vhome_video_link'); ?>">
                                                    <img src="<?php the_sub_field('vhome_video_img'); ?>" class="w100"
                                                         alt="Video về chúng tôi">
                                                </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!--/. row-->
    </div> <!--/. v-news-body-->
    </div>
</section>