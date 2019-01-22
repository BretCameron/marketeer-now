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

    <header id="nav-header">
        <div class="container">
            <div class="flex-logo">
				<?= the_custom_logo() ?>
				<p id="tagline"><?= get_bloginfo('description', 'display'); ?></p>
			</div>
		</div>
	</header>