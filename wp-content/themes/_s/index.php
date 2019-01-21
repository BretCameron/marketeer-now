<?php

/**
 * The main template file, and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query (e.g. in the absence of a home.php file, which this theme lacks).
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Marketeer_Now
 * @author Bret Cameron <bretcameron@gmail.com>
 */

get_header(); // The site's header
?>

<div id="primary" class="content-area"> 
	<div class="container">
		<main id="main" class="site-main">
			<br> <!-- A line between the header and the following content -->


<!-- LOOP 1 (Featured Post) -->
<?php
// The $featuredPost query returns a single, featured post. 
$featuredPost = new WP_Query();
$featuredPost->query('posts_per_page=1');
while ($featuredPost->have_posts()) :
	$featuredPost->the_post();
$content = apply_filters('the_content', $post->post_content);
?>

<div id="featured-post" class="latest-post">

<!-- The post image -->
	<div class="image-wrapper">
		<div class="inner-image">
			<?php marketeer_now_post_thumbnail(); ?>
		</div>
	</div> <!-- .image-wrapper -->

<!-- The post category -->
	<div class="flex-category">
		<div class="box-left"> <!-- A transparent section -->
		</div>
		<div class="box-right"> <!-- The section which holds the category -->
			<?php the_category() ?>
		</div>
	</div> <!--.flex-category -->

<!-- The post title -->
	<a class="permalink" href="<?php the_permalink(); ?>">
		<h1>
			<?= the_title() ?>
		</h1>
	</a> <!-- .permalink -->

<!-- A preview of the post's content -->
	<a class="permalink" href="<?php the_permalink(); ?>">
		<p class="content-preview">
			<?php
			// Manual excerpt overrides automatic excerpt (defined by the function contentPreview())
		if (has_excerpt()) {
			$excerpt = wp_strip_all_tags(get_the_excerpt());
			if (preg_match("/[\.!?,;:]$/", $excerpt)) {
				echo $excerpt;
			} else {
				echo $excerpt . '...';
			};
		} else {
			echo contentPreview($content) . '...';
		};
		?>
		</p><br>
	</a> <!-- .permalink -->

<!-- The post's read time -->
	<a class="permalink" href="<?php the_permalink(); ?>">
		<div class="read-time">
			<?= getReadingTime($content) ?>
		</div>
	</a> <!-- .permalink -->

</div> <!-- #featured-post .latest-post -->

<?php
endwhile;
wp_reset_postdata();
// The end of the $featuredPost query. 
?>

<!-- LOOP 2 (LATEST POSTS) -->
<h2>Latest Stories</h2>
<div class="latest-posts">

<?php
// The $latestPosts query returns a chosen number of the most recent posts. 
$latestPosts = new WP_Query('posts_per_page=5');
while ($latestPosts->have_posts()) : $latestPosts->the_post();

// IDs are defined here in order to remove the latest / featured post from the selection.
$ids[] = get_the_ID();
if (get_the_ID() !== $ids[0]) :
	$content = apply_filters('the_content', $post->post_content);
require 'post-preview.php';
endif;
endwhile;
wp_reset_postdata();
// The end of the $latestPosts query. 
?>

</div> <!-- .latest-posts -->
<br>
	
<!-- Below we close off the tags containing the page's main content -->
		</div><!-- .container -->
	</main><!-- #main -->
</div><!-- #primary -->


<?php
// get_sidebar(); //Temporarily disabled, while this theme has no sidebar
get_footer(); // The site's footer
?>

<?php
// PHP FUNCTIONS
// - FUNCTION TO GET READING TIME
function getReadingTime($content, $wordsPerMinute = 200, $message = 'minute read')
{
	$readingTime = round(str_word_count(strip_tags($content)) / $wordsPerMinute);
	if ($readingTime == 0) {
		$readingTime += 1;
	}
	return $readingTime . ' ' . $message;
};

// - FUNCTION TO RETURN A PREVIEW OF THE ARTICLE CONTENT
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