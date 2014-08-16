<?php
#theme for wanfujinan
function init(){
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );
	
}

add_action('after_setup_theme','init');
function theme_ctrl(){
	#function to setting the theme 
}
// add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'primary' => __( '导航菜单' ),
			'top-menu' => __( '顶部菜单' ),
		)
	);
}
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}