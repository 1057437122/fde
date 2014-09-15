<?php
//tools for the function 
//get the image for different categories with the name of "cat_"+ID(create an image for the category and named it with "cat_"+ID)
function get_cat_img(){
	$cat_id=the_category_ID(FALSE);
	$uri=get_stylesheet_directory_uri();
	$dft_img=$uri.'/img/cat_1.png';
	$cat_img=$uri.'/img/cat_'.$cat_id.'.png';
	leezlog($dft_img);
	leezlog($cat_img);
	if(file_exists($cat_img)){
		return $cat_img;
	}else{
		return $dft_img;
	}
}
#TEMPLATE_DIRECTORY/FUNC/TOOLS.PHP