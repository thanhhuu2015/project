<section class="blogs v-pt-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blogs-block">
                    <div class="_title_home">
                        <h2>Phong thủy</h2>
                    </div>
                    <div class="blogs-block-top">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'post_status' => 'publish',
                            'orderby' => 'post_date',
                            'order' => 'DESC', //ASC
                            'tax_query' => array( // query in taxonomy
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'term_id',
                                    'terms' => 28,
                                )
                            ));
                        $posts = new WP_Query($args);

                        if ($posts->have_posts()):
                            while ($posts->have_posts()):$posts->the_post();
                                $post_id = get_the_ID();
                                $post_image = get_the_post_thumbnail_url($post_id, 'full');
                                $post_date = get_the_date('d/m/Y', $post_id);
                                ?>
                                <div class="blogs-block-top-content">
                                    <a href="<?php the_permalink(); ?>" class="blogs-block-top-content-link">
                                        <img loading="lazy" src="<?php echo $post_image; ?>"
                                             alt="<?php echo get_the_title(); ?>">
                                    </a>
                                    <div class="blogs-block-top-content-label">
                                        <h3 class="blogs-block-top-content-label-title">
                                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                        </h3>
                                        <p class="blogs-block-top-content-label-time">
                                            <span><?php echo $post_date; ?></span>
                                        </p>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_query(); ?>
                        <?php endif; ?>
                    </div>
                    <!-- end block top -->
                    <div class="blogs-block-bottom">
                        <ul class="blogs-block-bottom-list">
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'offset' => 1,
                                'post_status' => 'publish',
                                'orderby' => 'post_date',
                                'order' => 'DESC', //ASC
                                'tax_query' => array( // query in taxonomy
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'term_id',
                                        'terms' => 28,
                                    )
                                ));
                            $posts = new WP_Query($args);

                            if ($posts->have_posts()):
                                while ($posts->have_posts()):$posts->the_post();
                                    $post_id = get_the_ID();
                                    $post_image = get_the_post_thumbnail_url($post_id, 'full');
                                    $post_date = get_the_date('d/m/Y', $post_id);
                                    ?>
                                    <li class="blogs-block-bottom-list-item">
                                        <div class="blogs-block-bottom-list-item__img">
                                            <a href="<?php the_permalink(); ?>" class="blogs-block-top-content-link">
                                                <img loading="lazy" src="<?php echo $post_image; ?>"
                                                     alt="<?php echo get_the_title(); ?>">
                                            </a>
                                        </div>
                                        <div class="blogs-block-bottom-list-item__content">
                                            <h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                            </h4>
                                            <p><span><?php echo $post_date; ?></span></p>
                                        </div>
                                    </li>
                                <?php endwhile;
                                wp_reset_query(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- end block bottom -->
                    <div class="blogs-block-action">
                        <a href="/phong-thuy" class="v-btn-more">xem tất cả</a>
                    </div>
                    <!-- end btn -->
                </div>
            </div>
            <!-- PHONG THỦY -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="blogs-block">
                    <div class="_title_home">
                        <h2>Nổi bật</h2>
                    </div>
                    <div class="blogs-block-top">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 1,
                            'post_status' => 'publish',
                            'orderby' => 'post_date',
                            'order' => 'DESC', //ASC
                            'tax_query' => array( // query in taxonomy
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'term_id',
                                    'terms' => 29,
                                )
                            ));
                        $posts = new WP_Query($args);

                        if ($posts->have_posts()):
                            while ($posts->have_posts()):$posts->the_post();
                                $post_id = get_the_ID();
                                $post_image = get_the_post_thumbnail_url($post_id, 'full');
                                $post_date = get_the_date('d/m/Y', $post_id);
                                ?>
                                <div class="blogs-block-top-content">
                                    <a href="<?php the_permalink(); ?>" class="blogs-block-top-content-link">
                                        <img loading="lazy" src="<?php echo $post_image; ?>"
                                             alt="<?php echo get_the_title(); ?>">
                                    </a>
                                    <div class="blogs-block-top-content-label">
                                        <h3 class="blogs-block-top-content-label-title">
                                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                        </h3>
                                        <p class="blogs-block-top-content-label-time">
                                            <span><?php echo $post_date; ?></span>
                                        </p>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_query(); ?>
                        <?php endif; ?>
                    </div>
                    <!-- end block top -->
                    <div class="blogs-block-bottom">
                        <ul class="blogs-block-bottom-list">
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'offset' => 1,
                                'post_status' => 'publish',
                                'orderby' => 'post_date',
                                'order' => 'DESC', //ASC
                                'tax_query' => array( // query in taxonomy
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'term_id',
                                        'terms' => 29,
                                    )
                                ));
                            $posts = new WP_Query($args);

                            if ($posts->have_posts()):
                                while ($posts->have_posts()):$posts->the_post();
                                    $post_id = get_the_ID();
                                    $post_image = get_the_post_thumbnail_url($post_id, 'full');
                                    $post_date = get_the_date('d/m/Y', $post_id);
                                    ?>
                                    <li class="blogs-block-bottom-list-item">
                                        <div class="blogs-block-bottom-list-item__img">
                                            <a href="<?php the_permalink(); ?>" class="blogs-block-top-content-link">
                                                <img loading="lazy" src="<?php echo $post_image; ?>"
                                                     alt="<?php echo get_the_title(); ?>">
                                            </a>
                                        </div>
                                        <div class="blogs-block-bottom-list-item__content">
                                            <h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                            </h4>
                                            <p><span><?php echo $post_date; ?></span></p>
                                        </div>
                                    </li>
                                <?php endwhile;
                                wp_reset_query(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- end block bottom -->
                    <div class="blogs-block-action">
                        <a href="/noi-bat" class="v-btn-more">Xem tất cả</a>
                    </div>
                    <!-- end btn -->
                </div>
            </div>
            <!-- NỔI BẬT -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="blogs-block">
                    <div class="_title_home">
                        <h2>Tổng hợp</h2>
                    </div>
                    <div class="blogs-block-bottom">
                        <ul class="blogs-block-bottom-list">
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 5,
                                'post_status' => 'publish',
                                'orderby' => 'post_date',
                                'order' => 'DESC', //ASC
                                'tax_query' => array( // query in taxonomy
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'term_id',
                                        'terms' => 30,
                                    )
                                ));
                            $posts = new WP_Query($args);

                            if ($posts->have_posts()):
                                while ($posts->have_posts()):$posts->the_post();
                                    $post_id = get_the_ID();
                                    $post_image = get_the_post_thumbnail_url($post_id, 'full');
                                    $post_date = get_the_date('d/m/Y', $post_id);
                                    ?>
                                    <li class="blogs-block-bottom-list-item">
                                        <div class="blogs-block-bottom-list-item__img">
                                            <a href="<?php the_permalink(); ?>" class="blogs-block-top-content-link">
                                                <img loading="lazy" src="<?php echo $post_image; ?>"
                                                     alt="<?php echo get_the_title(); ?>">
                                            </a>
                                        </div>
                                        <div class="blogs-block-bottom-list-item__content">
                                            <h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                            </h4>
                                            <p><span><?php echo $post_date; ?></span></p>
                                        </div>
                                    </li>
                                <?php endwhile;
                                wp_reset_query(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- end block bottom -->
                </div>
            </div>
            <!-- TỔNG HỢP -->
        </div>
    </div>
</section>