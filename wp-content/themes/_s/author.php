<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
$totalReadingTime = 0;
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$authorID = $curauth->id;
$authorNiceName = $curauth->user_nicename;
$authorFirstName = $curauth->first_name;
$authorLastName = $curauth->last_name;
?>

<?php
$authorPosts = new WP_Query();
$authorPosts->query(array('author' => $authorID));

while ($authorPosts->have_posts()) :
    $authorPosts->the_post();
$content = apply_filters('the_content', $post->post_content);
$totalReadingTime += getReadingTime($content);
endwhile;

$count = $authorPosts->post_count;

?>


<div id="author-page">
<h1><?= $authorFirstName ?> <?= $authorLastName ?></h1>
<h3><?php echo $count; ?> articles • <?php echo timeUnits($totalReadingTime) ?> reading time</h3>

<div class="author-image"><?php echo get_avatar(get_the_author_meta('ID'), 400); ?></div>

<p id="author-description">
<?php $authorDesc = the_author_meta('description');
echo $authorDesc; ?>
</p>
<!-- <hr class="style-one"> -->
</div>

<div class="author-page-flex">



    
    <?php

    while ($authorPosts->have_posts()) :
        $authorPosts->the_post();
    $content = apply_filters('the_content', $post->post_content);
    require('post-preview.php');
    $totalReadingTime += getReadingTime($content);
    ?>





<?php
endwhile;
?>
</div>

            </div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
?>

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
        $('#author-description').append(`<a href="${autoSocialIcons[key]['URL']}"><img class="social-icon" src="${autoSocialIcons[key]['imageURL']}" alt="${autoSocialIcons[key]['URL']}" height="30px" width="30px"></a>`);
    };
});


</script>

<!--FUNCTIONS -->

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

// TIME UNITS
function timeUnits($num)
{
    if ($num <= 1) {
        return '1 minute';
    } else if ($num < 60) {
        return $num . ' minutes';
    } else if ($num < 120) {
        $mins = $num % 60;
        return '1 hour ' . $mins . ' minutes';
    } else {
        $hours = floor($num / 60);
        $mins = $num % 60;
        return $hours . ' hours ' . $mins . ' minutes';
    }
}