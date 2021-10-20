<div class="v-main-nav">
    <?php wp_nav_menu(array(
        'theme_location' => 'menu-1',
        'menu' => '',
        'container' => 'div',
        'container_class' => 'v-main-menu',
        'container_id' => 'v-main-menu',
        'container_aria_label' => '',
        'menu_class' => 'v-main-menu-ul',
        'menu_id' => 'v-main-menu-ul',
        'echo' => true,
        'fallback_cb' => 'wp_page_menu',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'item_spacing' => 'preserve',
        'depth' => 0,
        'walker' => '',
    )); ?>
    <?php if ($args['is_search']): ?>
        <div class="v-search-btn" data-toggle="modal" data-target="#v-search-form">
            <i class="fas fa-search"></i>
        </div>

        <div id="v-search-form" class="modal fade show" tabindex="-1" role="dialog"
             aria-labelledby="v-search-form" style="display: none; padding-right: 16px;" aria-modal="true">
            <div class="modal-dialog modal-xl modal-dialog-fluid" role="document">
                <div class="modal-content bg-white">
                    <div class="modal-body p-3">
                        <div class="row no-gutters align-items-center">
                            <div class="col pl-2 pr-3 border-right">
                                <form class="d-flex align-items-center" method="GET"
                                      action="<?php echo esc_url(home_url('/')); ?>" role="search">
                                    <input class="form-control border-0 pl-0" style="background:none;"
                                           type="text" placeholder="Tìm kiếm..." name="s"
                                           value="<?php the_search_query(); ?>" required="">
                                    <!-- <input type="hidden" name="post_type" value="product"/> -->
                                    <button type="submit" name="submit" class="close ml-3"
                                            style="background:none;">
                                        <i class="fas fa-arrow-right text-muted"></i>
                                    </button>
                                </form>
                            </div> <!-- /. col -->

                            <div class="col-auto">
                                <button type="button" class="close ml-3 mr-2" data-dismiss="modal">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div> <!-- /. col -->
                        </div> <!-- /. row -->
                    </div> <!-- /. modal-body -->
                </div> <!-- /. modal-content -->
            </div>
        </div>
    <?php endif; ?>
</div><!--/.v-main-nav-->