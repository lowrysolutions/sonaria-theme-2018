<?php
/**
 * Tracking scripts like Google Tag Manaager
 *
 * @package Sonaria_Theme_2018
 * @since {{VERSION}}
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'sonaria_after_body_open', 'sonaria_gtm_body' );
function sonaria_gtm_body() { ?>
	

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BCRVFS"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
	<?php
	
}

add_action( 'wp_head', 'sonaria_gtm_head' );
function sonaria_gtm_head() { ?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5BCRVFS');</script>
	<!-- End Google Tag Manager -->
	
	<?php
	
}

add_action( 'wp_head', 'sonaria_gtag_head' );
function sonaria_gtag_head() { ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-43571502-4"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-43571502-4');
	</script>
	
	<?php
	
}