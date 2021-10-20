<section class="v-testimonial v-section-pd">
    <div class="container">
        <div class="v-block-title text-center">
            <h2>Phản hồi từ khách hàng</h2>
        </div>

        <div class="v-testimonial-inner">
            <div class="v-testimonial-list owl-carousel owl-theme">
                <?php if (have_rows('vhome_testimonial', 'option')) : ?>
                    <?php while (have_rows('vhome_testimonial', 'option')) : the_row(); ?>
                        <div class="v-testimonial-item">
                            <div class="v-testimonial-item-inner text-center">
                                <div class="v-testimonial-content">
                                    <p><?php the_sub_field('vhome_testimonial_content'); ?></p>
                                    <i class="fas fa-quote-right"></i>
                                </div>
                                <div class="v-testimonial-info">
                                    <img class="v-testimonial-thumb"
                                         src="<?php the_sub_field('vhome_testimonial_avata'); ?>"/>

                                    <h4 class="v-testimonial-name"><?php the_sub_field('vhome_testimonial_name'); ?></h4>
                                </div>
                            </div>

                        </div> <!-- /.v-testimonial-item-->
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>