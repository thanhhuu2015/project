<div class="fix-menu">
    <?php
    $v_hotline = get_field('hotline', 'option');
    $v_fanpage = get_field('fanpage', 'option');
    $v_social = get_field('social', 'option');
    ?>
    <?php if ($args['choose_style'] == 1): ?>
        <ul class="fix-right-menu">
            <?php if ($v_social['zalo']): ?>
                <li class="fl-zalo blue">
                    <a href="<?php echo $v_social['zalo']; ?>" target="_blank">
                        <span class="v-ti-zalo"></span>
                    </a>
                    <span class="label">Đến trang Zalo</span>
                </li>
            <?php endif; ?>
            <?php if ($v_fanpage): ?>
                <li class="fl-facebook">
                    <a href="<?php echo $v_fanpage; ?>" target="_blank"><span
                                class="v-ti-facebook"></span></a>
                    <span class="label">Đến trang Facebook</span>
                </li>
            <?php endif; ?>
            <?php if ($v_hotline): ?>
                <li class="fl-phone">
                    <a href="tel:<?php echo $v_hotline; ?>" target="_blank">
                        <span class="v-ti-phone"></span>
                    </a>
                    <span class="label">Hotline: <?php echo $v_hotline; ?></span>
                </li>
            <?php endif; ?>
        </ul>
    <?php else: ?>
        <div class="v-interactPanel">
            <?php if ($v_hotline): ?>
                <div class="inner-item mobile-show">
                    <a href="tel:<?php echo $v_hotline; ?>"
                       class="v-iconButton">
                        <i class="a-icon" style="background-image:url(<?php echo IMAGE_URL; ?>icon/phone-svg.svg)"></i></a>
                    <a href="tel:<?php echo $v_hotline; ?>" class="text">Gọi ngay</a>
                </div>
            <?php endif; ?>

            <?php if ($v_social['zalo']): ?>
                <div class="inner-item mobile-show">
                    <a href="<?php echo $v_social['zalo']; ?>" target="_blank"
                       class="v-iconButton ">
                        <i class="a-icon"
                           style="background-image:url(<?php echo IMAGE_URL; ?>icon/zalo-svg.svg); background-size: 30px;"></i></a>
                    <a href="<?php echo $v_social['zalo']; ?>" target="_blank" class="text">Zalo</a>
                </div>
            <?php endif; ?>

            <?php if ($v_fanpage): ?>
                <div class="inner-item mobile-show">
                    <a href="<?php echo $v_fanpage; ?>" target="_blank"
                       class="v-iconButton ">
                        <i class="a-icon"
                           style="background-image:url(<?php echo IMAGE_URL; ?>icon/fb-svg.svg); background-size: 33px;"></i></a>
                    <a href="<?php echo $v_fanpage; ?>" target="_blank" class="text">Facebook</a>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>