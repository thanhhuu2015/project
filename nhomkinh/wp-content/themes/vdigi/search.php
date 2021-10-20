<?php
/**
* The template for displaying search results pages
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
*
* @package WP_Bootstrap_4
*/
get_header(); ?>
<?php
$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="search_page">
			<div class="container">
				<?php
				if ( have_posts() ) : ?>
					<header class="search__header">
						<h2><?php printf( esc_html__( 'Kết quả tìm kiếm cho: %s', 'wp-bootstrap-4' ), '<span>' . get_search_query() . '</span>' );?></h2>
					</header><!-- .page-header -->
					<div class="search__content">
						<div class="row">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div class="col-6 col-lg-12 ">
									<div class="search_item">
										<div class="search_item__img">
											<a href="<?php the_permalink(); ?>">
												<img src="<?php the_post_thumbnail_url(); ?>">
											</a>
										</div>
										<!-- end img -->
										<div class="search_item__content">
											<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<?php the_excerpt(); ?>
											<a href="<?php the_permalink(); ?>" class="btn-search">Xem Thêm <i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								</div>
							<?php	endwhile; ?>
							<?php
							/** Phân Trang **/
							get_template_part( 'category-templates/pagination/pagination' );
						else :
							get_template_part( 'template-parts/search', 'empty' );
						endif; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- end search page -->
	</main><!-- #main -->
</section><!-- #primary -->
<!-- /.col-md-12 -->
<!-- /.row -->
<!-- /.container -->
<?php
get_footer(); ?>

<style type="text/css">
	.search_page {
		position: relative;
		padding: 3rem 0;
		background-color: hsl(0, 0%, 98%);
	}

	header.search__header h2 {
		font-size: 3rem;
		font-family: var(--third-font);
		text-transform: capitalize;
		margin-bottom: 3rem;
	}


	.search_item {
		padding: 0;
		font-size: 12px;
		color: hsl(0, 0%, 60%);
		border-radius: 4px;
		box-shadow: hsl(0, 0%, 80%) 0 0 16px;
		overflow: hidden;
		background-color: hsl(0, 0%, 100%);
		display: -ms-flexbox;
		display: flex;
		padding: 1rem;
		width: 100%;
		position: relative;
		margin-bottom: 3rem;
	}

	.search_item__img img {
		height: 23rem;
		object-fit: cover;
	}

	.search_item__img {
		flex: 0 0 30rem;
		margin-right: 2rem;
	}

	.search_item__content {
		position: relative;
		display: flex;
		flex-flow: column wrap;
		justify-content: center;
	}

	.search_item__content h4 {
		margin-bottom: 1rem;
		padding-bottom: 2rem;
		border-bottom: 1px solid #cccccc47;
	}

	.search_item__content h4 a {
		font-size: 2rem;
		font-family: var(--second-font);
		color: #4d4d4d;
		text-transform: capitalize;
	}

	.search_item__content p {
		font-size: 1.5rem;
		display: -webkit-box;
		-webkit-line-clamp: 3;
		-webkit-box-orient: vertical;
		-o-text-overflow: ellipsis;
		text-overflow: ellipsis;
		overflow: hidden;

	}

	a.btn-search {
		border: 1px solid var(--primary-color);
		padding: .7rem 2rem;
		font-size: 1.4rem;
		text-transform: capitalize;
		display: inline-block;
		margin: 1rem 0;
		color: #fff;
		max-width: max-content;
		background-color: var(--primary-color);
	}
	.search_item::after {content: "";position: absolute;bottom: -37px;right: -42px;width: 8rem;height: 5rem;background-color: var(--second-color);transform: rotate(45deg);border-radius: 15px;}








	@media (min-width:576px) and (max-width:768px) {
		.search_item {
			display: flex;
			flex-flow: column wrap;
		}

		.search_item__img img {
			height: 20rem;
			object-fit : cover;
			width: 100%;
		}

		.search_item__img {
			margin: 0;
			flex: 0 0 100%;
			margin-bottom: 1rem;
		}

		.search_item__content h4 a {
			font-size: 1.2rem;
			line-height: initial;
		}

		.search_item__content h4 {
			margin: 0;
			padding-bottom: .5rem;
		}

		.search_item__content p {
			font-size: 1.2rem;
		}

		a.btn-search {
			padding: 2px 9px;
			font-size: 1.2rem;
		}

		.search__content .row > div {
			padding: 0 .5rem;
		}

		header.search__header h2 {
			font-size: 2rem;
			margin-bottom: 1rem;
		}
	}


	@media (max-width:575px) {
		.search_item {
			display: flex;
			flex-flow: column wrap;
		}

		.search_item__img img {
			height: 11rem;
						object-fit : cover;
			width: 100%;
		}

		.search_item__img {
			margin: 0;
			flex: 0 0 100%;
			margin-bottom: 1rem;
		}

		.search_item__content h4 a {
			font-size: 1.2rem;
			line-height: initial;
		}

		.search_item__content h4 {
			margin: 0;
			padding-bottom: .5rem;
		}

		.search_item__content p {
			font-size: 1.2rem;
		}

		a.btn-search {
			padding: 2px 9px;
			font-size: 1.2rem;
		}

		.search__content .row > div {
			padding: 0 .5rem;
		}

		header.search__header h2 {
			font-size: 2rem;
			margin-bottom: 1rem;
		}
	}












</style>