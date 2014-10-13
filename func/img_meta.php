<?php 
#img meta box 
#add first 3 images of the products
$img_meta=array(//set the meta info
	"showpic"=>array(
		"name"=>"meta_pic",
		"std"=>__("展示图片"),
		"title"=>__("展示图片"),
	),
);
//style to show the meta
function set_img_meta(){
	global $post,$img_meta;
	foreach($img_meta as $meta){
		$pic_info=get_post_meta($post->ID,$meta['name'].'_value',TRUE);
		if($pic_info==''){
			$pic_info=$meta['std'];
		}
		echo '<input type="hidden" name="'.$meta['name'].'_noncename" id="'.$meta['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		echo '<input type="button"  id="upload_img_meta"  value='.$meta['title'].'> <br />'; 
		echo '<input type="hidden" name="'.$meta['name'].'_value" value='.$pic_info.'> ';
	}
}
//add to post page
function create_img_meta(){
	if(function_exists('add_meta_box')){
		add_meta_box('img_meta',__('展示图片'),'set_img_meta','post','normal','high');
	}
}
add_action('admin_menu','create_img_meta');
//function to add js
wp_enqueue_script('my_upload',get_bloginfo('stylesheet_directory').'/js/upload.js');
wp_enqueue_script('thickbox');
wp_enqueue_style('thickbox');