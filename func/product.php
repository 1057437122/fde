<?php 
/* 
Template Name: Products Archive 
@author:leez
@url:tech.leepine.com

*/
#new post type for the products
#func/product.php

add_action('init','product_init');

function product_init(){
	$labels=array(
		'name'=>__('产品名称'),
		'singular_name'=>__('产品名称'),
		'add_new'=>__('新增产品'),
		'add_new_item'=>__('新增产品'),
		'edit_item'=>__('编辑产品'),
		'new_item'=>__('新品'),
		'all_items'=>__('所有产品'),
		'view_item'=>__('查看产品'),
		'search_item'=>__('搜索'),
		'not_found'=>__('没有找到'),
		'not_found_in_trash'=>__('回收站里没找到'),
		'parent_item_colon'=>'',
		'menu_name'=>__('产品')
	);
	$args=array(
		'labels'=>$labels,
		'public'=>TRUE,
		'publicly_queryable'=>TRUE,
		'show_ui'=>TRUE,
		'show_in_nav_menus'=>TRUE,
		'show_in_menu'=>TRUE,
		'query_var'=>TRUE,
		'rewrite'=>array('slug'=>'product'),
		'capability_type'=>'post',
		'has_archive'=>TRUE,
		'hierarchical'=>FALSE,
		'menu_position'=>null,
		'supports'=>array('title','editor','author','thumbnail','excerpt','comments'),
		'has_archive'=>TRUE
	);
	register_post_type('product',$args);
}
//add a filter to load the right template for the post type
add_filter( 'template_include', 'include_template_function' );

function include_template_function($template_path){
	// return '/content/single-product.php';
	leezlog(get_post_type());
	if(get_post_type()=='product'){
		
		if(is_single()){
			if( $theme_file = locate_template( array('single-product.php' ) ) ) {
				leezlog('foundpath'.$template_path);
                $template_path = $theme_file;
            }else{
				
			}
		}elseif(is_archive()){
			if( $theme_file = locate_template( 'archive-product.php') ){
				$template_path=$theme_file;
			}
			leezlog('archive');
		}
		leezlog($template_path);
		
	}
	return $template_path;
}

//add taxonomy for the type 
add_action('init','product_genre');
function product_genre(){
	register_taxonomy(
		'product_genre',
		'product',
		array(
			'labels'=>array(),
			'show_ui'=>TRUE,
			'show_tagcloud'=>FALSE,
			'hierarchical'=>TRUE,
		)
	);
}