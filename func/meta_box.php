<?php 
//this is for the post metas

$product_meta_box=array(
	"model"=>array(
		"name"=>"_meta_mod",
		"std"=>__("默认型号"),
		"title"=>__("型号")
	),
	"specifications"=>array(
		"name"=>"_meta_spec",
		"std"=>__("无特殊规格"),
		"title"=>__("规格")
	),
	"area"=>array(
		"name"=>"_meta_area",
		"std"=>__("产地"),
		"title"=>__("产地")
	),
	"description"=>array(
		"name"=>"_meta_des",
		"std"=>__("无特殊描述"),
		"title"=>__("产品描述")
	),
	
);
function set_pro_meta(){
	global $post,$product_meta_box;
	foreach($product_meta_box as $meta){
		$meta_box_value=get_post_meta($post->ID,$meta['name'].'_value',TRUE);
		if($meta_box_value==""){
			$meta_box_value=$meta['std'];
		}
		echo '<input type="hidden" name="'.$meta['name'].'_noncename" id="'.$meta['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		echo'<h4>'.$meta['title'].'</h4>'; 
		echo '<input style="width:70%;" name="'.$meta['name'].'_value" value='.$meta_box_value.'> <br />'; 
	}
}
function create_meta_box(){
	global $theme_name;
	if(function_exists('add_meta_box')){
		add_meta_box('product_meta_box',__('产品参数'),'set_pro_meta','post','normal','high');
	}
}

function save_post_meta(){
	global $post,$product_meta_box;
	foreach($product_meta_box as $meta){
		if(!wp_verify_nonce($_POST[$meta['name'].'_noncename'],plugin_basename(__FILE__) ) ){
			return $post->ID;
		}//fail to verify 
		
		if('page'==$POST['post_type']){
			if(!current_user_can('edit_page',$post->ID ) ) {leezlog('no authorition '); return $post->ID;}
		}else{
			if(!current_user_can('edit_post',$post->ID ) ) {leezlog('no authorition post'); return $post->ID;}
		}// no authorition
		
		$data=$_POST[$meta['name'].'_value'];
		
		if(get_post_meta($post->ID,$meta['name'].'_value') == ""){
			leezlog('addthing');
			add_post_meta($post->ID,$meta['name'].'_value',$data,TRUE);
		}elseif($data!=get_post_meta($post->ID,$meta['name'].'_value',TRUE)){
			leezlog('update data:'.$post->ID.$meta['name'].'_value');
			update_post_meta($post->ID,$meta['name'].'_value',$data);
		}elseif($data==""){
			leezlog('delete');
			delete_post_meta($post->ID,$meta['name'].'_value',get_post_meta($post->ID,$meta['name'].'_value',TRUE));
		}
	}
}

add_action('admin_menu','create_meta_box');
add_action('save_post','save_post_meta');

#TEMPLATE_DIRECTORY/FUNC/META_BOX.PHP