<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marketeer_Now
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e('Nothing Found', 'marketeer-now'); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
	if (is_home() && current_user_can('publish_posts')) :

		printf(
		'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
			__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'marketeer-now'),
			array(
				'a' => array(
					'href' => array(),
				),
			)
		) . '</p>',
		esc_url(admin_url('post-new.php'))
	);

	elseif (is_search()) :
	?>

			<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'marketeer-now'); ?></p>
			<div class="search-404"><?php get_search_form($echo = true) ?></div>
			<?php
		else :
		?>

			<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'marketeer-now'); ?></p>
			<?php
		get_search_form();

		endif;
		?>

		<div class="author-page-flex">
		<?php 

// The $latestPosts query returns a chosen number of the most recent posts. 
	$noSearchPosts = new WP_Query('posts_per_page=10');
	while ($noSearchPosts->have_posts()) : $noSearchPosts->the_post();

// IDs are defined here in order to remove the latest / featured post from the selection.
	$content = apply_filters('the_content', $post->post_content);
	?>

<!-- IMAGE -->

			<div class="latest-post">
				<div class="image-wrapper">
					<div class="inner-image">
						<?php marketeer_now_post_thumbnail(); ?>
					</div>
				</div>
		<!-- CATEGORY -->
				<div class="flex-category">
					<div class="box-left">
						<!-- Transparent Placeholder -->
					</div>
					<div class="box-right">
						<?php the_category() ?>
					</div>
				</div>
		<!-- TITLE -->
				<a class="permalink" href="<?php the_permalink(); ?>">
					<h1>
						<?= the_title() ?>
					</h1>
                </a>
		<!-- CONTENT PREVIEW -->
				<a class="permalink" href="<?php the_permalink(); ?>">
					<p class="content-preview">
						<?php
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
                    </p>
                    <br>
				</a>                
		<!-- READ TIME -->
				<a class="permalink" href="<?php the_permalink(); ?>">
					<div class="read-time">
						<?= getReadingTime($content) ?>
					</div>
                </a>
			</div>


<?php
endwhile;
wp_reset_postdata();
// The end of the $noSearchPosts query. 

?>

				</div><!-- .author-page-flex -->

	</div><!-- .page-content -->
</section><!-- .no-results -->

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

