<?php
get_header();
?>

<?php
//$current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$current_term = get_queried_object();
$args = array('page_title' => $current_term->name);
get_template_part('template-parts/header-page', '', $args);
?>
    <div class="v-tax-bds my-lg-5 my-md-5 my-5">
        <div class="container">
            <div class="v-list-terms">
                <div class="categories">
                    <div class="categories__item is-active"><?php echo $current_term->name; ?></div>
                    <?php
                    $v_bds_terms = get_terms(array(  // or get_categories    get_terms
                        'taxonomy' => 'v_category_of_bds',
                        'orderby' => 'term_id',
                        'field' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => true,
                    ));
                    foreach ($v_bds_terms as $bds_term):
                        if ($current_term->term_id != $bds_term->term_id):
                            ?>
                            <a href="/<?php echo $bds_term->slug; ?>">
                                <div class="categories__item "><?php echo $bds_term->name; ?></div>
                            </a>
                        <?php endif; endforeach; ?>
                </div>
            </div>
            <div class="row">
                <?php
                if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post();
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
                        <div class="col-lg-4 col-md-6 col-12 mb-2">
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
                                                        class="fa fa-location-arrow"></i><?php echo $v_bds_direction; ?>
                                            </p>
                                            <p class="_add"><i class="fa fa-map-marker"></i><?php echo $v_bds_local; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /. bds_item -->
                        </div> <!--end col-->
                    <?php endwhile;
                    wp_reset_query();
                    ?>
                    <div class="col-12">
                        <!-- Phân Trang -->
                        <?php get_template_part('category-templates/pagination/pagination'); ?>
                    </div>
                <?php
                else:
                    ?>
                    <div class="col-12">
                        <p>Nội dung đang được cập nhật ...</p>
                    </div>
                <?php
                endif; ?>
            </div> <!--end row-->
        </div>
    </div>

<?php
get_footer();
?>