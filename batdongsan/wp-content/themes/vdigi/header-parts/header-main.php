<div class="header__main d-none d-lg-block d-xl-block">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-3">

                <div class="header__main__logo">

                    <a href="<?php echo home_url(); ?>" class="header__logo__link">

                        <?php $logo = get_field('logo', 'options'); ?>

                        <img src="<?php echo $logo['url']; ?>" alt="Logo Website">

                    </a>

                </div>

            </div>

            <!-- Logo header -->

            <div class="col-md-9">

                    <div class="header__menu">

                        <?php wp_nav_menu(array('theme_location' => 'menu-1')); ?>

                    </div>

            </div>

            <!-- Menu website -->

        </div>

    </div>

</div>

<!-- end header main -->
