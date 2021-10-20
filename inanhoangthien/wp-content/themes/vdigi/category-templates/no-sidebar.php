<?php
if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();
        $post_id = get_the_ID();
        $post_image = get_the_post_thumbnail_url($post_id, 'post-thumbnail');
    ?>
        <article class="col-lg-6 col-md-12 col-12">
            <div class="v-post-item">
                <div class="card mb-5">
                    <div class="row">
                        <div class="col-md-4 card-image pr-md-0">
                            <a href="<?php the_permalink(); ?>" class="v-post-archive-img">
                                <img loading="lazy" src="<?php echo $post_image; ?>" alt="<?php the_title(); ?>" >
                            </a>
                        </div>

                        <div class="col-md-8 pl-md-0">
                            <div class="card-body">
                                <h3 class="card-title card-title-style">
                                    <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                </h3>
                                <p class="card-text">
                                    <small>Đăng bởi: admin</small>
                                </p>
                                <p class="card-text card-text-style"><?php echo get_the_excerpt() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
    <div class="col-12">
        <!-- Phân Trang -->
        <?php get_template_part('category-templates/pagination/pagination'); ?>
    </div>
<?php else :
    get_template_part('template-parts/content', 'none');
endif; ?>