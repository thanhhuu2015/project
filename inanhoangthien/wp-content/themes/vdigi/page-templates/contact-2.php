<?php

/*

 Template Name: Liên hệ - 2

 */

get_header(); ?>

<?php cat_breadcrumbs() ?>

<section class="_page_contact">
	<div class="container">
		<div class="row my-4">
			<div class="col-12 col-lg-6">
				<div class="map_contact">
					<?php the_field( 'ban_do', 'options' ); ?>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="content_contact">
					<div class="header-page-contact clearfix">
						<h1>Liên hệ</h1>
					</div>
					<div class="box-info-contact">
						<ul class="list-info">
							<li>
								<p>Địa chỉ chúng tôi</p>
								<p><strong><?php the_field( 'dia_chi', 'options' ); ?></strong></p>
							</li>
							<li>
								<p>Email chúng tôi</p>
								<p><strong><?php the_field( 'email', 'options' ); ?></strong></p>
							</li>
							<li>
								<p>Điện thoại</p>
								<p><strong><?php the_field( 'hotline', 'options' ); ?></strong></p>
							</li>
						</ul>
					</div>
					<div class="box-send-contact">
						<h2>Gửi thắc mắc cho chúng tôi</h2>
						<div id="form-contact">
                            <?php echo do_shortcode('[contact-form-7 id="9" title="Form liên hệ"]');; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>

<style type="text/css">
.header-page-contact h1 {
    font-size: 30px;
    font-weight: 700;
    margin: 0px 0;
}
.header-page-contact:after {
    content: "";
    display: block;
    width: 50px;
    height: 4px;
    margin-top: 20px;
    background: #333;
    margin-bottom: 30px;
}
.box-info-contact ul {padding: 0;
    list-style-type: none;}
.box-info-contact li {
    margin-bottom: 30px;
}
.box-info-contact li p {
    margin-bottom: 0;
    color: #666;
    font-weight: 500;
}
.box-info-contact li p strong {
    font-weight: 600;
    color: #000000;
}
.box-send-contact h2 {
    font-weight: 700;
    font-size: 25px;
    margin: 30px 0 25px;
}
.box-send-contact h2:after {
    content: "";
    display: block;
    margin-top: 25px;
    width: 30px;
    height: 3px;
    background: #44709d;
}
.one__thrid.haft_form {
    width: 48%;
    float: left;
}
.one__thrid.haft_form_1 {
    width: 48%;
    float: right;	
}
.map_contact {
    height: 100%;
}
.map_contact iframe {
    width: 100%;
    height: 100%;
}
.block__form label {
    width: 100%;
}

/* Desktops and laptops ----------- */
@media only screen 
and (max-width : 1024px) {
.header-page-contact {
    margin-top: 2rem;
}
}
</style>