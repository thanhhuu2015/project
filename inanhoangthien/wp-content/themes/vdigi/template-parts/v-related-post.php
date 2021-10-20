<?php
/**
 * Tham số tùy chọn giao diện (slider/col3/list)
 */
$v_style_related = $args['v_style_related'];
$v_title_related = $args['v_title_related'];
$posts_per_page = $args['posts_per_page'];

/**
 * Bài viết liên quan theo category/taxonomy
 * $tags = wp_get_post_tags(get_the_ID());  nếu cần
 */
$current_post_id = get_the_ID();
/**
 * Lấy danh sách taxonomy hiện tại post type đang dùng,
 * Lưu ý trường hợp 1 post type có nhiều register_taxonomy đi kèm
 * Vi như: 1 tin nhà đất có: danh mục, loại, tag -> khi đó hàm này sẽ lấy ra 3 loại
 * Còn trường họp này chỉ có danh mục của nó và thẻ tag nên tối đa là 2 taxonomy
 * -> ta cần bỏ post_tag đi, chỉ lấy tin thuộc danh mục thôi
 */
$post_taxonomies = get_the_taxonomies($current_post_id);

$args = array(
    'post_type' => $post_type,
    'post_status' => 'publish',
    'posts_per_page' => $posts_per_page,
    'orderby' => 'DESC',
    'post__not_in' => array($current_post_id),
);

if ($post_taxonomies){
    if (count($post_taxonomies) > 1) {
        unset($post_taxonomies['post_tag']); // Xóa các post type không cần lấy, lưu ý
    }
    $post_taxonomy = array_keys($post_taxonomies)[0];
    $post_type = get_post_type($current_post_id);
    $post_terms = wp_get_post_terms($current_post_id, $post_taxonomy, array('fields' => 'ids'));

    $args = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'orderby' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => $post_taxonomy,
                'field' => 'id',
                'terms' => $post_terms
            )
        ),
        'post__not_in' => array($current_post_id),
    );
}

$related_posts = new WP_Query($args);
if ($related_posts->have_posts() && $v_style_related != false ) :?>

    <div class="v-single-related">
        <h3 class="v-related-title"><?php echo $v_title_related; ?></h3>

        <div class="v-related-body">
            <?php if ($v_style_related == 'list'): ?>

                <div class="v-related-list">
                    <ul>
                        <?php while ($related_posts->have_posts()) : $related_posts->the_post();
                            $post_id = get_the_ID();
                            $post_image = get_the_post_thumbnail_url($post_id, 'full');
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div> <!--end v-related-list-->

            <?php elseif ($v_style_related == 'col3'): ?>

                <div class="v-related-col-3">
                    <div class="row">
                        <?php while ($related_posts->have_posts()) : $related_posts->the_post();
                            $post_id = get_the_ID();
                            $post_image = get_the_post_thumbnail_url($post_id, 'full');
                            ?>
                            <div class="col-lg-4 col-md-6 col-12 mb-4">
                                <div class="v-related-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="v-related-img">
                                            <img src="<?php echo $post_image; ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <div class="v-related-content">
                                            <h3 class="v-related-title"><?php the_title(); ?></h3>
                                            <div class="v-related-decs">
                                                <p><?php the_excerpt(); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div> <!--end v-related-item-->
                            </div> <!--end col-->
                        <?php endwhile; ?>
                    </div>
                </div> <!--end v-related-col3-->

            <?php elseif ($v_style_related == 'slider'): ?>

                <div class="v-related-slider">
                    <div class="owl-carousel owl-theme" id="owl-single-related">
                        <?php if ($related_posts->have_posts()):
                            while ($related_posts->have_posts()):$related_posts->the_post();
                                $post_id = get_the_ID();
                                $post_image = get_the_post_thumbnail_url($post_id, 'full');
                                ?>
                                <div class="v-related-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="v-related-img">
                                            <img src="<?php echo $post_image; ?>" alt="<?php the_title(); ?>">
                                        </div>
                                        <div class="v-related-content">
                                            <h3 class="v-related-title"><?php the_title(); ?></h3>
                                            <div class="v-related-decs">
                                                <p><?php the_excerpt(); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div> <!--end v-related-item-->
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div> <!--end v-related-slider-->

            <?php endif; ?>
        </div>
    </div>
<?php endif;
wp_reset_query(); ?>