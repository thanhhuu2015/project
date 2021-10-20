<div class="header-top d-none d-lg-flex">
    <div class="container">
        <ul>
            <li><i class="fa fa-phone"></i> <span><?php the_field( 'dien_thoai', 'options' ); ?></span></li>
            <li><i class="fa fa-envelope"></i> <span><?php the_field( 'email', 'options' ); ?></span></li>
            <li><i class="fa fa-map-marker"></i> <span><?php the_field( 'dia_chi', 'options' ); ?></span></li>
        </ul>
    </div>
</div>
<!-- end header top -->
<div class="header__main d-none d-lg-block d-xl-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2">
                <div class="header__main__logo">
                    <a href="<?php echo home_url(); ?>" class="header__logo__link">
                        <?php $logo = get_field('logo', 'options'); ?>
                        <img src="<?php echo $logo['url']; ?>" alt="Logo Website">
                    </a>
                </div>
            </div>
            <!-- Logo header -->
            <div class="col-md-10">
                <div class="header-menu">
                     <?php wp_nav_menu(array('theme_location' => 'menu-1')); ?>
                </div>
            </div>
            <!-- Info website -->
        </div>
    </div>
</div>
<!-- end header main -->
