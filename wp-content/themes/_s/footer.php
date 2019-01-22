<?php

/**
 * The template for displaying the footer, which contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Marketeer_Now
 * @author Bret Cameron <bretcameron@gmail.com>
 */

?>

</div><!-- #content -->


<footer id="colophon" class="footer-top site-footer">
	<div class="container">
		<br><p><a href="https://marketeernow.com/privacy-policy/" class="footer-link">Privacy Policy</a></p>
		<p><a href="#" class="footer-link">© <span itemprop="publisher">Marketeer Now</span> 2019</a>
		<br>Website by <a href="https://linkedin.com/in/bretcameron/" class="footer-link">Bret Cameron</a></p>
	</div>
</footer>


<?php 
/**
 * The wp_footer() function prints scripts before the closing body tag, and creates the navigation bar for admin mode.  
 */
wp_footer();
?>

</body>
</html>


<?php 
/**
 * The footer loads JQuery 3.3.1 after the closing of the <body> and <html> tags.  
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>