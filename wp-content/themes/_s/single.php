<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Marketeer_Now
 */


get_header();
?>


<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
		
			<div>


</div>
			
<?php $imgURL = get_avatar(the_author_meta('ID'));
// get_avatar_url(the_author_meta('ID')); 
?>


<?php
while (have_posts()) :
	the_post();
?> 
			
			<br>
			<div class="flex-article">
				<div class="article-block">
<?php

marketeer_now_post_thumbnail();
?>


					<h1>
						<?= the_title() ?>
					</h1>
               
			   <p>By <?php the_author(); ?> — <?= the_time("l, F jS, Y \a\\t g:i A") ?></p>

					<div class="read-time">
						<br>
						<?= getReadingTime(get_the_content()); ?>
					</div>
					<p><?= the_content() ?></p>
					<br>

				</div>
				<div class="related-block">
				
					<h2>Related Stories</h2>

					<?php

				$relatedPosts = new WP_Query('posts_per_page=5');
				$postid = get_the_ID();

				while ($relatedPosts->have_posts()) : $relatedPosts->the_post();

				if (get_the_ID() !== $postid) :
					$content = apply_filters('the_content', $post->post_content);
				?>
<a class="permalink" href="<?php the_permalink(); ?>">

<div class="related-img-wrapper">					
<div class="related-stories-img">
						<?php marketeer_now_post_thumbnail(); ?>
					</div></div>
				
					<div class="related-title"><?= the_title() ?></div>
					<br>
				
				</a>

<?php
endif;
				
				// require 'post-preview.php';
endwhile;

?>
<div class="display-none">
<hr class="style-one">
<br>
<h2>Don't miss a story</h2>
<div style="text-align:center;">Get the highlights of Marketeer Now straight to your inbox, once a week.<p>


<form class="sidebar-form" action="<?= the_permalink() ?>" method="post">

	<input type="text" name="email_address" value="<?php echo esc_attr($_POST['email_address']); ?>" placeholder="name@email.com">

	<br><br>
	
	<input type="submit" name="submit" value="Sign Up">
	
	<?php 

?>

<button type="button">Sign up</button>
</form>
</div>


<br><hr class="style-one">

				</div>
			</div>	
		</div><!-- .container -->

		<hr class="style-one">
<div class="container author-container">

<?php
endwhile;
while (have_posts()) :
	the_post();
?>

<div class="about-the-author">
<h3>About <?= the_author_meta('first_name') ?> <?= the_author_meta('last_name') ?></h3>

<div class="flex-author">
<div class="author-image"><?php echo get_avatar(get_the_author_meta('ID'), 32); ?></div>

<p id="author-description">
<?php $authorDesc = the_author_meta('description');
echo $authorDesc; ?>
</p>
		</div>
		</div>

<br>
</div>
<hr class="style-one">


<?php

endwhile; // End of the loop.
?>

	</main><!-- #main -->
</div><!-- #primary -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

// AUTOMATIC SOCIAL ICONS
// Define Regex
const regexLinkedIn = /https:\/\/[www\.]?linkedin\.com\/in\/\S*/;
const regexTwitter = /https:\/\/[www\.]?twitter\.com\/\S*/;

// Define URLs (if present)
let LinkedInURL = '';
if (regexLinkedIn.test($('#author-description').text())) {
	 LinkedInURL = $('#author-description').text().match(regexLinkedIn)[0];
	 console.log(LinkedInURL);
};

let TwitterURL = '';
if (regexTwitter.test($('#author-description').text())) {
	 TwitterURL = $('#author-description').text().match(regexTwitter)[0];
	 console.log(TwitterURL);
};

// Remove URLs From Text
let authorDesc = $('#author-description').text();
authorDesc = authorDesc.replace(regexLinkedIn,'').replace(regexTwitter,'').trim();
console.log(authorDesc);
$('#author-description').html(authorDesc);

// Append Social Icons
$('#author-description').append(
	`<br><br>`
)

if (LinkedInURL !== ''){
	$('#author-description').append(
	`<a target="_blank" href="${LinkedInURL}"><img class="social-icon" src="https://dl.dropboxusercontent.com/s/1p8yi33ppon2msu/LinkedIn.svg?dl=0" height="30px" width="30px"></a>`
);
};

if (TwitterURL !== ''){
	$('#author-description').append(
	`<a target="_blank" href="${TwitterURL}"><img class="social-icon" src="https://dl.dropboxusercontent.com/s/x0u21ib0lqj2hxs/Twitter.svg?dl=0" height="30px" width="30px"></a>`
);
};


</script>








<?php
// get_sidebar();
get_footer();

?>

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