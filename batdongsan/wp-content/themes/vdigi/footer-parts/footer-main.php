<div class="v-footer-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="v-footer-item">
                    <div class="v-footer-body">
                        <div class="v-footer-logo">
                            <a href="<?php echo home_url(); ?>" class="header__logo__link">
                                <?php $logo = get_field('logo', 'options'); ?>
                                <img src="<?php echo $logo['url']; ?>" alt="Logo Website">
                            </a>
                            <h3>Bất động sản đất nền</h3>
                        </div>
                        <ul>
                            <li>
                                <p>
                                    <i class="fas fa-phone"></i>
                                    <?php the_field('hotline', 'option'); ?>
                                </p>
                            </li>

                            <li>
                                <p>
                                    <i class="fas fa-envelope-open-text"></i>
                                    <?php the_field('email', 'option'); ?>
                                </p>
                            </li>

                            <li>
                                <p>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php the_field('dia_chi', 'option'); ?>
                                </p>
                            </li>

                            <li>
                                <p>
                                    <span>Hãy gọi cho chúng tôi để được tư vấn 24/7</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> <!--  /.col-->

            <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-lg-0 mb-2 offset-lg-1">
                <div class="v-footer-item">
                    <h3>Về bất động sản đất nền</h3>
                    <div class="v-footer-body">
                        <ul class="v-ft-menu">
                            <li>
                                <a href="/gioi-thieu">
                                    <span class="black-text">Giới thiệu</span>
                                </a>
                            </li>
                            <li>
                                <a href="/tuyen-dung">
                                    <span class="black-text">Tuyển dụng</span>
                                </a>
                            </li>
                            <li>
                                <a href="/lien-he">
                                    <span class="black-text">Liên hệ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> <!--  /.col-->

            <div class="col-xl-3 col-lg-3 col-md-6 col-12 mb-lg-0 mb-3 offset-lg-1 ">
                <div class="v-footer-item">
                    <h3>Dịch vụ của BĐS đất nền</h3>
                    <div class="v-footer-body">
                        <ul class="v-ft-menu">
                            <li>
                                <a href="/tham-dinh-gia-bds">
                                    <span class="black-text">Thẩm định giá BĐS</span>
                                </a>
                            </li>
                            <li>
                                <a href="/phap-ly-bds">
                                    <span class="black-text">Pháp lý BĐS</span>
                                </a>
                            </li>
                            <li>
                                <a href="/thu-tuc-mua-dat-nen">
                                    <span class="black-text">Thủ tục mua đất nền</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> <!--  /.col-->

        </div>
    </div>
</div>