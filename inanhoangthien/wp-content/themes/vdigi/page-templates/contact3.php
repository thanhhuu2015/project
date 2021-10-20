<?php
/*
Template Name: Liên hệ 3
*/
get_header(); ?>
<?php cat_breadcrumbs() ?>

<div class="contact_3">
	<div class="container">
		<div class="contact_title">Liên hệ</div>
		<div class="row">
			<div class="col-12 col-md-6">
				<div class="contact_3__left">
					<h3>Lời nhắn cho chúng tôi</h3>
					<?php echo do_shortcode('[contact-form-7 id="228" title="Form Liên Hệ 2"]') ?>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="contact_3__right">
					<div class="_maps">
						<?php the_field( 'ban_do', 'option' ); ?>
					</div>
					<ul>
						<li><i class="fa fa-map-marker"></i><span><?php the_field( 'dia_chi', 'options' ); ?> </span></li>
						<li><i class="fa fa-phone"></i><span><?php the_field( 'hotline', 'options' ); ?></span></li>
						<li><i class="fa fa-envelope"></i><span><?php the_field( 'email', 'options' ); ?></span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>	


</div>


<?php get_footer(); ?>


<style>
	

	.contact_3 {
		position: relative;
	}

	.contact_3 .row > div {
		padding: 0;
	}

	.contact_3__left {
		background-color: #383838;
		padding: 2rem;
	}

	.contact_3__left h3 {
		font-size: 2.5rem;
		text-transform: uppercase;
		text-align: center;
		margin-bottom: 3rem;
	}

	.contact_3__left * {
		color: #fff;
	}


	.form_contact_2 input {
		border: none;
		border-bottom: 1px solid #ccc;
		padding: 0;
		background-color: transparent;
	}

	.form_contact_2 input:focus {
		outline: none;
	}

	.form_contact_2 > div {
		display: flex;
		flex-flow: column wrap;
		margin-bottom: 2rem;
	}


	.form_contact_2 > div label {
		margin: 0;
		color: #fff;
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
		color: #CDDC39;
	}

	.form_contact_2 > div textarea {
		width: 100%;
		border: none;
		border-bottom: 1px solid #ccc;
		max-height: 3rem;
		background-color: transparent;
		font-size: 1.4rem;
		color: #cddc39;
	}

	.form_contact_2 > div textarea:focus {
		outline: none;
	}

	.button {
		margin-bottom: 0 !important;
		justify-content: flex-end;
	}

	.button input {width: auto;display: inline;}


	.form_contact_2 .button input {
		width: 13rem;
		height: 4rem;
		border: none;
		text-transform: capitalize;
		background-color: #fff;
		margin-left: auto;
		transition: all .5s ease;
		color: #000;
		position: relative;
		border-radius: 4px;
	}

	.form_contact_2 .button input:hover {
		background-color: #e9ecef;
	}


	.form_contact_2 .button {
		text-align: right;
	}

	._maps iframe {
		height: 30rem;
		width: 100%;
	}

	.contact_3__right ul {
		list-style: none;
		padding: 1rem 2rem;
		margin: 0;
	}

	.contact_3__right ul li {
		margin-bottom: 1rem;
	}
	.contact_3__right ul li:last-child{
		margin-bottom: 0;
	}

	.contact_3__right ul li span {
		font-size: 1.5rem;
	}

	.contact_3__right ul li i {
		display: inline-flex;
		margin-right: 1rem;
		width: 2rem;
		justify-content: center;
	}

	.contact_3__right {
		overflow: hidden;
	}

	.contact_title {
		font-size: 3rem;
		text-align: center;
		margin-bottom: 3rem;
		margin-top: 2rem;
		text-transform: uppercase;
		font-family: var(--second-font);
		color: var(--primary-color);
	}


	/*---------------- TABLET RESPONSIVE ------------------*/
	@media (max-width:768px) {
		.contact_3__left h3 {
			font-size: 2rem;
		}	
	}


	/*---------------- MOBILE RESPONSIVE ------------------*/
	@media (max-width:575px) {
		.contact_title {
			font-size: 2.5rem;
			margin: 2rem;
		}		
	}





</style>