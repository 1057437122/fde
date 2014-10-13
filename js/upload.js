jQuery(document).ready(function(){
	jQuery('#upload_img_meta').click(function(){
		formfield = jQuery('#img_meta').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
	
});