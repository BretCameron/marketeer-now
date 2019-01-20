<?php

/**
 * The header for our theme, which displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Marketeer_Now
 * @author Bret Cameron <bretcameron@gmail.com>
 */

?>

<!-- The header contains the HTML and Head tags. -->
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Muli:200,300,400" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<!-- The header opens the body tag, which will be closed in the footer.  -->
<body <?php body_class(); ?>>

    <header id="nav-header">
        <div class="container">
            <div class="flex-logo">
				<?= the_custom_logo() ?>
				<p id="tagline"><?= get_bloginfo('description', 'display'); ?></p>
			</div>
		</div>
	</header>