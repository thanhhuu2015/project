<div class="v-header-top d-none d-lg-block d-xl-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="v-header-top__desc">
                    <marquee scrollamount="5" width="100%">
                        <span><?php the_field('vheader_top_desc', 'option'); ?></span></marquee>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="v-header-top__info">
                    <ul>
                        <li class="v-header-email">
                            <a href="mailto:<?php echo $email = get_field('email', 'option'); ?>">
                                <span><i class="far fa-envelope"></i></span> <?php echo $email; ?>
                            </a>
                        </li>

                        <?php
                        $hotline_zalo = get_field('hotline_zalo', 'option');
                        $social = get_field('social', 'option');
                        $facebook_link = $social['facebook'];
                        $youtube_link = $social['youtube'];
                        ?>
                        <?php if ($facebook_link): ?>
                            <li>
                                <a href="<?php echo $facebook_link; ?>" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($youtube_link): ?>
                            <li>
                                <a href="<?php echo $youtube_link; ?>" target="_blank">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($hotline_zalo): ?>
                            <li>
                                <a href="https://zalo.me/<?php echo $hotline_zalo; ?>" target="_blank">
                                     <img src="<?php echo IMAGE_URL; ?>icon/icon_zalo.png" alt="icon-zalo">
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>