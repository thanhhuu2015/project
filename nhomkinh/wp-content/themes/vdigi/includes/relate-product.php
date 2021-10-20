<section class="_related__product">
  <div class="_related__post__title">
    <h2><span>Sản Phẩm Khác</span></h2>
  </div>
  <!-- end title -->
  <div class="_related__post__content">

    <div class="row">
      <?php
      $terms = get_the_terms( $post->ID , 'danh-muc');
      $term_ids = wp_list_pluck($terms,'term_id');
      $second_query = new WP_Query( array(
        'post_type' => 'san-pham',
        'tax_query' => array(
          array(
            'taxonomy' => 'danh-muc',
            'field' => 'id',
            'terms' => $term_ids,
            'operator'=> 'IN'
          )),
        'posts_per_page' => 4,
        'ignore_sticky_posts' => 1,
        'orderby' => 'rand',
        'post__not_in'=>array($post->ID)
      ) );
      if($second_query->have_posts()) {
        while ($second_query->have_posts() ) : $second_query->the_post(); ?>
          <div class="col-6 col-lg-3">
            
          <div class="single-product">
            <div class="post__item">
              <div class="post__item__img">
                <a href="<?php the_permalink(); ?>">
                  <?php if ( has_post_thumbnail() ) { ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                  <?php } else { ?>
                    <img src="<?php bloginfo('url'); ?>/wp-content/themes/wp-gooweb/assets/images/default-thumbnail.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                  <?php } ?>
                </a>
              </div>
              <!-- end images -->
              <div class="post__item__content">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <div class="price"><span>Giá: </span> <strong><?php 
                $price = get_field( 'price-product' ); 
                if(!$price){
                  echo 'Liên Hệ';
                }
                else{
                  echo $price;
                }
                ?></strong></div>

              </div>
              <!-- end content -->
            </div>
          </div>
          </div>
        <?php endwhile; wp_reset_query();
      }
      ?>
    </div>



  </div>
</section>