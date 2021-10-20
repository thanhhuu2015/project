<?php
/*
Template Name: Liên hệ 4
*/
get_header(); ?>
<?php cat_breadcrumbs() ?>
<div class="contact_4">
	<div class="container">
		<div class="contact_title">Liên hệ</div>
		<div class="contact_4__item">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-4">
					<div class="contact_4__col">
						<div class="contact_4__col__top">
							<i class="fa fa-map-marker"></i>
							<h5>Địa chỉ</h5>
						</div>
						<div class="contact_4__col__bottom">
							<?php the_field( 'dia_chi', 'options' ); ?>
						</div>
					</div>
				</div>
				<!-- end column -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="contact_4__col">
						<div class="contact_4__col__top">
							<i class="fa fa-envelope"></i>
							<h5>Email</h5>
						</div>
						<div class="contact_4__col__bottom">
							<?php the_field( 'email', 'options' ); ?>
						</div>
					</div>
				</div>
				<!-- end column -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="contact_4__col">
						<div class="contact_4__col__top">
							<i class="fa fa-phone-square"></i>
							<h5>Số điện thoại</h5>
						</div>
						<div class="contact_4__col__bottom">
							<?php the_field( 'hotline', 'options' ); ?>
						</div>
					</div>
				</div>
				<!-- end column -->
				
			</div>
		</div>
		<!-- end item-->
		<div class="contact_4__item">
			<h3>Bản đồ</h3>
			<div class="_maps">
				<?php the_field( 'ban_do', 'option' ); ?>
			</div>
		</div>
		<!-- end item-->
		<div class="contact_4__item">
			<h3>Gửi thắc mắc cho chúng tôi</h3>
			<div class="form__contact">
				<?php echo do_shortcode('[contact-form-7 id="232" title="Form Liên hệ 3"]') ?>
			</div>
		</div>
		<!-- end item-->
		
	</div>
</div>
<?php get_footer(); ?>
<style>

	.form_contact_3 {
		position: relative;
	}
	.form_contact_3__row {
		display: flex;
		justify-content: space-between;
	}
	.form_contact_3__row > div {
		flex-grow: 1;
	}
	.form_contact_3__row .left {
		margin-right: 3rem;
		flex: 0 0 45%;
	}
	.form_contact_3__row .left > div {
		margin-bottom: 2rem;
	}
	.form_contact_3__row .left input {
		width: 100%;
		border: none;
		box-shadow: 0 0 4px 0px #ccc;
		display: inline-block;
		height: 4rem;
		padding-left: 1.5rem;
		font-size: 1.5rem;
		color: #868585;
		border-radius: .25rem;
	}
	.form_contact_3__row .left input:focus {
		outline: none;
		box-shadow: 0 0 5px 0px #00bcd494;
	}
	.form_contact_3__row > div .right textarea {
		width: 100%;
	}
	.form_contact_3__row > .right * {
		width: 100%;
	}
	.form_contact_3__row > .right textarea {
		border: none;
		box-shadow: 0 0 4px 0px #ccc;
		padding: 1rem;
		max-height: 16rem;
		border-radius: .5rem;
	}
	.form_contact_3__row > .right textarea:focus {
		outline: none;
		box-shadow: 0 0 9px 0px #00bcd44d;
	}
	input.wpcf7-form-control.wpcf7-text.wpcf7-validates-as-required {}
	.contact_4__item h3 {
		text-align: center;
		margin-bottom: 3rem;
		text-transform: uppercase;
		font-size: 2.5rem;
	}
	.form_contact_3__bottom {
		text-align: center;
	}
	.form_contact_3__bottom input {
		background-color: var(--primary-color);
		color: #fff;
		border: none;
		text-transform: capitalize;
		padding: 5px 15px;
		border-radius: .25rem;
	}
	.form_contact_3__bottom input:focus{
		outline: none;
	}
	.form_contact_3__bottom {
		margin-top: 1rem;
	}
	._maps iframe {
		width: 100%;
	}
	.contact_4__item {
		margin-bottom: 3rem;
	}
	.contact_title {
		text-align: center;
		text-transform: uppercase;
		font-size: 2.5rem;
		margin-bottom: 3rem;
		font-family: var(--second-font);
	}
	.contact_4__col {
		box-shadow: 0 0 6px 0px #ccc;
		padding: 5rem 2rem;
		border-radius: .25rem;
		text-align: center;
		height: 100%;
		transition : all .5s ease;
	}
	.contact_4__col__top {
		margin-bottom: 2rem;
		position: relative;
		padding-bottom: 1rem;
	}
	.contact_4__col__top::after {content: "";position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);width: 9rem;height: 2px;background-color: var(--primary-color);}
	.contact_4__col__top i {
		font-size: 3rem;
		color: var(--primary-color);
		display: inline-flex;
		margin-bottom: 2rem;
	}
	.contact_4__col__top h5 {
		text-transform: uppercase;
		font-size: 1.6rem;
	}
	.contact_4__col__bottom {
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.contact_4__col:hover {
		box-shadow: 0 0 14px 0px #ccc;
	}
	.contact_4 {
		padding: 3rem 0;
	}
	/*---------------- TABLET RESPONSIVE ------------------*/
	@media (max-width:768px) {
		.contact_4__item .row > div {
			margin-bottom: 3rem;
		}
		
	}


/*---------------- MOBILE RESPONSIVE ------------------*/
@media (max-width:575px) {
._maps iframe {
    height: 20rem;
}

.contact_4__item h3 {
    font-size: 2rem;
}

.form_contact_3__row .left {
    margin-right: 1rem;
}

.form_contact_3__row .left input {
    font-size: 1.4rem;
}		
}




</style>