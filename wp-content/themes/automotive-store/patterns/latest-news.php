<?php
/**
 * Title: Latest News
 * Slug: automotive-store/latest-news
 * Categories: automotive-store, latest-news
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained","wideSize":"83%","contentSize":"83%"}} -->
<div class="wp-block-group alignwide" style="padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"700"},"color":{"text":"#1b1c1e"}},"backgroundColor":"base","className":"productsec-heading","fontSize":"big","fontFamily":"josefin_sans"} -->
<h3 class="wp-block-heading has-text-align-center productsec-heading has-base-background-color has-text-color has-background has-josefin-sans-font-family has-big-font-size" style="color:#1b1c1e;font-style:normal;font-weight:700;text-transform:capitalize">Recent News</h3>
<!-- /wp:heading -->

<!-- wp:group {"align":"full","backgroundColor":"base","className":"recent-news-group","layout":{"type":"constrained","wideSize":"83%","contentSize":"83%"}} -->
<div class="wp-block-group alignfull recent-news-group has-base-background-color has-background"><!-- wp:query {"queryId":3,"query":{"perPage":3,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"layout":{"type":"constrained","wideSize":"100%"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":"5px","width":"1px"}},"borderColor":"luminous-vivid-amber","backgroundColor":"base","className":"is-style-bk-box-shadow-hover","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-bk-box-shadow-hover has-border-color has-luminous-vivid-amber-border-color has-base-background-color has-background" style="border-width:1px;border-radius:5px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)"><!-- wp:post-date {"textAlign":"center","format":"M j, Y"} /-->

<!-- wp:post-title {"textAlign":"center","level":5,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"}},"fontSize":"regular","fontFamily":"josefin_sans"} /-->

<!-- wp:post-excerpt {"textAlign":"center","moreText":"","showMoreOnNewLine":false,"excerptLength":10,"fontFamily":"merriweather"} /-->

<!-- wp:read-more {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}},"backgroundColor":"luminous-vivid-amber","textColor":"base"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results.","fontFamily":"merriweather"} -->
<p class="has-merriweather-font-family">There is no post found</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->