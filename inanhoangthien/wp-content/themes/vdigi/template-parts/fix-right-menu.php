<div class="fix-menu">
    <?php
    $v_hotline = get_field('hotline', 'option');
    $hotline_zalo = get_field('hotline_zalo', 'option');
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
    <?php elseif ($args['choose_style'] == 2): ?>
        <div class="v-interactPanel">
            <?php if ($v_hotline): ?>
                <div class="inner-item mobile-show v-fr-hotline">
                    <a href="tel:<?php echo $v_hotline; ?>"
                       class="v-iconButton">
                        <i class="a-icon" style="background-image:url(<?php echo IMAGE_URL; ?>icon/phone-svg.svg)"></i></a>
                    <a href="tel:<?php echo $v_hotline; ?>" class="text">Gọi ngay</a>
                </div>
            <?php endif; ?>

            <?php if ($hotline_zalo): ?>
                <div class="inner-item mobile-show v-fr-zalo">
                    <a href="https://zalo.me/<?php echo $hotline_zalo; ?>" target="_blank"
                       class="v-iconButton ">
                        <i class="a-icon"
                           style="background-image:url(<?php echo IMAGE_URL; ?>icon/zalo-svg.svg); background-size: 30px;"></i></a>
                    <a href="https://zalo.me/<?php echo $hotline_zalo; ?>" target="_blank" class="text">Zalo</a>
                </div>
            <?php endif; ?>

            <?php if ($v_fanpage): ?>
                <div class="inner-item mobile-show v-fr-facebook">
                    <a href="<?php echo $v_fanpage; ?>" target="_blank"
                       class="v-iconButton ">
                        <i class="a-icon"
                           style="background-image:url(<?php echo IMAGE_URL; ?>icon/fb-svg.svg); background-size: 33px;"></i></a>
                    <a href="<?php echo $v_fanpage; ?>" target="_blank" class="text">Facebook</a>
                </div>
            <?php endif; ?>
        </div>

    <?php else: ?>
        <div class="v-interactPanel v-fix-menu-style-3">
            <?php if ($hotline_zalo): ?>
                <div class="inner-item mobile-show v-fr-zalo">
                    <a href="https://zalo.me/<?php echo $hotline_zalo; ?>" target="_blank"
                       class="v-iconButton ">
                        <i class="a-icon"
                           style="background-image:url(<?php echo IMAGE_URL; ?>icon/zalo-svg.svg); background-size: 30px;"></i></a>
                    <a href="https://zalo.me/<?php echo $hotline_zalo; ?>" target="_blank" class="text">Zalo</a>
                </div>
            <?php endif; ?>

            <?php if ($v_fanpage): ?>
                <div class="inner-item mobile-show v-fr-facebook">
                    <a href="<?php echo $v_fanpage; ?>" target="_blank"
                       class="v-iconButton ">
                        <i class="a-icon"
                           style="background-image:url(<?php echo IMAGE_URL; ?>icon/fb-svg.svg); background-size: 33px;"></i></a>
                    <a href="<?php echo $v_fanpage; ?>" target="_blank" class="text">Facebook</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="v-fix-left">
            <?php if ($v_hotline): ?>
                <div class="hotline-phone-ring-wrap">
                    <div class="hotline-phone-ring">
                        <div class="hotline-phone-ring-circle"></div>
                        <div class="hotline-phone-ring-circle-fill"></div>
                        <div class="hotline-phone-ring-img-circle">
                            <a href="tel:<?php echo $v_hotline; ?>" class="pps-btn-img">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABNmlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjarY6xSsNQFEDPi6LiUCsEcXB4kygotupgxqQtRRCs1SHJ1qShSmkSXl7VfoSjWwcXd7/AyVFwUPwC/0Bx6uAQIYODCJ7p3MPlcsGo2HWnYZRhEGvVbjrS9Xw5+8QMUwDQCbPUbrUOAOIkjvjB5ysC4HnTrjsN/sZ8mCoNTIDtbpSFICpA/0KnGsQYMIN+qkHcAaY6addAPAClXu4vQCnI/Q0oKdfzQXwAZs/1fDDmADPIfQUwdXSpAWpJOlJnvVMtq5ZlSbubBJE8HmU6GmRyPw4TlSaqo6MukP8HwGK+2G46cq1qWXvr/DOu58vc3o8QgFh6LFpBOFTn3yqMnd/n4sZ4GQ5vYXpStN0ruNmAheuirVahvAX34y/Axk/96FpPYgAAACBjSFJNAAB6JQAAgIMAAPn/AACA6AAAUggAARVYAAA6lwAAF2/XWh+QAAAB/ElEQVR42uya7W3CMBCG31QM4A1aNggTlG6QbpBMkHYC1AloJ4BOABuEDcgGtBOETnD9c1ERCH/lwxeaV8oPFGP86Hy+DxMREW5Bd7gRjSDSNGn4/RiAOvm8C0ZCRD5PSkQVXSr1nK/xE3mcWimA1ZV3JYBZCIO4giQANoYxMwYS6+xKY4lT5dJPreWZY+uspqSCKPYN27GJVBDXheVSQe494ksiEWTuMXcu1dld9SARxDX1OAJ4lgjy4zDnFsC076A4adEiRwAZg4hOUSpNoCsBPDGM+HqkNGynYBCuILuWj+dgWysGsNe8nwL4GsrW0m2fxZBq9rW0rNcX5MOQ9eZD8JFahcG5g/iKT671alGAYQggpYWvpEPYWrU/HDTOfeRIX0q2SL3QN4tGhZJukVobQyXYWw7WtLDKDIuM+ZSzscyCE9PCy5IttCvnZNaeiGLNHKuz8ZVh/MXTVu/1xQKmIqLEAuJ0fNo3iG5B51oSkeKnsBi/4bG9gYB/lCytU5G9DryFW+3Gm+JLwU7ehbJrwTjq4DJU8bHcVbEV9dXXqqP6uqO5e2/QZRYJpqu2IUAA4B3tXvx8hgKp05QZW6dJqrLTNkB6vrRURLRwPHqtYgkC3cLWQAcDQGGKH13FER/NATzi786+BPDNjm1dMkfjn2pGkBHkf4D8DgBJDuDHx9BN+gAAAABJRU5ErkJggg=="
                                     width="50">
                            </a>
                        </div>
                    </div>
                    <div class="hotline-bar">
                        <a href="tel:<?php echo $v_hotline; ?>">
                            <span class="text-hotline"><?php echo $v_hotline; ?></span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>