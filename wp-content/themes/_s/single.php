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
the_category();
marketeer_now_post_thumbnail();
?>


					<h1>
						<?= the_title() ?>
					</h1>
               
			   <p class="by-line">By <?php the_author(); ?> — <?= the_time("l, F jS, Y \a\\t g:i A") ?></p>

					<div class="read-time">
						<br>
						<?= getReadingTime(get_the_content()); ?>
					</div>
					<!-- <hr class="style-one" style="width: 90%;"> -->
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
$authorURL = get_author_posts_url(get_the_author_meta('ID'));
?>

<div class="about-the-author">
<a href="<?= $authorURL ?>"><h3>About <?= the_author_meta('first_name') ?> <?= the_author_meta('last_name') ?></h3></a>

<div class="flex-author">
<a href="<?= $authorURL ?>"><div class="author-image"><?php echo get_avatar(get_the_author_meta('ID'), 400); ?></div></a>

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
<br>
<h2>Related Stories</h2>

<div class="related2-flex">
					<?php

				$relatedPosts2 = new WP_Query('posts_per_page=5');
				$postid = get_the_ID();

				while ($relatedPosts2->have_posts()) : $relatedPosts2->the_post();

				if (get_the_ID() !== $postid) :
					$content = apply_filters('the_content', $post->post_content);
				?>

<a class="permalink" href="<?php the_permalink(); ?>">
<div class="related-img-wrapper related2">		
<div class="related-stories-img">
						<?php marketeer_now_post_thumbnail(); ?>
					</div></div>
				
					<div class="related-title"><?= the_title() ?></div>
					<br>
				
				</a>
				
				<?php
			endif;
			endwhile;
			?>
</div>


	</main><!-- #main -->
</div><!-- #primary -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

// AUTOMATIC SOCIAL ICONS
// Define Regex
const regexLinkedIn = /https?:\/\/(www\.)?linkedin\.com\/(in\/)?([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;
const regexTwitter = /https?:\/\/(www\.)?twitter\.com\/([-a-zA-Z0-9@:%_\+.~#?&//=]*)/;

const autoSocialIcons = {
	LinkedIn: {
		regex: /https?:\/\/(www\.)?linkedin\.com\/(in\/)?([-a-zA-Z0-9@:%_\+.~#?&//=]*)/i,
		imageURL: 'https://dl.dropboxusercontent.com/s/1p8yi33ppon2msu/LinkedIn.svg?dl=0'
	},
	Twitter: {
		regex: /https?:\/\/(www\.)?twitter\.com\/([-a-zA-Z0-9@:%_\+.~#?&//=]*)/i,
		imageURL: 'https://dl.dropboxusercontent.com/s/x0u21ib0lqj2hxs/Twitter.svg?dl=0'
	},
	Facebook: {
		regex: /https?:\/\/(www\.)?facebook\.com\/([-a-zA-Z0-9@:%_\+.~#?&//=]*)/i,
		imageURL: 'https://dl.dropboxusercontent.com/s/upjji1970acdolv/Facebook.svg?dl=0'
	},
	YouTube: {
		regex: /https?:\/\/(www\.)?youtube\.com\/(channel\/)?([-a-zA-Z0-9@:%_\+.~#?&//=]*)/i,
		imageURL: 'https://dl.dropboxusercontent.com/s/auwjpg26afpb4qd/YouTube.svg?dl=0'
	}
	
};
let authorDescription = $('#author-description').text();

Object.entries(autoSocialIcons).forEach(([key, value]) => {
	if (autoSocialIcons[key]['regex'].test($('#author-description').text())) {
		autoSocialIcons[key]['URL'] = $('#author-description').text().match(autoSocialIcons[key]['regex'])[0];
		authorDescription = authorDescription.replace(autoSocialIcons[key]['regex'],'');
		$('#author-description').html(authorDescription);
	};
});

$('#author-description').append('<br><br>');

Object.entries(autoSocialIcons).forEach(([key, value]) => {
	if(autoSocialIcons[key]['URL']) {
		$('#author-description').append(`<a href="${autoSocialIcons[key]['URL']}"><img class="social-icon" src="${autoSocialIcons[key]['imageURL']}" alt="${autoSocialIcons[key]['URL']}" height="30px" width="30px"></a>`);
	};
});

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