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

$related_posts = new WP_Query($args);
if ($related_posts->have_posts()) : ?>
    <div class="v-single-related <?php if ($v_style_related == 'slider') echo 'v-slider'; ?>">
        <h3 class="v-related-title"><?php echo $v_title_related; ?></h3>
        <div class="v-single-post-related">
            <?php if ($v_style_related == 'col3'): ?>
            <div class="row">
                <?php while ($related_posts->have_posts()) : $related_posts->the_post();
                    $post_id = get_the_ID();
                    $post_image = get_the_post_thumbnail_url($post_id, 'full');
                    ?>
                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                        <div class="v-product-item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="v-product-img">
                                    <img src="<?php echo $post_image; ?>" alt="<?php the_title(); ?>">
                                </div>
                                <div class="v-product-content">
                                    <h3 class="v-product-title"><?php the_title(); ?></h3>
                                    <div class="v-product-decs">
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> <!--end col-->
                <?php endwhile; ?>
            </div>
        </div>
        <?php elseif ($v_style_related == 'slider'): ?>
            <div class="owl-carousel owl-theme" id="owl-single-related">
                <?php if ($related_posts->have_posts()):
                    while ($related_posts->have_posts()):$related_posts->the_post();
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
                        <div class="bds_item">
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
                        </div> <!-- /. bds_item -->
                    <?php endwhile;
                    wp_reset_query(); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif;
wp_reset_query(); ?>