<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Marketeer_Now
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
		<?php if (have_posts()) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
				printf(esc_html__('Search Results for: %s', 'marketeer-now'), '<span id="search-query">' . get_search_query() . '</span>');
				?>
				</h1>
			</header><!-- .page-header -->

<div class="search-page-flex">
			<?php
			/* Start the Loop */
		while (have_posts()) :
			the_post();

		/**
		 * Run the loop for the search to output the results.
		 * If you want to overload this in a child theme then include a file
		 * called content-search.php and that will be used instead.
		 */
		get_template_part('template-parts/content', 'search');

		endwhile;

		// the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>


	</div>
			</div><!-- .container -->
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
// get_sidebar(); //Temporarily disabled, while this theme has no sidebar
get_footer(); // The site's footer
?>

<?php

$content = apply_filters('the_content', $post->post_content);
function contentPreview($content, $numOfWords = 10)
{
	$content = str_replace(array("\r", "\n"), '', $content);
	$spaceString = str_replace('<', ' <', $content);
	$doubleSpace = strip_tags($spaceString);
	$singleSpace = str_replace('  ', ' ', $doubleSpace);
	$pieces = explode(" ", $singleSpace);
	$first_part = implode(" ", array_splice($pieces, 0, $numOfWords));
	return $first_part;
};