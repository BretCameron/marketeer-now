<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marketeer_Now
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">

				<?php
			// get_the_archive_title('<h2 class="page-title">', '</h2>');
			$archiveTitle = get_the_archive_title();
			$archiveTitle = str_replace('Category: ', '', $archiveTitle);
			?>
			<br>
			<h2><?php echo $archiveTitle; ?></h2>

			<div class="author-page-flex">
		<?php if (have_posts()) : ?>
			<header class="page-header">

			<?php
		the_archive_description('<div class="archive-description">', '</div>');
		?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
		while (have_posts()) :
			the_post();

				/*
		 * Include the Post-Type-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
		 */
		// $content = apply_filters('the_content', $post->post_content);
		$content = apply_filters('the_content', $post->post_content);
		// echo $content;
		get_template_part('template-parts/content', get_post_type());

		endwhile;


		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>

				</div><!-- .author-page-flex -->
			</div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
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