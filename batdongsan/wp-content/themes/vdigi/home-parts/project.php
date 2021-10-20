<section class="_project v-pt-section">
    <div class="container">
        <div class="_title_home">
            <a href="/du-an"><h2>Dự án bất động sản đất nền</h2></a>
        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'v_bds',
                'posts_per_page' => 1,
                'post_status' => 'publish',
                'orderby' => 'post_date',
                'order' => 'DESC', //ASC
                'tax_query' => array( // query in taxonomy
                    array(
                        'taxonomy' => 'v_category_of_bds',
                        'field' => 'term_id',
                        'terms' => 26,
                    )
                ));
            $posts = new WP_Query($args);

            if ($posts->have_posts()):
                while ($posts->have_posts()):$posts->the_post();
                    $post_id = get_the_ID();
                    $post_image = get_the_post_thumbnail_url($post_id, 'full');
                    $v_bds_price = get_field('v_bds_price', $post_id);
                    $v_bds_acreage = get_field('v_bds_acreage', $post_id);
                    $v_bds_direction = get_field('v_bds_direction', $post_id);
                    $v_bds_local = get_field('v_bds_local', $post_id);
                    $v_bds_album = get_field('v_bds_album', $post_id);
                    $taxonomy_names = wp_get_object_terms($post_id, 'v_category_of_bds');
                    $taxonomy_name = $taxonomy_names[0]->name;;
                    foreach ($taxonomy_names as $key => $item) {
                        if ($item->term_id == '27') {
                            unset($taxonomy_names[$key]);
                            $taxonomy_name = $taxonomy_names[1]->name;
                            break;
                        }
                    }
                    ?>
                    <div class="col-md-6 col-12">
                        <div class="bds_item bds_large">
                            <div class="bds_item_inner">
                                <div class="_thumb_bds">
                                    <a href="<?php the_permalink(); ?>">
                                        <img loading="lazy" src="<?php echo $post_image; ?>"
                                             alt="<?php echo get_the_title(); ?>">
                                    </a>
                                </div>
                                <div class="_content_bds">
                                    <span class="_cat_bds"><?php echo $taxonomy_name; ?></span>
                                    <h3 class="_title_bds">
                                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                    </h3>
                                    <div class="_info_bds">
                                        <div class="_price_bds">
                                            <span><?php echo $v_bds_price; ?></span>
                                            <span>| <?php echo $v_bds_acreage; ?>m2</span>
                                        </div>
                                        <p class="_location"><i
                                                    class="fa fa-location-arrow"></i><?php echo $v_bds_direction; ?></p>
                                        <p class="_add"><i class="fa fa-map-marker"></i><?php echo $v_bds_local; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                <?php endwhile;
                wp_reset_query(); ?>
            <?php endif; ?>
            <div class="col-md-6 col-12">
                <div class="owl-carousel owl-theme" id="owl-project">
                    <?php
                    $args = array(
                        'post_type' => 'v_bds',
                        'posts_per_page' => 10,
                        'offset' => 1,
                        'post_status' => 'publish',
                        'orderby' => 'post_date',
                        'order' => 'DESC', //ASC
                        'tax_query' => array( // query in taxonomy
                            array(
                                'taxonomy' => 'v_category_of_bds',
                                'field' => 'term_id',
                                'terms' => 26,
                            )
                        ));
                    $posts = new WP_Query($args);

                    if ($posts->have_posts()):
                        while ($posts->have_posts()):$posts->the_post();
                            $post_id = get_the_ID();
                            $post_image = get_the_post_thumbnail_url($post_id, 'full');
                            $v_bds_price = get_field('v_bds_price', $post_id);
                            $v_bds_acreage = get_field('v_bds_acreage', $post_id);
                            $v_bds_direction = get_field('v_bds_direction', $post_id);
                            $v_bds_local = get_field('v_bds_local', $post_id);
                            $v_bds_album = get_field('v_bds_album', $post_id);
                            $taxonomy_names = wp_get_object_terms($post_id, 'v_category_of_bds');
                            $taxonomy_name = $taxonomy_names[0]->name;;
                            foreach ($taxonomy_names as $key => $item) {
                                if ($item->term_id == '27') {
                                    unset($taxonomy_names[$key]);
                                    $taxonomy_name = $taxonomy_names[1]->name;
                                    break;
                                }
                            }
                            ?>
                            <div class="bds_item bds_small">
                                <div class="bds_item_inner">
                                    <div class="_thumb_bds">
                                        <a href="<?php the_permalink(); ?>">
                                            <img loading="lazy" src="<?php echo $post_image; ?>"
                                                 alt="<?php echo get_the_title(); ?>">
                                        </a>
                                    </div>
                                    <div class="_content_bds">
                                        <span class="_cat_bds"><?php echo $taxonomy_name; ?></span>
                                        <h3 class="_title_bds">
                                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                        </h3>
                                        <div class="_info_bds">
                                            <div class="_price_bds">
                                                <span><?php echo $v_bds_price; ?></span>
                                                <span>| <?php echo $v_bds_acreage; ?>m2</span>
                                            </div>
                                            <p class="_location"><i
                                                        class="fa fa-location-arrow"></i><?php echo $v_bds_direction; ?>
                                            </p>
                                            <p class="_add"><i class="fa fa-map-marker"></i><?php echo $v_bds_local; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>