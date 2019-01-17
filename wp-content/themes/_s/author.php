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
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$authorID = $curauth->id;
$authorNiceName = $curauth->user_nicename;
$authorFirstName = $curauth->first_name;
$authorLastName = $curauth->last_name;
?>
<br>

<div id="author-page">
<h1><?= $authorFirstName ?> <?= $authorLastName ?></h1>

<div class="author-image"><?php echo get_avatar(get_the_author_meta('ID'), 400); ?></div>

<p id="author-description">
<?php $authorDesc = the_author_meta('description');
echo $authorDesc; ?>
</p>

            <?php
            $authorPosts = new WP_Query();
            $authorPosts->query('author=' . $authorID);

            while ($authorPosts->have_posts()) :
                $authorPosts->the_post();
            $content = apply_filters('the_content', $post->post_content);
            ?>





<?php
endwhile;

?>

            </div><!-- .container -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();