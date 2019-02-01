<?php

/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Marketeer_Now
 * @author Bret Cameron <bretcameron@gmail.com>
 */

get_header(); // The site's header
?>

<?php

/**
 * LIGHTBOX:
 * $featuredImageURL obtains the full-sized "featured image" used for the post. This is loaded for a lightbox, which sits outside of the main content of the page.
 * It must be loaded here in order to pull the correct image (rather than an image from the other queries on this page.)
 */
$featuredImageURL = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false)[0];
?>
<div class="lightbox-window hidden">
	<div id="featured-lightbox" class="container">
		<img class="lightbox-img" src="<?= $featuredImageURL ?>">
	</div> <!-- .lightbox-window .hidden -->
</div> <!-- #featured-lightbox .container -->
<!-- End of LIGHTBOX -->

<?php 
/**
 * PROGRESS BAR:
 * This is a {position: sticky} progress bar which represents the percentage of the page which has been scrolled.
 */
?>
<div id="progress-bar"></div>
<!-- End of PROGRESS BAR -->


<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">

			
<?php
while (have_posts()) :
	the_post();
/**
 * FLEX ARTICLE:
 * On wider displays, the page's main will be divided into two sections.
 * - 1. The article section (.article-block)
 * - 2. The side section, which chiefly contains related articles (.related-block)
 * The sections are arranged using .flex-article (which has {display: flexbox}): 
 */
?> 
			
<div class="flex-article">
	<!-- 1. THE ARTICLE SECTION -->
	<div class="article-block" itemscope itemtype="https://schema.org/Article">
	  
	<!-- META TAGS -->
	<link itemprop="mainEntityOfPage" href="<?php the_permalink() ?>">
  	<div itemprop="publisher" itemscope="Marketeer Now" itemtype="https://schema.org/Organization">
	<meta itemprop="name" content="Marketeer Now">
		<div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="			
			<?php 
		$custom_logo_id = get_theme_mod('custom_logo');
		$custom_logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
		echo $custom_logo_image[0];
		?>
		">
		</div>
		<link itemprop="sameAs" href="https://marketeernow.com">
	</div>

<!-- The post image -->
<?php
marketeer_now_post_thumbnail();
?>
<meta itemprop="image" content="<?= $featuredImageURL ?>">
			
<!-- The expand image icon -->
<svg id="expand-image" viewBox="0 0 100 100">
	<title>Expand Image</title>
	<path d="M86.86,37.22c-.58-.53-1.18-1-1.73-1.59C82.4,32.8,79.66,30,77,27.09c-.77-.82-1.25-.74-2,0Q66.29,36.3,57.52,45.42c-.44.45-.91.88-1.34,1.31l-4.36-4.64c.74-.8,1.56-1.71,2.41-2.59L70.37,22.65c1.17-1.21,1.16-1.22,0-2.43q-4.5-4.71-9-9.43a6.46,6.46,0,0,1-.51-.74h26Z"/>
	<path d="M11.72,61.36c.6.56,1.23,1.09,1.8,1.68,2.76,2.86,5.52,5.72,8.24,8.61.64.68,1.06.68,1.71,0q9-9.48,18.11-18.9c.28-.3.58-.58.87-.86l4.33,4.61c-.15.19-.38.51-.65.8L28.47,75.73a6,6,0,0,1-.54.58c-.75.63-.59,1.17,0,1.81,3.05,3.15,6.08,6.34,9.1,9.51a8.4,8.4,0,0,1,.67.9h-26Z"/>
	<path d="M96.1,100H4.15a3.91,3.91,0,0,1-3.9-3.9V4.15A3.91,3.91,0,0,1,4.15.25H96.1a3.91,3.91,0,0,1,3.9,3.9V96.1A3.91,3.91,0,0,1,96.1,100ZM4.15,3.16a1,1,0,0,0-1,1V96.1a1,1,0,0,0,1,1H96.1a1,1,0,0,0,1-1V4.15a1,1,0,0,0-1-1Z"/>
</svg> <!-- #expand-image -->

<!-- The vertical social sharing icons, which appear on larger displays -->
<div class="vertical-icons">
	<?php require('social-icons.php'); ?>
</div>

<!-- The post title -->
<h1 id="headline" itemprop="headline"><?= the_title() ?></h1>

<!-- The byline, featuring the name of the author and the date and time of publication -->
<p class="by-line">
	By 
	<span itemprop="author"><a href="
	<?php 
$authorURL = get_author_posts_url(get_the_author_meta('ID'));
echo $authorURL;
?>"><?php the_author(); ?></a></span>
	 — 
	<time itemprop="datePublished" datetime="<?php echo the_date('Y-m-d\TH:i') ?>">
	<?= the_time("l, F jS, Y \a\\t g:i A") ?>
	</time>
</p>

<!-- The post read time, and social sharing icons on less wide displays -->
<div class="read-time">
	<br><?= getReadingTime(get_the_content()); ?><br><br>
	<div class="horizontal-icons">
		<hr class="style-one">
		<?php require('social-icons.php'); ?>
	</div> <!-- .horizontal-icons -->
		<hr class="style-one">
</div> <!-- .read-time -->

<!-- The excerpt of the post -->
<?php 
function wpb_custom_excerpt($output)
{
	if (has_excerpt()) {
		$output = strip_tags($output);
		$output = '<p class="excerpt" itemprop="description">' . $output . '</p>';
		return $output;
	}
	return false;
}
add_filter('the_excerpt', 'wpb_custom_excerpt');

the_excerpt();
?>

<!-- The main text of the post -->
<div id="articleBody" itemprop="articleBody"><?= the_content() ?></div><br>

	<div class="last-modified">
	Last modified on 
	<time itemprop="dateModified" datetime="<?php echo the_modified_date('Y-m-d\TH:i') ?>">
	<?php the_modified_date("l, F jS, Y \a\\t g:i A") ?>
	</time>	
	</div>
	<br><br>



	</div> <!-- .article block -->

	<!-- 2. THE RELATED SECTION -->
<div class="related-block">
<h2>Recent Stories</h2>
	
	
<?php
// Show a certain number of recent articles, but remove the main article from the selection
$relatedPosts = new WP_Query('posts_per_page=5');
$postid = get_the_ID();
while ($relatedPosts->have_posts()) : $relatedPosts->the_post();
if (get_the_ID() !== $postid) :
	$content = apply_filters('the_content', $post->post_content);
?>

<!-- Each related article is wrapped in a link to the full article -->
<a class="permalink" href="<?php the_permalink(); ?>">
<div class="related-img-wrapper">					
	<div class="related-stories-img"><?php marketeer_now_post_thumbnail(); ?></div>
</div> <!-- .related-img-wrapper -->
<div class="related-title"><?= the_title() ?></div><br>
</a> <!-- .permalink -->

<?php
// End of the related article loop
endif;
endwhile;
?>

<!-- EMAIL SIGN-UP -->
<div class="display-none"> <!-- Temporarily {display: none} while the back-end is yet to be built -->
	<hr class="style-one"><br>
	<h2>Don't miss a story</h2>
	<div style="text-align:center;">Get the highlights of Marketeer Now straight to your inbox, once a week.</div>
	<form class="sidebar-form" action="<?= the_permalink() ?>" method="post">
		<input type="text" name="email_address" value="<?php echo esc_attr($_POST['email_address']); ?>" placeholder="name@email.com"><br><br>
		<input type="submit" name="submit" value="Sign Up">
		<button type="button">Sign up</button>
	</form>
</div> <!-- .display-none -->


<br><hr class="style-one">

				</div>
			</div>	

		
		<!-- SOCIAL SHARE BUTTONS -->
<div class="horizontal-icons">
<?php require('social-icons.php'); ?>
</div>
		<hr class="style-one">
<div class="container author-container">

<?php
endwhile;
while (have_posts()) :
	the_post();
$authorURL = get_author_posts_url(get_the_author_meta('ID'));
?>

<div class="about-the-author">
<a href="<?= $authorURL ?>"><h3><?= the_author_meta('first_name') ?> <?= the_author_meta('last_name') ?></h3></a>

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
<h2>Recent Stories</h2>

<div class="related2-flex">
					<?php

				$relatedPosts2 = new WP_Query('posts_per_page=10');
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
	</div><!-- .container -->
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
        authorDescription = authorDescription.replace(autoSocialIcons[key]['regex'], '');
        $('#author-description').html(authorDescription);
    };
});

$('#author-description').append('<br><br>');

Object.entries(autoSocialIcons).forEach(([key, value]) => {
    if (autoSocialIcons[key]['URL']) {
        $('#author-description').append(`<a href="${autoSocialIcons[key]['URL']}" target="_blank"><img class="social-icon" src="${autoSocialIcons[key]['imageURL']}" alt="${autoSocialIcons[key]['URL']}" height="30px" width="30px"></a>`);
    };
});



// PROGRESS BAR
$(window).scroll(function (){
	let maxScroll = $(document).height() - $(window).height();
	let scroll_pos = $(this).scrollTop();
	let width = (scroll_pos / maxScroll) * 100;
	$('#progress-bar').width(width + '%');
});


// FEATURED IMAGE LIGHTBOX
$('.article-block > .post-thumbnail > img').click(function () {
	if ($('.lightbox-window').hasClass('hidden')) {
		$('.lightbox-window').removeClass('hidden');
		$('#expand-image').addClass('hidden');
		$('.article-page-category').addClass('hidden');
		// REMOVE OVERLAP FROM NAVBAR
		if ($('.nav-content').css('display') != 'none') {
		openCategoriesDropdown();
		};
	};
});

$('.lightbox-window').click(function () {
	if (!$('.lightbox-window').hasClass('hidden')) {
		$('.lightbox-window').addClass('hidden');
		$('#expand-image').removeClass('hidden');
		$('.article-page-category').removeClass('hidden');
	};
});//.children().click(function(e) {
//   return false;
// });;


// EXPAND IMAGE ICON

$(document).ready(positionExpandImage);
$(window).resize(positionExpandImage);

function positionExpandImage() {
// SET DESIRED STANDARDS (pixels)
	const normalSize = 30;
	const normalPadding = 10;

	// RESIZE
	let initialHeight = $('.article-block > .post-thumbnail > img').height();
	let relativeHeight = initialHeight / 371.188;
	$('#expand-image').css('width', normalSize * Math.sqrt(relativeHeight)).css('height', normalSize * Math.sqrt(relativeHeight));
	
	// DEFINE COORDS
	let imageTop = $('.article-block > .post-thumbnail > img').offset().top;
	let imageLeft = $('.article-block > .post-thumbnail > img').offset().left;
	let imageWidth = $('.article-block > .post-thumbnail > img').width();
	let imageHeight = $('.article-block > .post-thumbnail > img').height();
	let iconWidth = $('#expand-image').width();
	let iconHeight = $('#expand-image').height();

// REPOSITION
	$('#expand-image').css('top',imageTop + normalPadding * Math.sqrt(relativeHeight)).css('left',imageLeft + imageWidth - iconWidth - normalPadding * Math.sqrt(relativeHeight));
	
};

// HOVER OVER IMAGE 
let originalOpacity = $('#expand-image').css('opacity');

$('.article-block > .post-thumbnail > img').hover(
	function () {
	$('#expand-image').animate({opacity: 1}, 100);
}, function () {
	$('#expand-image').animate({opacity: originalOpacity}, 100);
});


// REDUCE VERTICAL GAP CREATED BY VERTICAL SOCIAL ICONS


$(document).ready(removeVerticalIconGap);
$(window).resize(removeVerticalIconGap);

function removeVerticalIconGap() {
	let verticalIconsHeight = $('.vertical-icons').outerHeight();
	if ($('.vertical-icons').css('display') == 'none') {
		$('.article-block > .post-thumbnail').css('margin-bottom',0);
	} else {
		$('.article-block > .post-thumbnail').css('margin-bottom',-verticalIconsHeight);
		let headlineTop = $('#headline').offset().top;
		console.log(headlineTop);
	// 	$('.vertical-icons').css('top',-headlineTop);
	// 	$('.vertical-icons').css({
    // "-webkit-transform":"translateY("+headlineTop+")",
    // "-ms-transform":"translateY("+headlineTop+")",
    // "transform":"translateY("+headlineTop+")"
//   });​
	};
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