<section class="_related__post">
  <div class="_related__post__title">
    <h2><span>Tin liên quan</span></h2>
  </div>
  <!-- end title -->
  <div class="_related__post__content">
    <div class="row">
      <?php
      $terms = get_the_terms( $post->ID , 'category');
      $term_ids = wp_list_pluck($terms,'term_id');
      $second_query = new WP_Query( array(
        'post_type' => 'post',
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field' => 'id',
            'terms' => $term_ids,
            'operator'=> 'IN'
          )),
        'posts_per_page' => 4,
        'ignore_sticky_posts' => 1,
        'orderby' => 'rand',
        'post__not_in'=>array($post->ID)
      ) );

      if ( wp_is_mobile() ) {
        $second_query = new WP_Query( array(
          'post_type' => 'post',
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'id',
              'terms' => $term_ids,
              'operator'=> 'IN'
            )),
          'posts_per_page' => 2,
          'ignore_sticky_posts' => 1,
          'orderby' => 'rand',
          'post__not_in'=>array($post->ID)
        ) );
      }

      
      if($second_query->have_posts()) {
        while ($second_query->have_posts() ) : $second_query->the_post(); ?>
          <div class="col-6 col-lg-3">
            <div class="post__item">
              <div class="post__item__img">
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php the_post_thumbnail_url(); ?>">
                </a>
              </div>
              <!-- end images -->
              <div class="post__item__content">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              </div>
              <!-- end content -->
            </div>
          </div>
          <!-- end item -->
        <?php endwhile; wp_reset_query();
      }
      ?>
    </div>


  </div>

</section>


