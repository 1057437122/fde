jQuery(document).ready(function(){
	jQuery('input.upimg').live('click',function(){
		// formfield = jQuery('.upimg').attr('name');
		targetfield=jQuery(this).prev('input');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
	window.send_to_editor = function(html) {
		 // this will execute automatically when a image uploaded and then clicked to 'insert to post' button
		imgurl = jQuery('img',html).attr('src');
		 // put uploaded image's url to #upload_image
		//jQuery('#upload_image').val(imgurl);
		jQuery(targetfield).val(imgurl);
		tb_remove();
    }
	jQuery('input.additem').click(function(){
		var $allimglength=jQuery("#imgmetaid .imgmetaurl").length;
		// alert($allimglength);
		if($allimglength<3){
			var $max_nu=jQuery("#imgmetaid .imgmetaurl").last().attr('id');
			var $new_id=parseInt($max_nu.substr(4))+1;
			
			// alert($max_nu);
			jQuery('#imgmetaid').append('<input type="text" class="imgmetaurl" id="img_'+$new_id+'" name="img['+$new_id+']" value="" ><input type="button" class="upimg" value="上传"><div class="clear"></div>');
		}else{
			alert('最多三张滑动展示图');
		}
	});
	
});