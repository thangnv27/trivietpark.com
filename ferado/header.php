<?php
/**
 * @version    1.5
 * @package    Ferado
 * @author     WooRockets Team <support@woorockets.com>
 * @copyright  Copyright (C) 2014 WooRockets.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.woorockets.com
 */
if(is_home() or is_front_page()){
    include 'inc/bbit-compress.php';
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" href="<?php echo home_url('/'); ?>TVPARK.jpg" type="image/x-icon">
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
	<?php wp_head(); ?>
        <style type="text/css">
            .woocommerce ul.products li.product, .woocommerce-page ul.products li.product{clear: none}
        </style>
</head>

<body <?php body_class(); wr_ferado_schema_metadata( array( 'context' => 'body' ) ); ?>>
	<?php if ( wr_ferado_theme_option( 'wr_loading' ) ) : ?>
		<div id="pageloader">
			<div id="loader"></div>
			<div class="loader-section left"></div>
			<div class="loader-section right"></div>
		</div>
	<?php endif; ?>
	
	<div id="page" class="hfeed site">
		
		<?php
			if ( 'header-v1' == wr_ferado_theme_option( 'wr_header_layout' ) ) {
				include_once get_template_directory() . '/inc/structure/header-v1.php';
			} else {
				include_once get_template_directory() . '/inc/structure/header-v2.php';
			}
		?>

		<div id="content" class="site-content">