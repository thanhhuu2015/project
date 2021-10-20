<?php get_header(); ?>

<?php
$args = array('page_title' => get_the_title());
get_template_part('template-parts/header-page', '', $args);
?>
    <div class="container">
        <div class="v-single-bds-top my-lg-5 my-md-4 my-3">
            <div class="row">
                <?php if (have_posts()) :
                    $post_id = get_the_ID();
                    $post_image = get_the_post_thumbnail_url($post_id, 'full');
                    $v_bds_price = get_field('v_bds_price', $post_id);
                    $v_bds_acreage = get_field('v_bds_acreage', $post_id);
                    $v_bds_direction = get_field('v_bds_direction', $post_id);
                    $v_bds_local = get_field('v_bds_local', $post_id);
                    $v_bds_album = get_field('v_bds_album', $post_id);
                    $v_bds_desc = get_field('v_bds_desc', $post_id);
                    $taxonomy_names = wp_get_object_terms($post_id, 'v_category_of_bds');
                    $taxonomy_name = $taxonomy_names[0]->name;
                    foreach ($taxonomy_names as $key => $item) {
                        if ($item->term_id == '27') {
                            unset($taxonomy_names[$key]);
                            $taxonomy_name = $taxonomy_names[1]->name;
                            break;
                        }
                    }
                    ?>
                    <div class="col-lg-6 col-12">
                        <div class="v-gallery-bds">
                            <?php if ($v_bds_album) : ?>
                                <div id="v-owl-bds-sub" class="owl-carousel owl-theme v-gallery-bds-sub">
                                    <?php foreach ($v_bds_album as $image): ?>
                                        <div class="item">
                                            <img loading="lazy" src="<?php echo $image; ?>"
                                                 alt="<?php echo get_the_title(); ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div id="v-owl-bds-thumb" class="owl-carousel owl-theme v-gallery-bds-thumb">
                                    <?php foreach ($v_bds_album as $image): ?>
                                        <div class="item">
                                            <img loading="lazy" src="<?php echo $image; ?>"
                                                 alt="<?php echo get_the_title(); ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <img loading="lazy" src="<?php echo $post_image; ?>"
                                     alt="<?php echo get_the_title(); ?>">
                            <?php endif; ?>
                        </div> <!-- /.v-gallery-bds -->
                    </div> <!-- /.col -->

                    <div class="col-lg-6 col-12">
                        <div class="v-bds-about">
                            <div class="v-bds-title">
                                <h1><?php echo get_the_title(); ?></h1>
                            </div>
                            <div class="v-bds-info">
                                <ul>
                                    <li>
                                        <p><span>Khu vực: </span><?php echo $v_bds_local; ?></p>
                                    </li>
                                    <li>
                                        <p><span>Mức giá: </span><?php echo $v_bds_price; ?></p>
                                    </li>
                                    <li>
                                        <p><span>Diện tích: </span><?php echo $v_bds_acreage; ?>m2</p>
                                    </li>
                                    <li>
                                        <p><span>Hướng: </span><?php echo $v_bds_direction; ?></p>
                                    </li>
                                    <li>
                                        <p><span>Loại BĐS: </span><?php echo $taxonomy_name; ?></p>
                                    </li>
                                </ul>
                            </div>

                            <?php
                            if ($v_bds_desc):
                                ?>
                                <div class="v-bds-desc">
                                    <p> <?php echo $v_bds_desc; ?></p>
                                </div>
                            <?php endif; ?>
                        </div> <!-- /.v-desc-bds -->
                    </div> <!-- /.col -->
                <?php endif; ?>
            </div> <!-- /.row -->
        </div>

        <div class="v-single-bds-bottom">
            <div class="row">
                <div class="col-12">
                    <h2 class="v-single-title">Thông tin bất động sản</h2>
                    <?php the_content(); ?>
                </div>

                <div class="col-12">
                    <?php get_template_part('template-parts/social'); ?>
                    <!-- social -->
                    <?php get_template_part('template-parts/comment-fb'); ?>
                    <!-- end social -->

                    <?php
                    get_template_part('template-parts/v-related-post', null, array(
                        'v_style_related' => 'slider',
                        'v_title_related' => 'Bất động sản liên quan',
                        'posts_per_page'  => 6
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
<?php
get_footer();