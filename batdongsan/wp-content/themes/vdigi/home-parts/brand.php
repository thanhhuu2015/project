<section class="brand">
    <div class="container">
        <div class="owl-carousel owl-theme" id="owl-brand">
            <?php if (have_rows('vhome_customer', 'option')) : ?>
                <?php while (have_rows('vhome_customer', 'option')) : the_row(); ?>
                    <?php if (get_sub_field('vhome_customer_img')): ?>
                        <a href="<?php the_sub_field('vhome_customer_link'); ?>" class="brand-item">
                            <img loading="lazy" src="<?php the_sub_field('vhome_customer_img'); ?>"
                                 alt="<?php the_sub_field('vhome_customer_name'); ?>" class="brand-item__img">
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>