<?php

/**
 * The header for our theme, which displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Marketeer_Now
 * @author Bret Cameron <bretcameron@gmail.com>
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-T3F5P6V');</script>
	<!-- Google Search Console -->
	<meta name="google-site-verification" content="GWqCP2-qh8LLG5fnvd95PEkD0K80qZ-os4JVBqR_wNU" />
	<!-- Bing Webmaster -->
	<meta name="msvalidate.01" content="EEC1BA5595057A957BA1213EF1E09C34" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Muli:200,300,400" rel="stylesheet">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113865004-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-113865004-2'); </script>

	<?php wp_head(); ?>
</head>

<?php //The header opens the body tag, which will be closed in the footer. ?>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3F5P6V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <header id="nav-header">
        <div class="container">
            <div class="flex-logo">
				<?= the_custom_logo() ?>
				<p id="tagline"><?= get_bloginfo('description', 'display'); ?></p>
			</div>
		</div>
	</header>