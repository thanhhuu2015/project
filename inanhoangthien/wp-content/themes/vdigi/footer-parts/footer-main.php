<div class="v-footer-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <div class="v-footer-top">
                    <div class="v-footer-logo">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_field('logo', 'option')['url']; ?>" alt="Logo Website">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="v-footer-item">
                    <ul class="v-ft-info">
                        <h3>Thông tin liên hệ</h3>
                        <li>
                            <a href="tel:<?php echo $hotline = get_field('hotline', 'options'); ?>">
                                <span><i class="fas fa-phone-alt"></i></span><?php echo $hotline; ?>
                            </a>
                        </li>

                        <li>
                            <a href="mailto:<?php echo $email = get_field('email', 'options'); ?>">
                                <span><i class="fas fa-envelope"></i></span><?php echo $email; ?>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span><i class="fas fa-map-marker-alt"></i></span><?php the_field('dia_chi', 'option'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="v-footer-item">
                    <h3>Mạng xã hội</h3>
                    <?php
                    $hotline_zalo = get_field('hotline_zalo', 'option');
                    $social = get_field('social', 'option');
                    $facebook_link = $social['facebook'];
                    $youtube_link = $social['youtube'];
                    ?>
                    <ul class="v-ft-menu">
                        <?php if ($facebook_link): ?>
                            <li>
                                <a class="v-social-fb" href="<?php echo $facebook_link; ?>" target="_blank">
                                    <img src="<?php echo IMAGE_URL; ?>icon/icon-fb.png" alt="icon facebook">
                                    <span class="black-text">Hoàng Thiện trên Facebook</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($youtube_link): ?>
                            <li>
                                <a class="v-social-yo" href="<?php echo $youtube_link; ?>" target="_blank">
                                    <img src="<?php echo IMAGE_URL; ?>icon/icon-yt.png" alt="icon youtube">
                                    <span class="black-text">Hoàng Thiện trên Youtube</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($hotline_zalo): ?>
                            <li>
                                <a class="v-social-tw" href="https://zalo.me/<?php echo $hotline_zalo; ?>"
                                   target="_blank">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAABNVBMVEUAAAAPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOIPqOL///8Amd0And4An98Lp+IAouAssuYAlNxbwutXwesJpeEEpOEAoOAnsOUeruQDo+AAmt76/f/2/P6C0fBLvekQquMAkdvu+f3X8Ptxy+5hxew6t+chrOQZrOTl9vzi9fvO7vqX2fN3ze9sye1nx+0hr+QAjdny+/7C6fiw4/aP1vKF0/BTv+pEu+g+uegytOYTpeLb8vuc3PR8z+8AgNXe8/vG6vi75fad0vCAyO1Yu+hMuOcPoN8fmt4Qlt2NjwQdAAAAJ3RSTlMA85i7+c6QGuXf3MKdbjnrxYBzYC8oDAfpx7GnjmdZVEgS7NeDdiCGRF/0AAACR0lEQVQ4y4XU5XbiQBiA4QkttEDdu/W175toSUgJUtxdilTW5f4vYSchi7SEPH/CObxnBCZD5h1c+IJ+jls/9WxuEUfHe0GY4f24trj7dAKvrJ4fvc22vLDA+tXrbg8c+Oa7DXC04tw5l5uwlIfYDsHFpR36wc2NvWFX76xwFdwd2jsJ8xPS/aJwg4Ve1jUS/X4iZLqVI2CjdBpyR+aWBbmFE+n8uBQjz3FNnJRX5AKA1lkQDY3uTHJh/K2gI94JM/+kj4W3LCwlm4oiSRJV7wVKDV7JIcoC+0g1c9U7ZMcO8elnNgMirWeVQrybyOV1FipyrxIKh1kZIOtWONYRaB4Hv1PWWoeIkozMN0EF2CbcNCxTnn/EwhOWfpQw9RCNFsqY/t7COAXgZsLWiFcqGM3GUH4ZYiwUK2YwdvcSwjQbkpuZeqDwVfbIIIabGkYfYl/imOKbOhY1Dd4T7/+wmxTVau+5qhex+6eKxQSbHTH7t4dfDRH8xGOHZcWQJCWZbCYzaIol2MgVxChiwgDwkk37By/n842Gruu5Bo2nsN3ujNpsbR3EUo2K5uHdAuBzOGNoGPcFQYhEJI0dFnkgGqyDfUICAJHcrzg+1rK1TK3ej4AoSaqqgqoBiAKvWW84uwt22ZNPypWwQk2C48m9AYvADqIz6yLyASOKsMQOsXDg5vM4vHbrdonNA2PuV0VwWec/JlMrzt2H8XXqOvvKMZm3v+q8j3lrZwuGOyCLHGxsz93gZ9fEydHleTBwwnHbgVPP/vwm/gGGlNWDeHz9cwAAAABJRU5ErkJggg=="
                                         alt="icon zalo" loading="lazy">
                                    <span class="black-text">Hoàng Thiện trên Zalo</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="v-footer-item">
                    <h3>Bản đồ</h3>

                    <?php get_template_part('template-parts/v-map', null, ['width' => '100%', 'height' => '180px']); ?>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="v-footer-item">
                    <h3>Fanpage</h3>
                    <div class="fb-page" data-href="<?php the_field('fanpage', 'option'); ?>"
                         data-tabs="timeline"
                         data-width="400" data-height="180" data-small-header="false"
                         data-adapt-container-width="true"
                         data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="<?php the_field('fanpage', 'option'); ?>"
                                    class="fb-xfbml-parse-ignore">
                            <a href="<?php the_field('fanpage', 'option'); ?>">Facebook</a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>