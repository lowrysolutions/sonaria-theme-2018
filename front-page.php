<?php
/**
 * Front Page Template
 *
 * @package Sonaria_Theme_2018
 */

 get_header(); ?>

 <?php get_template_part( 'template-parts/featured-image' ); ?>

 <div class="main-wrap">
	 <main class="main-content">
		 <?php while ( have_posts() ) : the_post(); ?>
		 	
		 
		 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php edit_post_link( __( '(Edit)', 'sonaria-theme-2018' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</article>
		 
		 <?php endwhile;?>
	 </main>
 </div>
 <?php get_footer();
