<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package Sonaria_Theme_2018
 * @since FoundationPress 1.0.0
 */
?>

</div><!-- Close container -->
	<div class="footer-container">
		<footer class="footer">
			<div class="row">
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
			</div>
			<section class="copyright">
				<pre class=" CodeMirror-line " role="presentation"><strong><span role="presentation">COPYRIGHT © <?php echo date( 'Y' ); ?> • SONARIA, LLC. • ALL RIGHTS RESERVED -- SONARIA AND ALL ASSOCIATED ELEMENTS ARE REGISTERED TRADEMARKS</span></strong></pre>
			</section>
		</footer>
	</div>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
