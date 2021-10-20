<div class="v-header-top d-none d-lg-block d-xl-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6">
                <div class="v-header-top__info">
                    <ul>
                        <li class="v-header-hotline">
                            <a href="tel: <?php the_field('hotline', 'option'); ?>">
                                <i class="fas fa-phone"></i>
                                <?php the_field('hotline', 'option'); ?>
                            </a>
                        </li>

                        <li class="v-header-hotline">
                            <a href="tel: <?php the_field('email', 'option'); ?>">
                                <i class="fas fa-envelope-open-text"></i>
                                <?php the_field('email', 'option'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>