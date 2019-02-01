<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Marketeer_Now
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<div class="container">

<div class="container-404">

	<h1 id="title404"><?php esc_html_e('404'); ?></h1>
	
	
	<p><?php esc_html_e('Woops! It looks like nothing was found at this location. Maybe look through the articles below, or try a search?', 'marketeer-now'); ?></p>
	
	            <div class="search-404"><?php get_search_form($echo = true) ?></div>

</div>
			<div class="author-page-flex">
		<?php 

// The $latestPosts query returns a chosen number of the most recent posts. 
	$lostPosts = new WP_Query('posts_per_page=10');
	while ($lostPosts->have_posts()) : $lostPosts->the_post();

// IDs are defined here in order to remove the latest / featured post from the selection.
	$content = apply_filters('the_content', $post->post_content);
	require 'post-preview.php';
	endwhile;
	wp_reset_postdata();
// The end of the $latestPosts query. 

	?>

				</div><!-- .author-page-flex -->

			</div> <!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

?>

<!-- FUNCTIONS -->

<?php
// FUNCTION TO GET READING TIME
function getReadingTime($content, $wordsPerMinute = 200, $message = 'minute read')
{
	$readingTime = round(str_word_count(strip_tags($content)) / $wordsPerMinute);
	if ($readingTime == 0) {
		$readingTime += 1;
	}
	return $readingTime . ' ' . $message;
};


// FUNCTION TO RETURN A PREVIEW OF THE ARTICLE CONTENT
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