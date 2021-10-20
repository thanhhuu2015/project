<section class="v-about v-section-pd">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="v-about-left">
                    <div class="v-block-title">
                        <h2>Giới thiệu <br><?php the_field('ten_cong_ty', 'option'); ?></h2>
                    </div>

                    <div class="v-about-info">
                        <p><?php the_field('vhome_about_desc', 'option'); ?></p>
                        <ul>
                            <?php if (have_rows('vhome_why_list', 'option')) : ?>
                                <?php while (have_rows('vhome_why_list', 'option')) : the_row(); ?>
                                    <li>
                                        <i class="fas fa-arrow-alt-circle-right"></i>
                                        <?php the_sub_field('vhome_why_list_content'); ?>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="v-about-action text-right">
                        <a href="" class="v-btn-arr"><span>Xem thêm </span><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div><!--/.col-->

            <div class="col-lg-6 col-md-6 col-12">
                <div class="v-about-left">
                    <div class="v-video-play">
                        <?php $vhome_why_video = get_field('vhome_why_video', 'option'); ?>
                        <img src="<?php echo $vhome_why_video['vhome_why_video_img']; ?>" alt="video về chúng tôi">
                        <span class="v-btn-play v-js-video-play"
                              data="<?php echo $vhome_why_video['vhome_why_video_link']; ?>"></span>
                    </div>
                </div>
            </div><!--/.col-->
        </div>
    </div>
</section>