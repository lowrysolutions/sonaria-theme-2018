<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Sonaria_Theme_2018
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

 <div class="main-wrap">
	<main class="main-content">
		<article>
			<header>
				<h1 class="entry-title"><?php _e( 'File Not Found', 'sonaria-theme-2018' ); ?></h1>
			</header>
			<div class="entry-content">
				<div class="error">
					<p class="bottom"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'sonaria-theme-2018' ); ?></p>
				</div>
				<p><?php _e( 'Please try the following:', 'sonaria-theme-2018' ); ?></p>
				<ul>
					<li><?php _e( 'Check your spelling', 'sonaria-theme-2018' ); ?></li>
					<li>
						<?php
							/* translators: %s: home page url */
							printf( __(
								'Return to the <a href="%s">home page</a>', 'sonaria-theme-2018' ),
								home_url()
							);
						?>
					</li>
					<li><?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'sonaria-theme-2018' ); ?></li>
				</ul>
			</div>
		</article>
	</main>
 <?php get_sidebar(); ?>
</div>

<?php get_footer();
