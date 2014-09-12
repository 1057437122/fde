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
				$ret_str.="><li id=".$sub->term_id."><a href=".$lnk.'>'.$sub->name."</a></li";
			}
		}
		$ret_str.="></ul>";
		echo $ret_str;
	}
}
add_filter('show_sub_catgory','show_sub_cats',10);

function get_show_pics(){//set default get 3 pictures as the show picture
	global $post,$posts;
	$pat='/<img.+?src=[\'"]([^\'"]+)[\'"].+?>/i';
	$output=preg_match_all($pat,$post->post_content,$matches);
	$dftpic=site_url().'/static/img/dftpic.jpg';
	$ret=Array();
	if(!empty($matches[1])){
		// return $matches[1];
		
		$ret[0]=$matches[1][0];
		isset($matches[1][1]) ? $ret[1]=$matches[1][1] :  $ret[1]=$dftpic;
		isset($matches[1][2]) ? $ret[2]=$matches[1][2] :  $ret[1]=$dftpic;
		
		return $ret;
	}
	return FALSE;
}
if(function_exists('register_sidebar_widget')){
	register_sidebar( array(
 
	'name' => __( 'Right Sider Bar', 'mytheme' ),
	 
	'id' => 'sidebar-1',
	 
	'description' => __( 'Mytheme SiderBar', 'mytheme' ),
	 
	'before_widget' => '<div class="widget"><aside id="%1$s">',
	 
	'after_widget' => "</aside></div>",
	 
	'before_title' => '<h3>',
	 
	'after_title' => '</h3>',
 
) );
}