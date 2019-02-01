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
	<link defer href="https://fonts.googleapis.com/css?family=Muli:200,300,400" rel="stylesheet">
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

	<nav class="main-nav">

        <div class="mobile-nav nav-item">
            <a class="nav-link">≡</a>
        </div>
        <div class="container">
        <ul class="nav nav-horizontal">
            <li class="nav-item">
                <a href="<?= home_url() ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= home_url() . '/about-us' ?>">Our Mission</a>
            </li>
            <li id="categories" class="nav-item">
                <a class="nav-link">Categories <span style="font-size:6px;display:inline-block;transform:translateY(-2px);padding-left:5px;">╲╱</span></a>
                <div class="nav-content display-none">
                    <div class="nav-sub">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= home_url() . '/category/opinion' ?>">Opinion</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link">How-To</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= home_url() . '/write-for-us' ?>">Write For Us</a>
            </li>
            <div class="nav-search"><?php get_search_form($echo = true) ?></div>
        </ul>
        </div>
	</nav>
	

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $('.mobile-nav').click(function () {
            if ($('ul.nav').css('display') == 'none') {
                $('ul.nav').css('display', 'block');
                if (typeof positionExpandImage === "function") {
				positionExpandImage();
                };
            } else {
                $('ul.nav').css('display', 'none');
				if (typeof positionExpandImage === "function") {
				positionExpandImage();
                };
            }
        });
        
        //Open Categories Dropdown
        $('#categories').click(openCategoriesDropdown);

        //Prevent Children From Firing
        $('#categories .nav-content').click(function (e){
            e.stopPropagation();
        });
                
        function openCategoriesDropdown() {
            if ($('.nav-content').css('display') == 'none') {
                $('.nav-content').css('display', 'block');
				positionExpandImage();
            } else {
                $('.nav-content').css('display', 'none');
				positionExpandImage();
            }
        };

        $(document).ready(showDesktopNav);
        $(window).resize(showDesktopNav);

        function showDesktopNav() {
            if ($('.mobile-nav').css('display') != 'block') {
                $('.nav').css('display', 'block');
                $('.nav-content').css('display', 'none');
                $('.main-nav > .container').removeClass('no-padding');
            } else {
                $('.nav').css('display', 'none');
                $('.nav-content').css('display', 'none');
                $('.main-nav > .container').addClass('no-padding');
            }
        };



        ;</script>