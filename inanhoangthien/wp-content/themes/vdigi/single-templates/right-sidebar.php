<div class="col-lg-9 col-12 v-single-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main my-4">
            <?php while (have_posts()) : the_post(); ?>
                <h1 class="_title_single_post"><?php the_title(); ?></h1>
                <div class="single__content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; // End of the loop.	?>

            <div class="v-single-social">
                <?php get_template_part('template-parts/social'); ?>
            </div> <!-- end social -->

            <div class="v-single-real-comment">
                <?php get_template_part('template-parts/comment-fb'); ?>
            </div>

            <?php
            $post_type_name = get_post_type(get_the_ID());
            if ($post_type_name == 'post'): ?>
                <div class="v-single-related">
                    <?php get_template_part('template-parts/related-post'); ?>
                </div> <!-- end post related -->
            <?php else:
                if (get_post_type(get_the_ID()) == 'v_services') {
                    $v_title_related = 'Dịch vụ liên quan';
                } elseif ($post_type_name == 'v_products') {
                    $v_title_related = 'Sản phẩm liên quan';
                }
                get_template_part('template-parts/v-related-post', null,
                    [
                        'v_style_related' => 'col3',
                        'v_title_related' => $v_title_related,
                        'posts_per_page' => '3'
                    ]);
                ?>

            <?php endif; ?>
        </main><!-- #main -->

    </div><!-- #primary -->

</div><!-- /.col-lg-9 -->

<div class="col-lg-3 d-none d-lg-block v-single-sidebar mb-2">
    <?php
    /**
     * latest_posts: ID chuyên mục muốn hiển thị/false (Bài viết mới nhất của chuyên mục Tin tức)
     * post_type:  Tên post type/false
     */
    get_template_part('template-parts/v-sidebar', null,
        [
            'cate_of_post_type' => [
                'title' => 'Danh mục dịch vụ',
                'taxonomy' => false, // taxonomy: tên -> show , false -> hidden
            ],
            'post_type' => [
                'title' => 'Dịch vụ nổi bật',
                'post_type' => 'v_services', // post_type: tên -> show , false -> hidden
                'posts_per_page' => 5,
            ],
            'latest_posts' => [
                'title' => 'Bài viết mới nhất',
                'term_id' => 1, // term_id: id chuyên mục post -> show , false -> hidden
                'posts_per_page' => 5,
            ],
        ]);
    ?>
</div><!-- /.col-lg-3 -->