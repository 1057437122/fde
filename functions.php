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
/**/
function get_cat_child(){
	$cat_name=single_cat_title('',FALSE);
	// echo $cat_name;
	$parent_id=get_cat_ID($cat_name);
	$sub_cat_id=get_category_children($parent_id);//get the result '/9/10'
	$sub_id=explode('/',$sub_cat_id);
	$child=array();
	foreach($sub_id as $ids){	
		if(!empty($ids)){
			$child[]=get_category($ids);
		}
	}
	return $child;
}
function show_sub_cats($sub_class='',$sub_id=''){
	$subs=get_cat_child();
	if(!empty($subs)){
		$ret_str="<ul ";
		if(!empty($sub_class)){
			$ret_str.=" class=$sub_class ";
		}
		if(!empty($sub_id)){
			$ret_str.=" id=$sub_id ";
		}
		// print_r($subs);
		foreach($subs as $sub){
			if(!empty($sub)){
				$lnk=get_category_link($sub->term_id);
				$ret_str.="><li><a href=".$lnk.'>'.$sub->name."</a></li";
			}
		}
		$ret_str.="></ul>";
		echo $ret_str;
	}
}
add_filter('show_sub_catgory','show_sub_cats',10);