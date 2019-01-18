<?php
$currentURL = home_url($wp->request);
$featuredImageURL = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false)[0];
?>


<!-- FACEBOOK -->
<a href="https://www.facebook.com/sharer/sharer.php?u=<?= $currentURL ?>" target="_blank"><img class="social-icon social-icon-large" src="https://dl.dropboxusercontent.com/s/abnb2wuf4tjrh6u/Facebook.svg?dl=0" alt="Share on Facebook"></a>
<!-- TWITTER -->
<a href="https://twitter.com/share?url=<?= $currentURL ?>&text=<?= the_title() ?>&hashtags=MarketeerNow" target="_blank"><img class="social-icon social-icon-large" src="https://dl.dropboxusercontent.com/s/ob40ouepc8qfe76/Twitter.svg?dl=0" alt="Tweet"></a>
<!-- LINKEDIN -->
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $currentURL ?>&title=LinkedIn%20Developer%20Network
&summary=My%20favorite%20developer%20program&source=LinkedIn" target="_blank"><img class="social-icon social-icon-large" src="https://dl.dropboxusercontent.com/s/2amnqal3ghrvfrq/LinkedIn.svg?dl=0" alt="Share on LinkedIn"></a>
<!-- PINTEREST -->
<a href="https://www.pinterest.com/pin/create/button/?url=<?= $currentURL ?>&media=<?= $featuredImageURL ?>&description=<?= the_title() ?>" target="_blank"><img class="social-icon social-icon-large" src="https://dl.dropboxusercontent.com/s/1wpaeaa91s2qjpo/Pinterest.svg?dl=0" alt="Pin It"></a>
<!-- FLIPBOARD -->
<a href="https://share.flipboard.com/bookmarklet/popout?title=<?= the_title() ?>&url=<?= $currentURL ?>" target="_blank"><img class="social-icon social-icon-large" src="https://dl.dropboxusercontent.com/s/ptwa5egbxmu4ava/Flipboard.svg?dl=0" alt="Pin It"></a>
<!-- REDDIT -->
<a href="https://reddit.com/submit?url=<?= $currentURL ?>&title=<?= the_title() ?>" target="_blank"><img class="social-icon social-icon-large" src="https://dl.dropboxusercontent.com/s/t0clm9nbpq5tqw8/Reddit.svg?dl=0" alt="Reddit It"></a>
<!-- EMAIL -->
<a href="mailto:?subject=<?= the_title() ?> | Marketeer Now&body=Article: <?= $currentURL ?>"><img class="social-icon social-icon-large" src="https://dl.dropboxusercontent.com/s/gooz572gd6ogwzs/Email.svg?dl=0" alt="Email"></a>
<!-- WHATSAPP -->
<a class="mobile-only" href="whatsapp://send?text=<?= $currentURL ?>" target="_blank"><img class="social-icon social-icon-large" src="https://dl.dropboxusercontent.com/s/oik1ko9txv9ukte/Whatsapp.svg?dl=0" alt="Reddit It"></a>





<?php ; ?>

<!-- https://share.flipboard.com/bookmarklet/popout?v=2&url=https%3A%2F%2Fwww.huffingtonpost.co.uk%2Fentry%2Fthe-waugh-zone-wednesday-january-16-2019_uk_5c3ef473e4b0922a21da2980 -->