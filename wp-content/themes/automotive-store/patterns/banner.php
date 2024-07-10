<?php
/**
 * Title: Banner
 * Slug: automotive-store/banner
 * Categories: automotive-store, banner
 */
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"background":"#cce3e2"}},"className":"bannerimage","layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group bannerimage has-background" style="background-color:#cce3e2;margin-top:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:column {"width":"50%","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"base"} -->
<div class="wp-block-column has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);flex-basis:50%"><!-- wp:query {"queryId":4,"query":{"perPage":"2","pages":"2","offset":0,"postType":"product","order":"desc","orderBy":"popularity","author":"","search":"","exclude":[],"sticky":"","inherit":false,"__woocommerceAttributes":[],"__woocommerceStockStatus":["instock","outofstock","onbackorder"]},"namespace":"woocommerce/product-query","layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"products-block-post-template","layout":{"type":"grid","columnCount":2},"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->
<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->

<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.75rem","top":"0"}}},"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","fontSize":"small"} /-->

<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"50%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:50%"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/images/slide1-2.jpg'); ?>","id":67,"dimRatio":70,"overlayColor":"heading","minHeight":600,"minHeightUnit":"px","align":"wide","style":{"border":{"radius":"12px"}},"className":"banner-image-cover","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignwide banner-image-cover" style="border-radius:12px;min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-heading-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-67" alt="" src="<?php echo esc_url( get_template_directory_uri() . '/images/slide1-2.jpg'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center","align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns alignfull are-vertically-aligned-center" style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"100%","className":"banner-text"} -->
<div class="wp-block-column is-vertically-aligned-center banner-text" style="flex-basis:100%"><!-- wp:heading {"textAlign":"center","level":3,"style":{"elements":{"link":{"color":{"text":"#ff0000"}}},"typography":{"fontSize":"26px","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"left":"0"}},"color":{"text":"#ff0000"}}} -->
<h3 class="wp-block-heading has-text-align-center has-text-color has-link-color" style="color:#ff0000;padding-left:0;font-size:26px;font-style:normal;font-weight:700">Maquinaria Gear</h3>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"textTransform":"none","fontStyle":"normal","fontWeight":"800","fontSize":"300px","lineHeight":"0.9"},"color":{"text":"#ffb91f"},"elements":{"link":{"color":{"text":"#ffb91f"}}}},"className":"number-heading","fontFamily":"josefin_sans"} -->
<h1 class="wp-block-heading has-text-align-center number-heading has-text-color has-link-color has-josefin-sans-font-family" style="color:#ffb91f;font-size:300px;font-style:normal;font-weight:800;line-height:0.9;text-transform:none">25</h1>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|luminous-vivid-amber"}}},"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1"}},"textColor":"luminous-vivid-amber"} -->
<h1 class="wp-block-heading has-text-align-center has-luminous-vivid-amber-color has-text-color has-link-color" style="font-style:normal;font-weight:600;line-height:1">% OFF</h1>
<!-- /wp:heading -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","textColor":"base","style":{"border":{"radius":"0px"},"typography":{"textTransform":"capitalize"},"color":{"background":"#ff0000"}},"className":"is-style-fill","fontFamily":"merriweather"} -->
<div class="wp-block-button is-style-fill has-merriweather-font-family" style="text-transform:capitalize"><a class="wp-block-button__link has-base-color has-text-color has-background has-text-align-center wp-element-button" style="border-radius:0px;background-color:#ff0000">Shop Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->