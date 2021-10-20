<?php
$latest_posts = $args['latest_posts'];
$post_type = $args['post_type'];
$cate_of_post_type = $args['cate_of_post_type'];
?>
<div class="v-sidebar">
    <?php if ($cate_of_post_type && $cate_of_post_type['taxonomy']):
        $posts = get_terms(array(  // or get_categories    get_terms
            'taxonomy' => $cate_of_post_type['taxonomy'],
            'orderby' => 'term_id',
            'field' => 'name',
            'order' => 'ASC',
            'hide_empty' => true,
        ));

        ?>
        <div class="v-sidebar-item">
            <h3><?php echo $cate_of_post_type['title'] ?></h3>
            <div class="v-sidebar-posts v-list">
                <?php
                foreach ($posts as $post):?>
                    <a href="/<?php echo $post->slug; ?>"><?php echo $post->name; ?></a>
                <?php endforeach;
                wp_reset_query(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($post_type['post_type']):
        $args = array(
            'post_type' => $post_type['post_type'],
            'posts_per_page' => $post_type['posts_per_page'],
            'post_status' => 'publish',
            'orderby' => 'post_date',
            'order' => 'DESC', //ASC
        );
        $posts = new WP_Query($args);
        ?>
        <div class="v-sidebar-item">
            <h3><?php echo $post_type['title'] ?></h3>
            <div class="v-sidebar-posts">
                <?php
                if ($posts->have_posts()):
                    while ($posts->have_posts()):$posts->the_post();
                        $post_id = get_the_ID();
                        $post_image = get_the_post_thumbnail_url($post_id, 'thumbnail');
                        ?>
                        <div class="v-sidebar-post">
                            <div class="v-sidebar-post-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <img loading="lazy" src="<?php echo $post_image; ?>"
                                         alt="<?php echo get_the_title(); ?>">
                                </a>
                            </div>

                            <div class="v-sidebar-post-info">
                                <a href="<?php the_permalink(); ?>">
                                    <h4><?php echo get_the_title(); ?></h4>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_query(); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($latest_posts['term_id']):
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $latest_posts['posts_per_page'],
            'post_status' => 'publish',
            'orderby' => 'post_date',
            'order' => 'DESC', //ASC
            'tax_query' => array( // query in taxonomy
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $latest_posts['term_id'],
                )
            ));
        $posts = new WP_Query($args);
        ?>
        <div class="v-sidebar-item">
            <h3><?php echo $latest_posts['title']; ?></h3>
            <div class="v-sidebar-posts">
                <?php
                if ($posts->have_posts()):
                    while ($posts->have_posts()):$posts->the_post();
                        $post_id = get_the_ID();
                        $post_image = get_the_post_thumbnail_url($post_id, 'thumbnail');
                        ?>
                        <div class="v-sidebar-post">
                            <div class="v-sidebar-post-thumb">
                                <a href="<?php the_permalink(); ?>">
                                    <img loading="lazy" src="<?php echo $post_image; ?>"
                                         alt="<?php echo get_the_title(); ?>">
                                </a>
                            </div>

                            <div class="v-sidebar-post-info">
                                <a href="<?php the_permalink(); ?>">
                                    <h4><?php echo get_the_title(); ?></h4>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif;
                wp_reset_query(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<!--/.v-sidebar-->