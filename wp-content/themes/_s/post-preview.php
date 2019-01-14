<?php

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