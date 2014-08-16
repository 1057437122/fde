<?php
#
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<title>
<?php bloginfo('name');?>
</title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/style.css" />
<?php if(is_home() || is_front_page()){ //if is index show the slider ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slides.jquery.js"></script>
<?php } ?>
</head>
<body>
<div class="page">
	<div class="header"><!--till menu-->
		<div class="on">
			<div class="left"><img src="<?php  bloginfo('template_directory');?>/img/onleft.gif" /></div>
			<div class="middle">
			</div>
			<div class="right"><img src="<?php  bloginfo('template_directory');?>/img/onright.gif" /></div>
		</div><!-- on -->
		<div class="h_left" style="height:146px;"  ></div>
		<div class="mid">
			<div class="menu_mid">
				<a href="<?php bloginfo('siteurl');?>"><div class="logo"><img src="<?php bloginfo('template_directory'); ?>/img/logo.jpg" /></div></a>
				<div class="microcode"><img src="<?php bloginfo('template_directory'); ?>/img/microcode.jpg" /></div>
			</div>
		</div><!--mid-->
		<div class="h_right" style="height:146px;" ></div>
		<div class="menu_box">
			<div class="mainNav">
			<?php 
				$menu_param=array(
					'theme_location'  => 'primary',
					'menu'            => '',
					'container'       => false,
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
				);
				wp_nav_menu($menu_param);
			?>
			</div><!-- main nav-->
		</div><!-- menu box -->
		
	</div><!--header-->
	<div class="main">
