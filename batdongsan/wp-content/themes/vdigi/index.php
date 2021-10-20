<?php
/*
 Template Name: Home - Full
 */
get_header();

get_template_part( 'home-parts/slide-homepage' );
get_template_part( 'home-parts/feature' );
get_template_part( 'home-parts/datnen' );
get_template_part( 'home-parts/project' );
get_template_part( 'home-parts/blogs' );
get_template_part( 'home-parts/why' );
get_template_part( 'home-parts/newletter' );
get_template_part( 'home-parts/brand' );

get_footer(); 
?>