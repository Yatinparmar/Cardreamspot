<?php
 /**
  * Title: Main Header
  * Slug: fse-travel-agent/main-header
  */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"}}},"backgroundColor":"secondary-bg-color","layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group has-secondary-bg-color-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"background","fontSize":"extra-small"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color has-extra-small-font-size" style="font-style:normal;font-weight:700"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','fse-travel-agent'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}}},"className":"lower-header"} -->
<div class="wp-block-columns are-vertically-aligned-center lower-header" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:0;padding-bottom:var(--wp--preset--spacing--40);padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"30%","className":"header-logo"} -->
<div class="wp-block-column is-vertically-aligned-center header-logo" style="flex-basis:30%"><!-- wp:site-title {"textColor":"foreground"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"header-nav"} -->
<div class="wp-block-column is-vertically-aligned-center header-nav" style="flex-basis:50%"><!-- wp:navigation {"overlayBackgroundColor":"secondary-bg-color","overlayTextColor":"background","className":"nav-menu","layout":{"type":"flex","justifyContent":"left"},"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
<!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Services","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Rooms","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Blog","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Page","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"20%","className":"header-btn"} -->
<div class="wp-block-column is-vertically-aligned-center header-btn" style="flex-basis:20%"><!-- wp:buttons {"className":"header-button","layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons header-button"><!-- wp:button {"backgroundColor":"foreground","textColor":"background","style":{"border":{"radius":"0px"},"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"left":"var:preset|spacing|50","right":"var:preset|spacing|50","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<div class="wp-block-button" style="font-style:normal;font-weight:700"><a class="wp-block-button__link has-background-color has-foreground-background-color has-text-color has-background wp-element-button" style="border-radius:0px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--50)"><?php esc_html_e('Login','fse-travel-agent'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->