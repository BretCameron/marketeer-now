<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marketeer_Now
 */

?>

	</div><!-- #content -->

<!-- FOOTER -->




<!-- SOCIAL MEDIA ICONS -->
<footer id="colophon" class="footer-top site-footer">
	<div class="container">
		<p>© Bret Cameron 2019
			<br>
			<a href="https://linkedin.com/in/bretcameron/" class="footer-link">https://linkedin.com/in/bretcameron/</a>
		</p>
	</div>
</footer>
<!-- END OF FOOTER -->


<?php wp_footer(); ?>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>




// $(document).ready(positionFooter);
// $(window).resize(positionFooter);

function positionFooter() {
	let bottomOfScreen = $(window).height();//scrollTop() + $(window).height();
	let bottomOfColophon = $('#colophon').offset().top + $('#colophon').outerHeight();
	let colophonHeight = $('#colophon').outerHeight();
	if (bottomOfScreen > bottomOfColophon) {
		$('#colophon').css('position','absolute').css('right',0).css('bottom',0).css('left',0);
		;//.css('margin-top', bottomOfScreen - bottomOfColophon);//css('position', 'fixed').css('top',bottomOfScreen - colophonHeight).width($(window).width());
	} else {
		$('#colophon').css('position','').css('right','').css('bottom','').css('left','');//.removeAttr('position').removeAttr('top').removeAttr('width');//css('position', 'static');//.css('top',bottomOfScreen - colophonHeight).width($(window).width());
	};
};



</script>

