<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<div class="off-canvas-wrapper">

	<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
		<?php wp_nav_menu(array('theme_location' => 'headerl', 'menu_class' => 'vertical menu')); ?>
		<?php wp_nav_menu(array('theme_location' => 'headerr', 'menu_class' => 'vertical menu', 'items_wrap' => my_nav_wrap())); ?>
	</div>

	<div class="off-canvas-content" data-off-canvas-content>
		<div data-sticky-container>
			<div data-sticky data-margin-top="0" style="width:100%" data-top-anchor="1">
				<header id="mainHeader">
					<div class="expanded row align-middle">
						<div class="small-12 medium-3 columns">

						</div>
						<div class="small-12 medium-6 columns text-center">
							<div id="logo">
								<?php
									if ( function_exists( 'the_custom_logo' ) ) {
										the_custom_logo();
									}
								?>
							</div>
						</div>
						<div class="small-12 medium-3 columns text-center">
							<?php wp_nav_menu(array('theme_location' => 'social', 'menu_class' => 'menu align-center')); ?>
						</div>
					</div>
					<div class="top-bar">
						<div class="top-bar-left show-for-medium">
							<?php wp_nav_menu(array('theme_location' => 'headerl')); ?>
						</div>
						<div class="top-bar-right show-for-medium">
							<?php wp_nav_menu(array('theme_location' => 'headerr', 'items_wrap' => my_nav_wrap())); ?>
						</div>
						<div class="top-bar-right show-for-small-only">
							<button type="button" class="button secondary" data-toggle="offCanvas"><i class="fa fa-bars" aria-hidden="true"></i></button>
						</div>
					</div>
				</header>
			</div>
		</div>
