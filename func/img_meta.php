<?php 
#img meta box 
#add first 3 images of the products
// $img_meta=array(//set the meta info
	// "showpic"=>array(
		// "name"=>"meta_pic",
		// "std"=>__("展示图片"),
		// "title"=>__("展示图片"),
	// ),
// );
//style to show the meta
// function set_img_meta(){
	// global $post,$img_meta;
	// foreach($img_meta as $meta){
		// $pic_info=get_post_meta($post->ID,$meta['name'].'_value',TRUE);
		// if($pic_info==''){
			// $pic_info=$meta['std'];
		// }
		// echo '<input type="hidden" name="'.$meta['name'].'_noncename" id="'.$meta['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		// echo '<input type="button"  id="upload_img_meta"  value='.$meta['title'].'> <br />'; 
		// echo '<input type="hidden" name="'.$meta['name'].'_value" value='.$pic_info.'> ';
	// }
// }
//add to post page
// function create_img_meta(){
	// if(function_exists('add_meta_box')){
		// add_meta_box('img_meta',__('展示图片'),'set_img_meta','product','normal','high');
	// }
// }
//add a class for img meta
$img_meta=array(//set the meta info
	"name"=>"meta_pic",
	"std"=>__("展示图片"),
	"title"=>__("展示图片"),
);
class imgMeta{
	function __construct(){
	}
	public function getImgMeta(){
		global $post,$img_meta;
		
		$img_meta_option=get_post_meta($post->ID,$img_meta['name'].'_val',TRUE);//meta_pic_val=array(0=>xxx,1=>xxx,)
		
		if(!is_array($img_meta_option)){
			$img_meta_option['0']='';
			// update_option('imgmetaoption',$img_meta_option);
		}
		return $img_meta_option;//array(0=>xxx,1=>xxx,2=>xxx)
	}
	public function init(){
		imgMeta::getImgMeta();
		add_meta_box('img_meta',__('展示图片'),array('imgMeta','display'),'product','normal','high');
	}
	public function savePost(){
		global $post,$img_meta;
		
		
		$img_meta_option=imgMeta::getImgMeta();
		
		if(!wp_verify_nonce($_POST[$img_meta['name'].'_noncename'],plugin_basename(__FILE__) ) ) { leezlog('veryerror');return $post->ID; }
		
		if('page'==$_POST['post_type']){
			if(!current_user_can('edit_page',$post->ID ) ) {leezlog('no authorition '); return $post->ID;}
		}else{
			if(!current_user_can('edit_post',$post->ID ) ) {leezlog('no authorition post'); return $post->ID;}
		}// no authorition

		$data=$_POST['img'];
		
		$jsondata=json_encode($data);
		
		leezlog('data:'.$jsondata);
		leezlog('name:'.$img_meta['name'].'_val');
		
		$tmp=get_post_meta($post->ID,$img_meta['name'].'_val',FALSE);
		leezlog('saved:'.$tmp);
		
		if(get_post_meta($post->ID,$img_meta['name'].'_val')==""){
			leezlog('add'.$data[0]);
			add_post_meta($post->ID,$img_meta['name'].'_val',$data,TRUE);//not allow to add the unique data
		}elseif($data!=get_post_meta($post->ID,$img_meta['name'].'_val',FALSE)){
			leezlog('update'.$data[0]);
			update_post_meta($img_meta['name'].'_val',$data);
		}elseif($data=''){
			leezlog('delete'.$data[0]);
			delete_post_meta($post->ID,$img_meta['name'].'_val',get_post_meta($post->ID,$img_meta['name'].'_val',FALSE));
		}else{leezlog('nothing');}
	}
	public function display(){
		global $img_meta;
		$img_meta_option=imgMeta::getImgMeta();
		echo '<input type=button class="additem" value="'.__('添加').'"><div class="clear"></div>';
		echo '<input type="hidden"  name="'.$img_meta['name'].'_noncename" value="'.wp_create_nonce(plugin_basename(__FILE__)).'"/>';
		foreach($img_meta_option as $key=>$value){//set the id for the img meta 
?>
		
			<label id="imgmetaid">
				<input type="text" class="imgmetaurl" id="img_<?php echo $key;?>" name="img[<?php echo $key;?>]" value="<?php echo $value;?>" >
				<input type="button" class="upimg" value="<?php _e('上传'); ?>">
				<div class="clear"></div>
			</label>
		
<?php 
		}//end foreach
	}
}
add_action('admin_menu',array('imgMeta','init'));
add_action('save_post',array('imgMeta','savePost'));
// add_action('admin_menu','create_img_meta');
//function to add js
wp_enqueue_script('my_upload',get_bloginfo('stylesheet_directory').'/js/upload.js');

wp_enqueue_script('thickbox');
wp_enqueue_style('thickbox');