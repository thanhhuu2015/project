<?php
get_header();
?>

<?php get_template_part('template-parts/header-page', null, ['page_title' => 'Sản phẩm']); ?>

    <div class="v-tax-post-type py-4">
        <div class="container">
            <div class="v-archive-block mt-5">
                <?php
                if (have_posts()) : ?>
                    <div class="row">
                        <?php while (have_posts()) : the_post();
                            $post_id = get_the_ID();
                            $post_image = get_the_post_thumbnail_url($post_id, 'post-thumbnail');
                            ?>
                            <div class="col-lg-4 col-md-4 col-12">
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
                            </div>
                        <?php endwhile; ?>
                        <div class="col-12">
                            <!-- Phân Trang -->
                            <?php get_template_part('category-templates/pagination/pagination'); ?>
                        </div>
                    </div>
                <?php else :
                    get_template_part('template-parts/content', 'none');
                endif; ?>
            </div>
        </div>
    </div>
<?php
get_footer();
?>