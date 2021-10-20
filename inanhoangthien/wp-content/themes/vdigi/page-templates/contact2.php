<?php
/*
Template Name: Liên hệ 2
*/
get_header(); ?>
<?php cat_breadcrumbs() ?>

<div class="contact_2">
	<div class="container">
		<div class="contact_2__top">
			<h2>Bản đồ</h2>
			<div class="_maps">
				<?php the_field( 'ban_do', 'option' ); ?>
			</div>
		</div>
		<!-- end top -->
		<div class="contact_2__bottom">
			<div class="row">
				<div class="col-12 col-lg-8 col-md-6">
					<div class="contact_2__form" style="background-image: url(<?php bloginfo('url') ?>/wp-content/themes/vdigi/assets/images/service_dot.png )">
						<h3>Gửi thắc mắc cho chúng tôi</h3>
						<?php echo do_shortcode('[contact-form-7 id="237" title="Form Liên Hệ 2"]') ?>
					</div>
				</div>
				<div class="col-12 col-lg-4 col-md-6">
					<div class="contact_2__info">
						<h3>Liên hệ</h3>
						<ul>
							<li>
								<span>Địa chỉ:</span>
								<span><?php the_field( 'dia_chi', 'options' ); ?></span>
							</li>
							<li>
								<span>Email:</span>
								<span><?php the_field( 'email', 'options' ); ?></span>
							</li>
							<li>
								<span>Số điện thoại:</span>
								<span><?php the_field( 'hotline', 'options' ); ?></span>
							</li>
						</ul>
						<div class="contact_2__social">
							<ul>
								<?php if ( have_rows( 'social', 'option' ) ) : ?>
									<?php while ( have_rows( 'social', 'option' ) ) : the_row(); ?>
										<li><a href="<?php the_sub_field( 'facebook' ); ?>"><i class="fa fa-facebook"></i></a></li>
										<li><a href="<?php the_sub_field( 'twitter' ); ?>"><i class="fa fa-twitter"></i></a></li>
										<li><a href="<?php the_sub_field( 'instagram' ); ?>"><i class="fa fa-instagram"></i></a></li>
										<li><a href="<?php the_sub_field( 'youtube' ); ?>"><i class="fa fa-youtube"></i></a></li>
									<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- end bottom -->
	</div>
</div>


<?php get_footer(); ?>


<style>
	
	.contact_2 {
		position: relative;
		padding: 3rem 0;
	}

	.contact_2__top {
		text-align: center;
		margin-bottom: 5rem;
	}

	.contact_2__top ._maps iframe {
		width: 100%;
		height: 40rem;
	}

	.contact_2__top h2 {
		margin-bottom: 3rem;
		font-size: 2.5rem;
		text-transform: uppercase;
	}

	.contact_2__bottom {
		position: relative;
		-webkit-box-shadow: 0 0 12px 1px #ccc, 0 0 12px 1px #cccccc61;
		        box-shadow: 0 0 12px 1px #ccc, 0 0 12px 1px #cccccc61;
	}

	.contact_2__info {
		background-color: var(--primary-color);
		padding: 2rem 3rem;
	}

	.contact_2__info h3 {
		text-align: center;
		margin-bottom: 2rem;
		text-transform: uppercase;
		font-size: 2rem;
	}




	.contact_2__info * {
		color: #fff;
	}

	.contact_2__info ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.contact_2__info ul li {
		margin-bottom: 3rem;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		    -ms-flex-flow: column;
		        flex-flow: column;
	}


	.contact_2__social ul {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
	}

	.contact_2__social ul li {
		margin-right: 1rem;
	}

	.contact_2__social ul li a {
		display: -webkit-inline-box;
		display: -ms-inline-flexbox;
		display: inline-flex;
		width: 3rem;
		height: 3rem;
		background-color: #ffc107;
		-webkit-box-pack: center;
		    -ms-flex-pack: center;
		        justify-content: center;
		-webkit-box-align: center;
		    -ms-flex-align: center;
		        align-items: center;
		border-radius: .5rem;
		-webkit-transition : all .5s ease;
		-o-transition : all .5s ease;
		transition : all .5s ease;
	}



	.contact_2__form {
		padding: 5rem;
		background-position: bottom left;
		background-repeat: no-repeat;
	}


	.form_contact_2 input {
		border: none;
		border-bottom: 1px solid #ccc;
		padding: 0;
	}

	.form_contact_2 input:focus {
		outline: none;
	}

	.form_contact_2 > div {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		    -ms-flex-flow: column wrap;
		        flex-flow: column wrap;
		margin-bottom: 2rem;
	}


	.form_contact_2 > div label {
		margin: 0;
		color: var(--primary-color);
		text-transform: capitalize;
		font-family: var(--second-font);
	}

	.contact_2__form h3 {
		text-align: center;
		margin-bottom: 3rem;
		text-transform: uppercase;
		color: var(--primary-color);
		font-size: 2.5rem;
		position: relative;
	}

	.form_contact_2 input {
		width: 100%;
		font-size: 1.4rem;
	}

	.form_contact_2 > div textarea {
		width: 100%;
		margin-top: 1rem;
		border: none;
		border-bottom: 1px solid #ccc;
		max-height: 3rem;
	}

	.form_contact_2 > div textarea:focus {
		outline: none;
	}

	.button {
		margin-bottom: 0 !important;
		-webkit-box-pack: end;
		    -ms-flex-pack: end;
		        justify-content: flex-end;
	}

	.button input {width: auto;display: inline;}


	.form_contact_2 .button input {
		width: 13rem;
		height: 4rem;
		border: none;
		text-transform: capitalize;
		background-color: var(--primary-color);
		color: #fff;
		margin-left: auto;
		-webkit-transition: all .5s ease;
		-o-transition: all .5s ease;
		transition: all .5s ease;
	}

	.form_contact_2 .button input:hover {
		background-color: #0f246f;
	}


	.form_contact_2 .button {
		text-align: right;
	}
	.contact_2__bottom > .row > div:last-child {
		background-color: var(--primary-color);
	}

	.contact_2__info {
		height: 100%;
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		    -ms-flex-flow: column;
		        flex-flow: column;
		-webkit-box-pack: center;
		    -ms-flex-pack: center;
		        justify-content: center;
	}

	.contact_2__info ul li {
		margin-bottom: 4rem;
	}
	.contact_2__info ul li:hover a {
		background-color: #09184F;
	}
	.contact_2__social li {
		margin-bottom: 0 !important;
	}


	/*---------------- TABLET RESPONSIVE ------------------*/
	@media (max-width:780px) {
		.contact_2__form {
			padding: 2rem;
		}

		.contact_2__form h3 {
			font-size: 1.8rem;
			margin-bottom: 2rem;
		}

		.form_contact_2 > div {
		}

		.form_contact_2 .button {
			margin-top: 2rem;
		}

		.form_contact_2 > div label {
			position: relative;
			top: 6px;
		}
		.contact_2__form h3::after {
			content: "";
			position: absolute;
			bottom: -12px;
			left: 50%;
			-webkit-transform: translateX(-50%);
			    -ms-transform: translateX(-50%);
			        transform: translateX(-50%);
			height: 2px;
			width: 6rem;
			background-color: var(--primary-color);
		}

		.contact_2__form h3 {
			text-transform: capitalize;
			margin-bottom: 3rem;
		}

		.form_contact_2 > div label {
			font-size: 1.4rem;
		}		




	}

	/*---------------- MOBILE RESPONSIVE ------------------*/
	@media (max-width:575px) {
		.contact_2__bottom > .row > div:last-child {
			background-color: transparent;
		}
	}




</style>